<?php
declare(strict_types=1);

namespace App\Services\Purchasing;

use App\DataTransferObjects\Frontend\Shop\Purchase as DTO;
use App\Entity\Purchase;
use App\Entity\PurchaseItem;
use App\Entity\User;
use App\Exceptions\NotImplementedException;
use App\Exceptions\Product\HiddenException;
use App\Exceptions\Purchase\InvalidAmountException;
use App\Repository\Purchase\PurchaseRepository;
use App\Services\Item\Type;
use App\Services\Product\Stack;

class PurchaseCreator
{
    /**
     * @var PurchaseRepository
     */
    private $purchaseRepository;

    private $cost = 0;

    public function __construct(PurchaseRepository $purchaseRepository)
    {
        $this->purchaseRepository = $purchaseRepository;
    }

    /**
     * @param DTO[]       $dto
     * @param User|string $user
     * @param string      $ip
     *
     * @return Purchase
     */
    public function create(array $dto, $user, string $ip): Purchase
    {
        $this->through($dto);
        return $this->persist($dto, $user, $ip, $this->enoughMoney($user));
    }

    /**
     * Through all the elements and validates them and also increments the cost.
     *
     * @param DTO[] $dto
     *
     * @throws HiddenException
     */
    public function through(array $dto)
    {
        foreach ($dto as $each) {
            $product = $each->getProduct();
            $item = $product->getItem();

            // If the product is hidden, it is not available for sale.
            if ($product->isHidden()) {
                throw new HiddenException($product);
            }

            if ($item->getType() === Type::PERMGROUP) {
                if (Stack::isForever($product) === true) {
                    $this->addCost($product->getPrice());
                } else {
                    $size = $this->validateAndCalculateAmount($each->getAmount(), $product->getStack());

                    if ($size === null) {
                        throw new InvalidAmountException($each->getAmount(), $product);
                    } else {
                        $this->addCost($product->getPrice(), $size);
                    }
                }
            } else if ($item->getType() === Type::ITEM) {
                $size = $this->validateAndCalculateAmount($each->getAmount(), $product->getStack());

                if ($size === null) {
                    throw new InvalidAmountException($each->getAmount(), $product);
                } else {
                    $this->addCost($product->getPrice(), $size);
                }
            } else {
                throw new NotImplementedException(
                    "Feature to handle this product type {$each->getProduct()} not implemented"
                );
            }
        }
    }

    private function addCost(float $value, int $multiplier = 1): void
    {
        $this->cost += $value * $multiplier;
    }

    /**
     * @param int $amount
     * @param int $stack
     *
     * @return int|null Will return the number of stacks purchased in case of successful
     * verification and null - if the validation has failed.
     */
    private function validateAndCalculateAmount(int $amount, int $stack): ?int
    {
        if ($amount % $stack === 0) {
            return (int)floor($amount / $stack);
        }

        return null;
    }

    private function enoughMoney($user): bool
    {
        // If the user is not authorized, he must pay for purchases directly.
        if (!($user instanceof User)) {
            return false;
        }

        return $user->getBalance() - $this->cost >= 0;
    }

    /**
     * @param DTO[]  $dto
     * @param User|string   $user
     * @param string $ip
     * @param bool   $isCompleted
     *
     * @return Purchase
     */
    private function persist(array $dto, $user, string $ip, bool $isCompleted): Purchase
    {
        $purchase = new Purchase($this->cost, $ip);
        foreach ($dto as $each) {
            $purchase->getItems()->add(new PurchaseItem($each->getProduct(), $each->getAmount()));
        }
        if ($isCompleted) {
            $purchase->setCompletedAt(new \DateTimeImmutable());
        }
        if ($user instanceof User) {
            $purchase->setUser($user);
        } else {
            $purchase->setPlayer($user);
        }

        $this->purchaseRepository->create($purchase);

        return $purchase;
    }
}

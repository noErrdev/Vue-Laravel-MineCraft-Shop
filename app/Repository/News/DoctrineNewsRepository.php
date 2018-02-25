<?php
declare(strict_types = 1);

namespace App\Repository\News;

use App\Entity\News;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use LaravelDoctrine\ORM\Pagination\PaginatesFromParams;
use LaravelDoctrine\ORM\Pagination\PaginatesFromRequest;

class DoctrineNewsRepository implements NewsRepository
{
    use PaginatesFromParams, PaginatesFromRequest
    {
        // Resolution of conflict methods in traits.
        PaginatesFromRequest::paginateAll insteadof PaginatesFromParams;
        PaginatesFromRequest::paginate insteadof PaginatesFromParams;
        PaginatesFromParams::paginateAll as paginateAllFromParams;
    }

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var EntityRepository
     */
    private $er;

    public function __construct(EntityManagerInterface $em, EntityRepository $er)
    {
        $this->em = $em;
        $this->er = $er;
    }

    public function create(News $news): void
    {
        $this->em->persist($news);
        $this->em->flush();
    }

    public function deleteAll(): bool
    {
        return (bool)$this->er->createQueryBuilder('n')
            ->delete()
            ->getQuery()
            ->getResult();
    }

    /**
     * {@inheritdoc}
     */
    public function createQueryBuilder($alias, $indexBy = null)
    {
        return $this->er->createQueryBuilder($alias, $indexBy);
    }

    public function find(int $id): ?News
    {
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return $this->er->find($id);
    }

    public function findAllPaginated(int $perPage, int $page): LengthAwarePaginator
    {
        return $this->paginateAllFromParams($perPage, $page);
    }

    public function findPaginated(int $perPage): LengthAwarePaginator
    {
        return $this->paginateAll($perPage);
    }

    public function findPaginatedWithOrder(string $orderBy, bool $descending, int $perPage): LengthAwarePaginator
    {
        return $this->paginate(
            $this->createQueryBuilder('news')
                ->join('news.user', 'user')
                ->orderBy($orderBy, $descending ? 'DESC' : 'ASC')
                ->getQuery(),
            $perPage,
            'page',
            false
        );
    }

    public function findPaginateWithSearch(string $search, int $perPage): LengthAwarePaginator
    {
        return $this->paginate(
            $this->createQueryBuilder('n')
                ->join('n.user', 'user')
                ->where('n.id LIKE :search')
                ->orWhere('n.title LIKE :search')
                ->orWhere('user.username LIKE :search')
                ->orWhere('user.email LIKE :search')
                ->setParameter('search', "%{$search}%")
                ->getQuery(),
            $perPage,
            'page',
            false
        );
    }

    public function findPaginatedWithOrderAndSearch(string $orderBy, bool $descending, string $search, int $perPage): LengthAwarePaginator
    {
        return $this->paginate(
            $this->createQueryBuilder('news')
                ->join('news.user', 'user')
                ->orderBy($orderBy, $descending ? 'DESC' : 'ASC')
                ->where('news.id LIKE :search')
                ->orWhere('news.title LIKE :search')
                ->orWhere('user.username LIKE :search')
                ->orWhere('user.email LIKE :search')
                ->setParameter('search', "%{$search}%")
                ->getQuery(),
            $perPage,
            'page',
            false
        );
    }
}

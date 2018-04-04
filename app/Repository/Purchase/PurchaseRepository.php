<?php
declare(strict_types = 1);

namespace App\Repository\Purchase;

use App\Entity\Purchase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface PurchaseRepository
{
    public function create(Purchase $purchase): void;

    public function find(int $id): ?Purchase;

    public function findPaginated(int $page, int $perPage): LengthAwarePaginator;

    public function findPaginatedWithOrder(int $page, string $orderBy, bool $descending, int $perPage): LengthAwarePaginator;

    public function deleteAll(): bool;
}

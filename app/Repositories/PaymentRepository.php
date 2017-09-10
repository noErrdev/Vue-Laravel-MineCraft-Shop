<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\Builder;

/**
 * Class PaymentRepository
 *
 * @author  D3lph1 <d3lph1.contact@gmail.com>
 * @package App\Repositories
 */
class PaymentRepository extends BaseRepository
{
    const MODEL = 'App\Models\Payment';

    /**
     * Receives completed payments created within one year from this moment.
     */
    public function forTheLastYearCompleted(array $columns): Collection
    {
        $columns = $this->prepareColumns($columns);

        return \Cache::get('admin.statistic.for_the_last_year_completed', function () use ($columns) {
            $result = Payment::select($columns)
                ->where('updated_at', '>', '(NOW() - INTERVAL 1 YEAR)')
                ->where('completed', 1)
                ->orderBy('updated_at', 'ASC')
                ->get();

            \Cache::put('admin.statistic.for_the_last_year_completed', $result, s_get('caching.statistic.ttl', 60));

            return $result;
        });
    }

    /**
     * Summarizes the income received from the sale of products for all time.
     */
    public function profit(): float
    {
        return \Cache::get('admin.statistic.profit', function () {
            $result = Payment::where('completed', 1)
                ->where(function ($query) {
                    /** @var $query Builder */
                    $query->where('username', null)
                        ->orWhere(function ($query) {
                            /** @var $query Builder */
                            $query->whereNotNull('username')
                                ->where('products', null);
                        });
                })
                ->sum('cost');

            \Cache::put('admin.statistic.profit', $result, s_get('caching.statistic.ttl', 60));

            return $result;
        });
    }

    /**
     * Complete payment with given identifier.
     *
     * @param int    $id          Payment identifier.
     * @param string $serviceName Service name (For example, Robokassa).
     *
     * @return bool
     */
    public function complete(int $id, string $serviceName): bool
    {
        return Payment::where('id', $id)
            ->update([
                'service' => $serviceName,
                'completed' => true,
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
    }

    /**
     * Get payments history for user with given id.
     *
     * @param int   $userId  User identifier.
     * @param array $columns Columns for sampling.
     *
     * @return LengthAwarePaginator
     */
    public function historyForUser(int $userId, array $columns = []): LengthAwarePaginator
    {
        $columns = $this->prepareColumns($columns);

        return Payment::select($columns)
            ->where('payments.user_id', $userId)
            ->orderBy('created_at', 'DESC')
            ->paginate(s_get('profile.payments_per_page', 10));
    }

    /**
     * Get payments history paginated.
     *
     * @param array $columns Columns for sampling.
     *
     * @return LengthAwarePaginator
     */
    public function allHistory(array $columns = []): LengthAwarePaginator
    {
        $columns = $this->prepareColumns($columns);

        return Payment::select($columns)
            ->orderBy('created_at', 'DESC')
            ->paginate(50);
    }
}

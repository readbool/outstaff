<?php

declare(strict_types=1);

namespace App\Repositories\Sites;

use App\Models\Billing;
use App\Models\Site;
use App\Repositories\Sites\Interfaces\SiteRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

final class SiteRepository implements SiteRepositoryInterface
{
    public function findSiteByIdentifier(string $identifier): ?Site
    {
        $query = (new Site())->newModelQuery();
        $query->select('sites.*', DB::raw('AVG(billings.total_amount) as avgYearlyTotalAmount'));
        $query->leftJoin('billings', 'billings.site_identifier', 'sites.identifier');
        $query->where('sites.identifier', '=', $identifier);
        $query->groupBy('sites.id');

        return $query->first();
    }
    public function findUserSites(int $userId): array
    {
        return DB::select('SELECT s.name, s.address, b.total_amount, b.electricity_usage
                FROM sites s
                JOIN billings b ON s.identifier = b.site_identifier
                JOIN (
                SELECT site_identifier, MAX(billing_end_date) AS latest_date
                FROM billings
                GROUP BY site_identifier
                ) latest ON b.site_identifier = latest.site_identifier AND b.billing_end_date = latest.latest_date where s.user_id = :userId;',
            [
                'userId' => $userId,
            ]);
    }
}

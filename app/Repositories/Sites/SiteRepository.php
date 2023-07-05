<?php

declare(strict_types=1);

namespace App\Repositories\Sites;

use App\Models\Site;
use App\Repositories\Sites\Interfaces\SiteRepositoryInterface;

final class SiteRepository implements SiteRepositoryInterface
{
    public function findSiteByIdentifier(string $identifier): ?Site
    {
        $query = (new Site())->newModelQuery();
        $query->select('sites.*, AVG(billings.total_amount) as avgYearlyTotalAmount');
        $query->join('billings', 'billings.site_identifier', 'sites.identifier');
        $query->where('sites.identifier', '=', $identifier);
        $query->groupBy('sites.id');

        return $query->first();
    }
}

<?php

declare(strict_types=1);


namespace App\Repositories\Sites\Interfaces;

use App\Models\Site;

interface SiteRepositoryInterface
{
    public function findSiteByIdentifier(string $identifier): ?Site;
}

<?php

declare(strict_types=1);


namespace App\Repositories\Sites\Interfaces;

use App\Models\Site;
use Illuminate\Support\Collection;

interface SiteRepositoryInterface
{
    public function findSiteByIdentifier(string $identifier): ?Site;

    public function findUserSites(int $userId): array;
}

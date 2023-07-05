<?php

declare(strict_types=1);


namespace App\Repositories\Billings\Interfaces;

use App\Enums\MonthEnum;
use Illuminate\Support\Collection;

interface BillingRepositoryInterface
{
    public function getListingByMonth(int $month): Collection;
}

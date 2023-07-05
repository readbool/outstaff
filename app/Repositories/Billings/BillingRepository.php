<?php

declare(strict_types=1);


namespace App\Repositories\Billings;

use App\Enums\MonthEnum;
use App\Models\Billing;
use App\Repositories\Billings\Interfaces\BillingRepositoryInterface;
use Illuminate\Support\Collection;

final class BillingRepository implements BillingRepositoryInterface
{
    public function getListingByMonth(int $month): Collection
    {
        $query = (new Billing())->newModelQuery();

        $query->whereMonth('billing_end_date', '=', $month);

        return $query->get();
    }
}

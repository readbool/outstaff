<?php

declare(strict_types=1);

namespace App\Http\Controllers\Billing;

use App\Enums\MonthEnums;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller as BaseController;

final class BillingListController extends BaseController
{
    public function index(): View
    {

        return \view('pages.billing.listing', [
            'months' => MonthEnums::cases(),
        ]);
    }
}

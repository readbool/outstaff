<?php

declare(strict_types=1);

namespace App\Http\Controllers\Billing;

use App\Enums\MonthEnum;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller as BaseController;

final class BillingListController extends BaseController
{
    public function index(): View
    {
        $mapping = [
            MonthEnum::JANUARY->name,
            MonthEnum::FEBRUARY->name,
            MonthEnum::MARCH->name,
            MonthEnum::APRIL->name,
            MonthEnum::MAY->name,
            MonthEnum::JUNE->name,
            MonthEnum::JULY->name,
            MonthEnum::AUGUST->name,
            MonthEnum::SEPTEMBER->name,
            MonthEnum::OCTOBER->name,
            MonthEnum::NOVEMBER->name,
            MonthEnum::DECEMBER->name,
        ];

        return \view('pages.billing.listing', [
            'months' => $mapping,
        ]);
    }
}

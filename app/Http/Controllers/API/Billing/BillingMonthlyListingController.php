<?php

declare(strict_types=1);


namespace App\Http\Controllers\API\Billing;

use App\Http\Controllers\API\AbstractBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

final class BillingMonthlyListingController extends AbstractBaseController
{
    public function __invoke(string $month): JsonResponse
    {
        return $this->sendResponse([], Response::HTTP_OK);
    }
}

<?php

declare(strict_types=1);


namespace App\Http\Controllers\API\Billing;

use App\Enums\MonthEnum;
use App\Http\Controllers\API\AbstractBaseController;
use App\Repositories\Billings\Interfaces\BillingRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

final class BillingMonthlyListingController extends AbstractBaseController
{
    private BillingRepositoryInterface $billingRepository;

    public function __construct(BillingRepositoryInterface $billingRepository)
    {
        $this->billingRepository = $billingRepository;
    }

    public function __invoke(Request $request): JsonResponse
    {
        $monthRequested = $request->get('month');

        $filteredValue = $this->filterMonthFromRequest($monthRequested);

        if ($filteredValue === null) {
            return $this->sendError(['invalid month requested'], Response::HTTP_BAD_REQUEST);
        }

        /** @var \Illuminate\Support\Collection<\App\Models\Billing> $response */
        $response = $this->billingRepository->getListingByMonth($filteredValue);

        $serialized = $this->toResponse($response);

        return $this->sendResponse($serialized, Response::HTTP_OK);
    }

    private function toResponse(Collection $collection): array
    {
        $serialized = [];

        /** @var \App\Models\Billing $billing */
        foreach ($collection as $billing) {
            $serialized[] = [
                'invoiceNumber' => $billing->getInvoiceNumber(),
            ];
        }

        return $serialized;
    }

    private function filterMonthFromRequest(string $month): ?int
    {
        $mapping = [
            MonthEnum::JANUARY->name => MonthEnum::JANUARY->value,
            MonthEnum::FEBRUARY->name => MonthEnum::FEBRUARY->value,
            MonthEnum::MARCH->name => MonthEnum::MARCH->value,
            MonthEnum::APRIL->name => MonthEnum::APRIL->value,
            MonthEnum::MAY->name => MonthEnum::MAY->value,
            MonthEnum::JUNE->name => MonthEnum::JUNE->value,
            MonthEnum::JULY->name => MonthEnum::JULY->value,
            MonthEnum::AUGUST->name => MonthEnum::AUGUST->value,
            MonthEnum::SEPTEMBER->name => MonthEnum::SEPTEMBER->value,
            MonthEnum::OCTOBER->name => MonthEnum::OCTOBER->value,
            MonthEnum::NOVEMBER->name => MonthEnum::NOVEMBER->value,
            MonthEnum::DECEMBER->name => MonthEnum::DECEMBER->value,
        ];
        return $mapping[$month] ?? null;
    }
}

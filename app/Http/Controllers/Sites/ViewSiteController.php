<?php

declare(strict_types=1);


namespace App\Http\Controllers\Sites;

use App\Repositories\Sites\Interfaces\SiteRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller as BaseController;

final class ViewSiteController extends BaseController
{
    private SiteRepositoryInterface $siteRepository;

    public function __construct(SiteRepositoryInterface $siteRepository)
    {
        $this->siteRepository = $siteRepository;
    }

    public function show(string $siteIdentifier): View
    {
        /** @var \App\Models\Site $site */
        $site = $this->siteRepository->findSiteByIdentifier($siteIdentifier);

        if ($site === null) {
            return \view('pages.site.view-site', ['error' => 'ERROR: Invalid site identifier']);
        }

        $siteData = [
            'siteName' => $site->getName(),
            'siteAddress' => $site->getAddress(),
            'totalAmount' => 0,
            'error' => '',
        ];

        return \view('pages.site.view-site', $siteData);
    }
}

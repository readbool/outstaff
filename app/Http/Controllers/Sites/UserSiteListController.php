<?php

declare(strict_types=1);

namespace App\Http\Controllers\Sites;
use App\Repositories\Sites\Interfaces\SiteRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller as BaseController;

final class UserSiteListController extends BaseController
{
    private SiteRepositoryInterface $siteRepository;

    public function __construct(SiteRepositoryInterface $siteRepository)
    {
        $this->siteRepository = $siteRepository;
    }

    public function index(int $userId): View
    {
        $response = [
            'error' => [],
            'data' => [],
        ];

        $siteCollection = $this->siteRepository->findUserSites($userId);

        $response['data'] = $siteCollection;

        return \view('pages.site.user-site-list', $response);
    }
}

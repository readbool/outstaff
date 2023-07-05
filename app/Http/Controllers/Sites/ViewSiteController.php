<?php

declare(strict_types=1);


namespace App\Http\Controllers\Sites;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller as BaseController;

final class ViewSiteController extends BaseController
{
    public function index(): View
    {
        return \view('pages.site.listing');
    }
}

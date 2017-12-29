<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class SitemapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return response()->view('sitemap.index')->header('Content-Type', 'text/xml');
    }
}

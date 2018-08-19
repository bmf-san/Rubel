<?php

namespace BmfTech\Http\Controllers\Web;

use Illuminate\Http\Response;
use BmfTech\Http\Controllers\Controller;
use Rubel\Repositories\Eloquent\PostRepository;
use Rubel\Repositories\Eloquent\ConfigRepository;
use Carbon\Carbon;

class FeedController extends Controller
{
    /**
     * PostRepository
     *
     * @var PostRepository
     */
    private $postRepository;

    /**
     * ConfigRepository
     *
     * @var ConfigRepository
     */
    private $configRepository;

    /**
     * FeedController constructor
     *
     * @param PostRepository $postRepository
     * @param ConfigRepository $configRepository
     */
    public function __construct(PostRepository $postRepository, ConfigRepository $configRepository)
    {
        $this->postRepository = $postRepository;
        $this->configRepository = $configRepository;
    }

    /**
    * Display a listing of the resource.
    *
    * @return Response
     */
    public function index(): Response
    {
        $title = $this->configRepository->findByName('title')->value;
        $subTitle = $this->configRepository->findByName('sub_title')->value;
        $updatedAt = $this->postRepository->findLatest()->updated_at->toAtomString();
        $posts = $this->postRepository->findPublished();

        return response()->view(get_the_view_path('feed.index'), [
            'title' => $title,
            'subTitle' => $subTitle,
            'updatedAt' => $updatedAt,
            'currentDate' => Carbon::now(),
            'posts' => $posts,
        ])->withHeaders([
            'Content-Type' => 'application/xml',
            'charset' => 'utf-8',
        ]);
    }
}

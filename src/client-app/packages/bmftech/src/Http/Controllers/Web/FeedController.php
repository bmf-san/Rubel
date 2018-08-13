<?php

namespace BmfTech\Http\Controllers\Web;

use Illuminate\Http\Response;
use BmfTech\Http\Controllers\Controller;
use Rubel\Repositories\Eloquent\ConfigRepository;
use Rubel\Models\Post;
use Rubel\Models\Config;
use Carbon\Carbon;

class FeedController extends Controller
{
    /**
     * Post
     *
     * @var Post
     */
    private $post;

    /**
     * ConfigRepository
     *
     * @var ConfigRepository
     */
    private $configRepository;

    /**
     * FeedController constructor
     *
     * @param Post $post
     * @param ConfigRepository $configRepository
     */
    public function __construct(Post $post, ConfigRepository $configRepository)
    {
        $this->post = $post;
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
        $updatedAt = $this->post->latest()->first()->updated_at->toAtomString();
        $posts = $this->post->whereNotNull('published_at')->get();

        return response()->view('bmftech::feed.index', [
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

<?php

namespace Rubel\Http\Controllers\Web;

use Illuminate\Http\Response;
use Rubel\Http\Controllers\Controller;
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
     * Config
     *
     * @var Config
     */
    private $config;

    /**
     * FeedController constructor
     *
     * @param Post $post
     * @param Config $config
     */
    public function __construct(Post $post, Config $config)
    {
        $this->post = $post;
        $this->config = $config;
    }

    /**
    * Display a listing of the resource.
    *
    * @return Response
     */
    public function index(): Response
    {
        $title = $this->config->where('name', 'title')->first()->value;
        $subTitle = $this->config->where('name', 'sub_title')->first()->value;
        $updatedAt = $this->post->latest()->first()->updated_at->toAtomString();
        $posts = $this->post->whereNotNull('published_at')->get();

        return response()->view('feed.index', [
            'title' => $title,
            'subTitle' => $subTitle,
            'updatedAt' => $updatedAt,
            'currentDate' => Carbon::now(),
            'posts' => $posts,
        ])->withHeaders([
            'Content-Type' => 'application/xml',
            'charset' => 'utf-8',
        ])
    }
}

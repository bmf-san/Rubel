<?php

namespace Rubel\Http\Controllers\Web;

use Illuminate\Http\Response;
use Rubel\Http\Controllers\Controller;
use Rubel\Models\Post;
use Rubel\Models\Setting;
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
     * Setting
     *
     * @var Setting
     */
    private $setting;

    /**
     * FeedController constructor
     *
     * @param Post $post
     * @param Setting $setting
     */
    public function __construct(Post $post, Setting $setting)
    {
        $this->post = $post;
        $this->setting = $setting;
    }

    /**
    * Display a listing of the resource.
    *
    * @return Response
     */
    public function index(): Response
    {
        $title = $this->setting->where('name', 'title')->first()->value;
        $subTitle = $this->setting->where('name', 'sub_title')->first()->value;
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
        ]);
    }
}

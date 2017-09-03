<?php

namespace App\Repositories\Eloquent\Api;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\Contracts\Api\PostRepositoryContract;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;

class PostRepository implements PostRepositoryContract
{
    /**
     * Pagination limit
     *
     * @var int
     */
    const PAGINATION_LIMIT = 10;

    /**
     * Post
     *
     * @var Post
     */
    private $postModel;

    /**
     * Tag
     *
     * @var Tag
     */
    private $tagModel;

    /**
     * PostRepository constructor
     *
     * @param Post $postModel
     * @param Tag  $tagModel
     */
    public function __construct(Post $postModel, Tag $tagModel)
    {
        $this->postModel = $postModel;
        $this->tagModel = $tagModel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        $posts = $this->postModel->with('admin', 'category', 'comments', 'tags')->paginate(self::PAGINATION_LIMIT);

        return $posts;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function store($request): array
    {
        $post = $this->postModel;
        $post = $this->savePost($post, $request);

        $tag = $this->tagModel;
        $this->syncTags($post, $tag, $request->tags);

        return ['id' => $post->id];
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Post
     */
    public function show(int $id): Post
    {
        $post = $this->postModel->with('admin', 'category', 'comments', 'tags')->find($id);

        return $post;
    }

    /**
     * Update the specified resouce in storage.
     *
     * @param int    $id
     * @param object $request
     * @return array
     */
    public function update($request, Int $id): array
    {
        $post = $this->postModel->findOrFail($id);

        $this->updatePost($post, $request);

        if ($request->tags) {
            $tag = $this->tagModel;
            $this->syncTags($post, $tag, $request->tags);
        }

        return ['id' => $post->id];
    }

    /**
     * Remove the specified resouce from storage.
     *
     * @return array
     */
    public function destroy(Int $id): array
    {
        $post = $this->postModel->find($id);

        $post->delete();

        return [];
    }

    /**
     * Save post.
     *
     * @param Post   $post
     * @param \Illuminate\Http\Request $request
     * @return Post
     */
    private function savePost(Post $post, $request): Post
    {
        $publicationDate = null;

        if ($request->publication_status == 'public') {
            $publicationDate = Carbon::now();
        }

        $post = $post->create([
            'admin_id' => 1, // FIXME set authenticated admin id
            'category_id' => $request->category_id,
            'title' => $request->title,
            'md_content' => $request->md_content,
            'html_content' => $request->html_content,
            'publication_status' => $request->publication_status,
            'publication_date' => $publicationDate
        ]);

        return $post;
    }

    /**
     * Update post.
     *
     * @param Post   $post
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    private function updatePost(Post $post, $request)
    {
        $publicationDate = $post->publication_date;

        if ($request->publication_status == 'public') {
            if (is_null($publicationDate)) {
                $publicationDate = Carbon::now();
            }
        }

        $post->update([
            'admin_id' => 1, // FIXME set authenticated admin id
            'category_id' => $request->category_id,
            'title' => $request->title,
            'md_content' => $request->md_content,
            'html_content' => $request->html_content,
            'publication_status' => $request->publication_status,
            'publication_date' => $publicationDate
        ]);
    }

    /**
     * Sync tags.
     *
     * @param Post  $post
     * @param Tag   $tag
     * @param Array $tags
     * @return void
     */
    private function syncTags(Post $post, Tag $tag, $tags)
    {
        // HACK
        if ($tags) {
            $requestTagArray = [];

            foreach ($tags as $requestTag) {
                $requestTagArray[] = $requestTag['name'];
            }

            $existTagCollection = $tag->whereIn('name', $requestTagArray)->get();

            $existTagNameArray = $existTagCollection->pluck('name')->toArray();
            $existTagIdArray = $existTagCollection->pluck('id')->toArray();

            $newTagNameArray = array_diff($requestTagArray, $existTagNameArray);

            $tagIdArray = [];

            if ($newTagNameArray) {
                // Create new tags if there are new tags which has not been registerd.
                foreach ($newTagNameArray as $newTagName) {
                    $tag->create([
                        'name' => $newTagName,
                    ]);
                }

                $newTagIdArray = $tag->whereIn('name', $newTagNameArray)->get()->pluck('id')->toArray();

                $tagIdArray = array_merge($existTagIdArray, $newTagIdArray);
            } else {
                $tagIdArray = $existTagIdArray;
            }

            $post->tags()->sync($tagIdArray);
        } else {
            $post->tags()->sync($tags);
        }
    }
}

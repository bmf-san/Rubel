<?php

namespace Rubel\Repositories\Eloquent\Api;

use Illuminate\Pagination\LengthAwarePaginator;
use Rubel\Repositories\Contracts\Api\PostRepositoryContract;
use Rubel\Models\Post;
use Rubel\Models\Tag;
use Carbon\Carbon;

class PostRepository implements PostRepositoryContract
{
    /**
     * PUBLICATION_STATUS_PUBLIC
     *
     * @var string
     */
    const PUBLICATION_STATUS_PUBLIC = 'public';

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
        // TODO Remove a orderBy method after implementation of search api.
        $posts = $this->postModel->with('admin', 'category', 'comments', 'tags')->orderBy('created_at', 'desc')->paginate(self::PAGINATION_LIMIT);

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
        $post = $this->savePost($request);

        $this->syncTags($post, $request->tags);

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
        $post = $this->postModel->with('admin', 'category', 'comments', 'tags')->findOrFail($id);

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
            $this->syncTags($post, $request->tags);
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
        $this->postModel->findOrFail($id)->delete();

        return [];
    }

    /**
     * Save post.
     *
     * @param \Illuminate\Http\Request $request
     * @return Post
     */
    private function savePost($request): Post
    {
        $publicationStatus = $request->publication_status;

        $post = $this->postModel->create([
            'admin_id' => 1, // FIXME set authenticated admin id
            'category_id' => $request->category_id,
            'title' => $request->title,
            'md_content' => $request->md_content,
            'html_content' => $request->html_content,
            'publication_status' => $publicationStatus,
            'published_at' => $this->getPublicationDate($publicationStatus),
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
        $publicationStatus = $request->publication_status;
        $publicationDate = $post->published_at;

        $post->update([
            'admin_id' => 1, // FIXME set authenticated admin id
            'category_id' => $request->category_id,
            'title' => $request->title,
            'md_content' => $request->md_content,
            'html_content' => $request->html_content,
            'publication_status' => $publicationStatus,
            'published_at' => $this->getPublicationDate($publicationStatus, $publicationDate)
        ]);
    }

    /**
     * Get publication date
     *
     * @param  string  $publicationStatus
     * @param  string  $publicationDate
     * @return string
     */
    private function getPublicationDate($publicationStatus, $publicationDate = null)
    {
        if ($publicationStatus == self::PUBLICATION_STATUS_PUBLIC) {
            if (is_null($publicationDate)) {
                return Carbon::now();
            }
        }

        return $publicationDate;
    }

    /**
     * Sync tags.
     *
     * @param Post  $post
     * @param Array $tags
     * @return void
     */
    private function syncTags(Post $post, $tags)
    {
        // HACK
        if ($tags) {
            $requestTagArray = [];

            foreach ($tags as $requestTag) {
                $requestTagArray[] = $requestTag['name'];
            }

            $existTagCollection = $this->tagModel->whereIn('name', $requestTagArray)->get();

            $existTagNameArray = $existTagCollection->pluck('name')->toArray();
            $existTagIdArray = $existTagCollection->pluck('id')->toArray();

            $newTagNameArray = array_diff($requestTagArray, $existTagNameArray);

            if ($newTagNameArray) {
                // Create new tags if there are new tags which has not been registerd.
                foreach ($newTagNameArray as $newTagName) {
                    $this->tagModel->create([
                        'name' => $newTagName,
                    ]);
                }

                $newTagIdArray = $this->tagModel->whereIn('name', $newTagNameArray)->get()->pluck('id')->toArray();

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

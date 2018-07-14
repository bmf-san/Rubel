<?php

namespace Rubel\Repositories\Eloquent;

use Illuminate\Pagination\LengthAwarePaginator;
use Rubel\Repositories\Contracts\PostRepositoryContract;
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
    const PAGINATION_LIMIT = 20;

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
    public function findAll(): LengthAwarePaginator
    {
        // TODO Remove a orderBy method after implementation of search api.
        $posts = $this->postModel->with('admin', 'category', 'comments', 'tags')->orderBy('created_at', 'desc')->paginate(self::PAGINATION_LIMIT);

        return $posts;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param array $attributes
     * @return Post
     */
    public function store(array $attributes): Post
    {
        $publicationStatus = $attributes['publication_status'];

        $post = $this->postModel->create([
            'admin_id' => 1, // FIXME set authenticated admin id
            'category_id' => $attributes['category_id'],
            'title' => $attributes['title'],
            'md_content' => $attributes['md_content'],
            'html_content' => $attributes['html_content'],
            'publication_status' => $publicationStatus,
            'published_at' => $this->getPublicationDate($publicationStatus),
        ]);

        $this->syncTags($post, $attributes['tags']);

        return $post;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Post
     */
    public function findById(int $id): Post
    {
        $post = $this->postModel->with('admin', 'category', 'comments', 'tags')->findOrFail($id);

        return $post;
    }

    /**
     * Update the specified resouce in storage.
     *
     * @param int    $id
     * @param array $attributes
     * @return Post
     */
    public function updateById(array $attributes, Int $id): Post
    {
        $post = $this->postModel->findOrFail($id);

        $publicationStatus = $attributes['publication_status'];
        $publicationDate = $post->published_at;

        $post->update([
            'admin_id' => 1, // FIXME set authenticated admin id
            'category_id' => $attributes['category_id'],
            'title' => $attributes['title'],
            'md_content' => $attributes['md_content'],
            'html_content' => $attributes['html_content'],
            'publication_status' => $publicationStatus,
            'published_at' => $this->getPublicationDate($publicationStatus, $publicationDate),
        ]);

        if (count($attributes['tags'])) {
            $this->syncTags($post, $attributes['tags']);
        }

        return $this->postModel->findOrFail($id);
    }

    /**
     * Remove the specified resouce from storage.
     *
     * @return void
     */
    public function destroyById(Int $id): void
    {
        $this->postModel->findOrFail($id)->delete();
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

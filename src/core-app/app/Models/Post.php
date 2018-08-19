<?php

namespace Rubel\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Rubel\Models\Post
 *
 * @property int $id
 * @property int|null $admin_id
 * @property int $category_id
 * @property string|null $title
 * @property string|null $md_content
 * @property string|null $html_content
 * @property string $publication_status
 * @property \Carbon\Carbon|null $published_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @property-read \Rubel\Models\Admin|null $admin
 * @property-read \Rubel\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\Rubel\Models\Comment[] $comments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Rubel\Models\Tag[] $tags
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Rubel\Models\Post onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Rubel\Models\Post whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rubel\Models\Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rubel\Models\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rubel\Models\Post whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rubel\Models\Post whereHtmlContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rubel\Models\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rubel\Models\Post whereMdContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rubel\Models\Post wherePublicationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rubel\Models\Post wherePublicationStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rubel\Models\Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rubel\Models\Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Rubel\Models\Post withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Rubel\Models\Post withoutTrashed()
 * @mixin \Eloquent
 */
class Post extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'posts';

    /**
     * Set the fillable attributes for the model.
     *
     * @param  array  $fillable
     * @return $this
     */
    protected $fillable = [
        'admin_id', 'category_id', 'title', 'md_content', 'html_content', 'publication_status', 'published_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pivot',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'published_at', 'created_at', 'updated_at', 'deleted_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_post')->withTimestamps();
    }
}

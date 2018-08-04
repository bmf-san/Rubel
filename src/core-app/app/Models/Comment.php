<?php

namespace Rubel\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Rubel\Models\Comment
 *
 * @property int $id
 * @property int|null $post_id
 * @property string $comment
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @property-read \Rubel\Models\Post|null $post
 * @method static \Illuminate\Database\Eloquent\Builder|\Rubel\Models\Comment whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rubel\Models\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rubel\Models\Comment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rubel\Models\Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rubel\Models\Comment wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rubel\Models\Comment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Comment extends Model
{
    /**
     * Set the fillable attributes for the model.
     *
     * @param  array  $fillable
     * @return $this
     */
    protected $fillable = [
        'post_id', 'comment',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}

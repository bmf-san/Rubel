<?php

namespace Rubel\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Rubel\Models\Setting
 *
 * @property int $id
 * @property string $name
 * @property string $alias_name
 * @property string $value
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Rubel\Models\Setting onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Rubel\Models\Setting whereAliasName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rubel\Models\Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rubel\Models\Setting whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rubel\Models\Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rubel\Models\Setting whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rubel\Models\Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rubel\Models\Setting whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|\Rubel\Models\Setting withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Rubel\Models\Setting withoutTrashed()
 * @mixin \Eloquent
 */
class Setting extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'settings';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'name';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'value'
    ];
}

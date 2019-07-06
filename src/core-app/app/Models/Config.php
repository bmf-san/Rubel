<?php

namespace Rubel\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Rubel\Models\Config
 *
 * @property int $id
 * @property string $name
 * @property string $alias_name
 * @property string $value
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Rubel\Models\Config onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Rubel\Models\Config whereAliasName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rubel\Models\Config whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rubel\Models\Config whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rubel\Models\Config whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rubel\Models\Config whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rubel\Models\Config whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rubel\Models\Config whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|\Rubel\Models\Config withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Rubel\Models\Config withoutTrashed()
 * @mixin \Eloquent
 */
class Config extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'configs';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'value'
    ];
}

<?php

namespace App\Models\Direction;

use App\Queries\Direction\DirectionCategoryQuery;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class DirectionCategory extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $dates = ['published_at'];

    /**
     * @var string[]
     */
    protected $fillable = [
        'parent_id',
        'name',
        'title_menu',
        'slug',
        'image',
        'is_active',
        'order',
    ];

    /**
     * @return \string[][]
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * @param $query
     * @return DirectionCategoryQuery
     */
    public function newEloquentBuilder($query): DirectionCategoryQuery
    {

        return new DirectionCategoryQuery($query);

    }

    /**
     * @return BelongsTo
     */
    public function direction(): BelongsTo
    {
        return $this->belongsTo(Direction::class);
    }

    /**
     * @return HasOne
     */
    public function page(): HasOne
    {
        return $this->hasOne(DirectionCategoryPage::class, 'category_id');
    }

    /**
     * @return BelongsTo
     */
    public function parents(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /**
     * @return HasMany
     */
    public function categories(): HasMany
    {
        return $this->hasMany(DirectionCategory::class, 'parent_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function childrenCategories(): HasMany
    {
        return$this->hasMany(DirectionCategory::class, 'parent_id', 'id')->with('categories');
    }

    /**
     * @return HasMany
     */
    public function subcategory(): HasMany
    {

        return $this->hasMany(DirectionCategory::class, 'parent_id');

    }

}

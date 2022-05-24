<?php

namespace App\Models\Direction;

use App\Models\Gallery\Gallery;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Direction extends Model
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
        'category_id',
        'clinic_id',
        'slug',
        'name',
        'image',
        'time_spending',
        'excerpt',
        'title_excerpt',
        'description',
        'is_top',
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
     * @return HasOne
     */
    public function category(): HasOne
    {

        return $this->hasOne(DirectionCategory::class);

    }

    /**
     * @return HasOne
     */
    public function page(): HasOne
    {
        return $this->hasOne(DirectionPage::class);
    }

    /**
     * @return HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(DirectionImage::class);
    }

    /**
     * @return HasMany
     */
    public function gallery(): HasMany
    {
        return $this->hasMany(Gallery::class);
    }

    /**
     * @return HasMany
     */
    public function prices(): HasMany
    {
        return $this->hasMany(DirectionPrice::class);
    }

}

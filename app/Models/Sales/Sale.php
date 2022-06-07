<?php

namespace App\Models\Sales;

use App\Queries\Sales\SaleQuery;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $dates = [
        'published_at',
        'date_end'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'date_end'  => 'date:Y-m-d H:i A',
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'excerpt',
        'content',
        'photo',
        'is_active',
        'is_home_banner',
        'date_end',
        'published_at',
    ];

    /**
     * @param $query
     * @return SaleQuery
     */
    public function newEloquentBuilder($query): SaleQuery
    {

        return new SaleQuery($query);

    }

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

        return $this->hasOne(SaleCategory::class);

    }

    /**
     * @return HasOne
     */
    public function page(): HasOne
    {
        return $this->hasOne(SalePage::class);
    }

    /**
     * @return HasMany
     */
    public function prices(): HasMany
    {
        return $this->hasMany(SalePrice::class);
    }

}

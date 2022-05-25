<?php

namespace App\Models\Sales;

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

    /**
     * @param $date
     * @return void
     */
//    public function setDateEndAttribute($date): void
//    {
//        $this->attributes['date_end'] = Carbon::createFromFormat('d/m/Y H:i A', $date)->format('Y-m-d H:i:s');
//    }

}

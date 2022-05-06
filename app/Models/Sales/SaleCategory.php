<?php

namespace App\Models\Sales;

use App\Queries\Blog\BlogCategoryQuery;
use App\Queries\Sales\SaleCategoryQuery;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaleCategory extends Model
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
        'slug',
        'is_active',
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
     * @return SaleCategoryQuery
     */
    public function newEloquentBuilder($query): SaleCategoryQuery
    {

        return new SaleCategoryQuery($query);

    }
}

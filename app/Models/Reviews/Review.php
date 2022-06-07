<?php

namespace App\Models\Reviews;

use App\Queries\Reviews\ReviewsQuery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory, SoftDeletes;

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
        'clinic_id',
        'doctor_id',
        'direction_id',
        'fio',
        'phone',
        'content',
        'answer',
        'original',
        'is_active',
        'type',
        'published_at',
    ];

    /**
     * @param $query
     * @return ReviewsQuery
     */
    public function newEloquentBuilder($query): ReviewsQuery
    {

        return new ReviewsQuery($query);

    }

    /**
     * @return HasMany
     */
    public function photos(): HasMany
    {
        return $this->hasMany(ReviewPhoto::class);
    }
}

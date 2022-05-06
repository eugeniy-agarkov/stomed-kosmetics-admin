<?php
namespace App\Models\Reviews;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReviewPhoto extends Model
{

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
        'review_id',
        'photo',
    ];

    /**
     * @return BelongsTo
     */
    public function review(): BelongsTo
    {
        return $this->belongsTo(Review::class);
    }

}

<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogPrice extends Model
{

    use HasFactory;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $fillable = [
        'news_id',
        'code',
        'price',
        'discount_price',
        'description',
        'condition',
        'order',
    ];

    /**
     * @return BelongsTo
     */
    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }
}

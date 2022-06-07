<?php

namespace App\Models\Gallery;

use App\Models\Direction\Direction;
use App\Queries\Gallery\GalleryQuery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model
{
    use HasFactory;

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
        'direction_id',
        'name',
        'image',
        'alt',
        'title',
        'order',
    ];

    /**
     * @param $query
     * @return GalleryQuery
     */
    public function newEloquentBuilder($query): GalleryQuery
    {

        return new GalleryQuery($query);

    }

    /**
     * @return BelongsTo
     */
    public function direction(): BelongsTo
    {
        return $this->belongsTo(Direction::class);
    }

}

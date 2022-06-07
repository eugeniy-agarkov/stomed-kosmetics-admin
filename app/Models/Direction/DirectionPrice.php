<?php

namespace App\Models\Direction;

use App\Queries\Prices\PricesQuery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DirectionPrice extends Model
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
        'direction_id',
        'clinic_id',
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
    public function direction(): BelongsTo
    {
        return $this->belongsTo(Direction::class);
    }

    /**
     * @param $query
     * @return PricesQuery
     */
    public function newEloquentBuilder($query): PricesQuery
    {

        return new PricesQuery($query);

    }

}

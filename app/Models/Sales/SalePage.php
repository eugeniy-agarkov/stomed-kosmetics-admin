<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SalePage extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $primaryKey = 'sale_id';

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description',
        'content',
    ];

    /**
     * @return BelongsTo
     */
    public function sale(): BelongsTo
    {
        return $this->belongsTo(Sale::class);
    }

}

<?php

namespace App\Models\Doctor;

use App\Models\Direction\Direction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DoctorPrice extends Model
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
        'doctor_id',
        'direction_id',
        'code',
        'price',
        'discount_price',
        'description',
        'condition',
        'order'
    ];

    /**
     * @return BelongsTo
     */
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    /**
     * @return BelongsTo
     */
    public function direction(): BelongsTo
    {
        return $this->belongsTo(Direction::class);
    }

}

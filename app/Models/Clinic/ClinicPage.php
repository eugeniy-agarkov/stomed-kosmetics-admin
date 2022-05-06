<?php

namespace App\Models\Clinic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClinicPage extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $primaryKey = 'clinic_id';

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description',
        'h1',
        'features',
        'caption',
        'content',
        'route',
    ];

    /**
     * @return BelongsTo
     */
    public function clinic(): BelongsTo
    {
        return $this->belongsTo(Clinic::class);
    }

}

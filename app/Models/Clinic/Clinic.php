<?php

namespace App\Models\Clinic;

use App\Models\Doctor\Doctor;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clinic extends Model
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
        'code',
        'slug',
        'name',
        'short_name',
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
     * @return HasOne
     */
    public function detail(): HasOne
    {
        return $this->hasOne(ClinicDetail::class);
    }

    /**
     * @return HasOne
     */
    public function page(): HasOne
    {
        return $this->hasOne(ClinicPage::class);
    }

    /**
     * @return HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(ClinicImage::class);
    }

    /**
     * @return HasMany
     */
    public function faq(): HasMany
    {
        return $this->hasMany(ClinicFaq::class);
    }

    /**
     * @return BelongsToMany
     */
    public function doctors(): BelongsToMany
    {
        return $this->belongsToMany(Doctor::class);
    }
}

<?php

namespace App\Models\Doctor;

use App\Models\Clinic\Clinic;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory,
        SoftDeletes,
        Sluggable;

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
        'excerpt',
        'content',
        'image',
        'video',
        'experience',
        'category',
        'is_call_home',
        'degree',
        'is_active',
        'order',
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
     * @return BelongsToMany
     */
    public function clinics(): BelongsToMany
    {
        return $this->belongsToMany(Clinic::class);
    }

    /**
     * @return HasOne
     */
    public function page(): HasOne
    {
        return $this->hasOne(DoctorPage::class);
    }

    /**
     * @return HasMany
     */
    public function sertificats(): HasMany
    {
        return $this->hasMany(DoctorSertificat::class);
    }

    /**
     * @return HasMany
     */
    public function prices(): HasMany
    {
        return $this->hasMany(DoctorPrice::class);
    }

}

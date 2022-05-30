<?php

namespace App\Models;

use App\Models\Direction\Direction;
use App\Models\Doctor\Doctor;
use App\Queries\Form\FormQuery;
use App\Scopes\Form\FormScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Form extends Model
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
     * @param $query
     * @return FormQuery
     */
    public function newEloquentBuilder($query): FormQuery
    {

        return new FormQuery($query);

    }

    /**
     * @return void
     */
    protected static function boot(): void
    {

        parent::boot();
        static::addGlobalScope(new FormScope());

    }

    /**
     * @return HasOne
     */
    public function doctor(): HasOne
    {
        return $this->hasOne(Doctor::class, 'id', 'doctor_id');
    }

    /**
     * @return HasOne
     */
    public function direction(): HasOne
    {
        return $this->hasOne(Direction::class, 'id', 'direction_id');
    }

}

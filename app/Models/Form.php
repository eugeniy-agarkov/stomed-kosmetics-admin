<?php

namespace App\Models;

use App\Queries\Form\FormQuery;
use App\Scopes\Form\FormScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}

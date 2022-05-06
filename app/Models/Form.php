<?php

namespace App\Models;

use App\Queries\Form\FormQuery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    /**
     * @param $query
     * @return FormQuery
     */
    public function newEloquentBuilder($query): FormQuery
    {

        return new FormQuery($query);

    }
}

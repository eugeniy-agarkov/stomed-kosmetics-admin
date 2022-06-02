<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $fillable = [
        'doctorId',
        'clinicId',
        'from',
        'to',
    ];

    protected $dates = [
        'from',
        'to',
    ];

    public function setFromAttribute($value)
    {

        $date = Carbon::createFromFormat('Y.m.d H:i', $value)->format('Y-m-d H:i:s');
        $this->attributes['from'] = $date;
    }

    public function setToAttribute($value)
    {

        $date = Carbon::createFromFormat('Y.m.d H:i', $value)->format('Y-m-d H:i:s');
        $this->attributes['to'] = $date;
    }

}

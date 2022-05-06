<?php

namespace App\Models\Redirect;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Redirect extends Model
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
        'from',
        'to'
    ];

    /**
     * @param $value
     * @return void
     */
    public function setFromAttribute($value): void
    {
        $from = rtrim($value, '/');
        $this->attributes['hash'] = Hash::make($from, ['rounds' => 12]);
        $this->attributes['from'] = $from;

    }

}

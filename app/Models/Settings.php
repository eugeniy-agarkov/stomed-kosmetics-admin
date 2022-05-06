<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = 'settings';

    /**
     * @var string
     */
    protected $primaryKey = 'name';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
    ];

    /**
     * @return object
     */
    public function getAll(): object
    {

        return (object) $this->all()->pluck('value', 'name')->toArray();

    }

}

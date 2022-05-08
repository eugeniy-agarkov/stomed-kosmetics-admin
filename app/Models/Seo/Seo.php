<?php

namespace App\Models\Seo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
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
     * @var string
     */
//    protected $primaryKey = 'page';
//    public $incrementing = false;
//    protected $keyType = 'string';

    /**
     * @var string[]
     */
    public $fillable = [
        'page',
        'name',
        'h1',
        'excerpt',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'robots',
        'canonical',
    ];

}

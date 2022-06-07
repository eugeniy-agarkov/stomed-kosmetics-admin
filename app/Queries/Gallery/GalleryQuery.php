<?php
namespace App\Queries\Gallery;

use Illuminate\Database\Eloquent\Builder;

class GalleryQuery extends Builder
{

    /**
     * @return $this
     */
    public function whereSearch(): self
    {

        if( request()->has('direction') && request()->input('direction') != '' )
        {
            $this->where('direction_id', request()->input('direction'));
        }

        if( request()->has('name') )
        {
            $this->where('name', 'like', '%' . request()->input('name') . '%');
        }

        return $this;

    }

}

<?php
namespace App\Queries\Sales;

use Illuminate\Database\Eloquent\Builder;

class SaleQuery extends Builder
{

    /**
     * @return $this
     */
    public function whereSearch(): self
    {

        if( request()->has('category') && request()->input('category') != '' )
        {
            $this->where('category_id', request()->input('category'));
        }

        if( request()->has('name') )
        {
            $this->where('name', 'like', '%' . request()->input('name') . '%');
        }

        return $this;

    }

}

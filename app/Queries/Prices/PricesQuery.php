<?php
namespace App\Queries\Prices;

use Illuminate\Database\Eloquent\Builder;

class PricesQuery extends Builder
{

    /**
     * @return $this
     */
    public function whereSearchDoctor(): self
    {

        if( request()->has('doctor') && request()->input('doctor') != '' )
        {
            $this->where('doctor_id', request()->input('doctor'));
        }

        if( request()->has('code') )
        {
            $this->whereNull('code');
        }

        if( request()->has('description') )
        {
            $this->where('description', 'like', '%' . request()->input('description') . '%');
        }

        return $this;

    }

    /**
     * @return $this
     */
    public function whereSearchDirection(): self
    {

        if( request()->has('direction') && request()->input('direction') != '' )
        {
            $this->where('direction_id', request()->input('direction'));
        }

        if( request()->has('code') )
        {
            $this->whereNull('code');
        }

        if( request()->has('description') )
        {
            $this->where('description', 'like', '%' . request()->input('description') . '%');
        }

        return $this;

    }

}

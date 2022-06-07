<?php
namespace App\Queries\Reviews;

use Illuminate\Database\Eloquent\Builder;

class ReviewsQuery extends Builder
{

    /**
     * @return $this
     */
    public function whereClinic(): self
    {

        if( request()->has('clinic') && request()->input('clinic') != '' )
        {
            $this->where('clinic_id', request()->input('clinic'));
        }

        return $this;

    }

    /**
     * @return $this
     */
    public function whereDoctor(): self
    {

        if( request()->has('doctor') && request()->input('doctor') != '' )
        {
            $this->where('doctor_id', request()->input('doctor'));
        }

        return $this;

    }

    /**
     * @return $this
     */
    public function whereDirection(): self
    {

        if( request()->has('direction') && request()->input('direction') != '' )
        {
            $this->where('direction_id', request()->input('direction'));
        }

        return $this;

    }

}

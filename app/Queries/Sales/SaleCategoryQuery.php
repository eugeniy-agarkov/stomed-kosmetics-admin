<?php
namespace App\Queries\Sales;

use Illuminate\Database\Eloquent\Builder;

class SaleCategoryQuery extends Builder
{

    /**
     * @return $this
     */
    public function whereNotCurrent(int $id): self
    {
        $this->where('id', '!=', $id);

        return $this;
    }

}

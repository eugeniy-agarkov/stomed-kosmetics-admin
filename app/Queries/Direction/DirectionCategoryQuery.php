<?php
namespace App\Queries\Direction;

use Illuminate\Database\Eloquent\Builder;

class DirectionCategoryQuery extends Builder
{

    /**
     * @return $this
     */
    public function whereNotCurrent(int $id): self
    {
        $this->where('id', '!=', $id);

        return $this;
    }

    /**
     * @param string $status
     */
    public function whereParents(): self
    {
        $this->whereNull('parent_id')->with('childrenCategories');

        return $this;
    }

    /**
     * @param string $status
     */
    public function whereChildrens(): self
    {
        $this->whereNotNull('parent_id');

        return $this;
    }

}

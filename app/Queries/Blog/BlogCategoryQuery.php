<?php
namespace App\Queries\Blog;

use Illuminate\Database\Eloquent\Builder;

class BlogCategoryQuery extends Builder
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

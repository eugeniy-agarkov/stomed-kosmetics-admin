<?php
namespace App\Http\Handlers\Blog;

use App\Http\Handlers\BaseHandler;
use App\Http\Requests\Blog\StoreBlogCategoryRequest;
use App\Models\Blog\BlogCategory;

class StoreBlogCategoryHandler extends BaseHandler
{

    /**
     * @param StoreBlogCategoryHandler $request
     * @param BlogCategory|null $category
     * @return BlogCategory|null
     */
    public function process(StoreBlogCategoryRequest $request, BlogCategory $category = null): ?BlogCategory
    {
        try {

            if (!$category)
            {
                $category = new BlogCategory();
            }

            $category->fill($request->all());

            if (!$category->save())
            {
                throw new \LogicException('Failed to store news record');
            }

            return $category;

        } catch (\Throwable $e) {

            $this->setErrors($e->getMessage());
            return null;

        }
    }

}

<?php
namespace App\Http\Handlers\Sales;

use App\Http\Handlers\BaseHandler;
use App\Http\Requests\Sales\StoreSaleCategoryRequest;
use App\Models\Sales\SaleCategory;

class StoreSaleCategoryHandler extends BaseHandler
{

    /**
     * @param StoreSaleCategoryHandler $request
     * @param SaleCategory|null $category
     * @return SaleCategory|null
     */
    public function process(StoreSaleCategoryRequest $request, SaleCategory $category = null): ?SaleCategory
    {
        try {

            if (!$category)
            {
                $category = new SaleCategory();
            }

            $category->fill($request->all());

            if (!$category->save())
            {
                throw new \LogicException('Failed to store news record');
            }

            return $category;

        } catch (\Throwable $e) {

            $this->setErrors('Не удалось сохранить запись');
            return null;

        }
    }

}

<?php
namespace App\Http\Handlers\Seo;

use App\Http\Handlers\BaseHandler;
use App\Http\Requests\Seo\StoreSeoRequest;
use App\Models\Seo\Seo;

class StoreSeoHandler extends BaseHandler
{

    /**
     * @param StoreSeoRequest $request
     * @param Seo|null $seo
     * @return Seo|null
     */
    public function process(StoreSeoRequest $request, Seo $seo = null): ?Seo
    {
        try {

            if (!$seo)
            {
                $seo = new Seo();
            }

            $seo->fill($request->all());

            if (!$seo->save())
            {
                throw new \LogicException('Failed to store news record');
            }

            return $seo;

        } catch (\Throwable $e) {

            $this->setErrors($e->getMessage());
            return null;

        }
    }

}

<?php
namespace App\Http\Handlers\Redirect;

use App\Http\Handlers\BaseHandler;
use App\Http\Requests\Redirect\StoreRedirectRequest;
use App\Models\Redirect\Redirect;

class StoreRedirectHandler extends BaseHandler
{

    /**
     * @param StoreRedirectRequest $request
     * @param Redirect|null $redirect
     * @return Redirect|null
     */
    public function process(StoreRedirectRequest $request, Redirect $redirect = null): ?Redirect
    {
        try {

            if (!$redirect)
            {
                $redirect = new Redirect();
            }

            $redirect->fill($request->all());

            if (!$redirect->save())
            {
                throw new \LogicException('Failed to store clinic record');
            }

            return $redirect;

        } catch (\Throwable $e) {

            $this->setErrors($e->getMessage());
            return null;

        }
    }

}

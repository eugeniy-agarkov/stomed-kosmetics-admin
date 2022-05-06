<?php
namespace App\Http\Handlers\Clinic;

use App\Http\Handlers\BaseHandler;
use App\Http\Requests\Clinic\StoreClinicRequest;
use App\Models\Clinic\Clinic;
use App\Models\Clinic\ClinicDetail;
use App\Models\Clinic\ClinicPage;
use Illuminate\Database\ConnectionInterface;

class StoreClinicHandler extends BaseHandler
{

    /**
     * @param StoreClinicRequest $request
     * @param Clinic|null $clinic
     * @return Clinic|null
     */
    public function process(StoreClinicRequest $request, Clinic $clinic = null): ?Clinic
    {
        try {

            if (!$clinic)
            {
                $clinic = new Clinic();
            }

            $clinic->fill($request->all());

            if (!$clinic->save())
            {
                throw new \LogicException('Failed to store clinic record');
            }

            $this->storeClinicPage($request, $clinic);
            $this->storeClinicDetail($request, $clinic);

            return $clinic;

        } catch (\Throwable $e) {

            $this->setErrors($e->getMessage());
            return null;

        }
    }

    /**
     * @param StoreClinicRequest $request
     * @param Clinic $clinic
     */
    protected function storeClinicPage(StoreClinicRequest $request, Clinic $clinic): void
    {

        if (!$page = $clinic->page)
        {
            $page = (new ClinicPage())->clinic()->associate($clinic);
        }

        $page->fill($request->all());

        if (!$page->save())
        {
            throw new \LogicException('Failed to store clinic overview');
        }
    }

    /**
     * @param StoreClinicRequest $request
     * @param Clinic $clinic
     */
    protected function storeClinicDetail(StoreClinicRequest $request, Clinic $clinic): void
    {

        if (!$detail = $clinic->detail)
        {
            $detail = (new ClinicDetail())->clinic()->associate($clinic);
        }

        $detail->fill($request->all());

        if (!$detail->save())
        {
            throw new \LogicException('Failed to store clinic details');
        }
    }

}

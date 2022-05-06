<?php
namespace App\Http\Handlers\Clinic;

use App\Http\Handlers\BaseHandler;
use App\Http\Requests\Clinic\StoreClinicFaqRequest;
use App\Models\Clinic\Clinic;
use App\Models\Clinic\ClinicFaq;

class StoreClinicFaqHandler extends BaseHandler
{

    /**
     * @param StoreClinicFaqRequest $request
     * @param Clinic $clinic
     * @param ClinicFaq|null $faq
     * @return ClinicFaq|null
     */
    public function process(StoreClinicFaqRequest $request, Clinic $clinic, ClinicFaq $faq = null): ?ClinicFaq
    {
        try {

            if (!$faq)
            {
                $faq = new ClinicFaq();
            }

            $faq->fill($request->all());
            $faq->clinic()->associate($clinic);

            if (!$faq->save())
            {
                throw new \LogicException('Failed to store news record');
            }

            return $faq;

        } catch (\Throwable $e) {

            $this->setErrors('Не удалось сохранить запись');
            return null;

        }
    }

}

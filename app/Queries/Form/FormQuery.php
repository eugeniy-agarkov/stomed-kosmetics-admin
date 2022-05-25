<?php
namespace App\Queries\Form;

use App\Enums\FormEnum;
use Illuminate\Database\Eloquent\Builder;

class FormQuery extends Builder
{

    /**
     * @return $this
     */
    public function whereFeedback(): self
    {
        $this->where('form', FormEnum::FEEDBACK);

        return $this;
    }

    /**
     * @return $this
     */
    public function whereAppointment(): self
    {
        $this->whereIn('form', [FormEnum::APPOINTMENTS, FormEnum::DIRECTION, FormEnum::APPLICATION, FormEnum::DOCTORS]);

        return $this;
    }

}

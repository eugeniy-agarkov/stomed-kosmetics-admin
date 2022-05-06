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
        $this->where('form', FormEnum::APPOINTMENTS);

        return $this;
    }

}

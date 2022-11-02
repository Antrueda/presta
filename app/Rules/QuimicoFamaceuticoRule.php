<?php

namespace App\Rules;

use App\User;
use Illuminate\Contracts\Validation\Rule;

class QuimicoFamaceuticoRule implements Rule
{
    private $dataxxxx;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($dataxxxx)
    {
        $this->dataxxxx = $dataxxxx;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $respuest = true;
        $userxxxx = User::select(['quimfarm'])->where('quimfarm', 1)->first();
        $segments = $this->dataxxxx->segments();
        if ($segments[1] == 'crear' && $userxxxx != null) {
            if ($userxxxx->quimfarm == 1 && $this->dataxxxx->quimfarm == 1) {
                $respuest = false;
            }
        } elseif ($userxxxx != null && $userxxxx->id != $segments[2] && $userxxxx->quimfarm == 1 && $this->dataxxxx->quimfarm == 1) {
            $respuest = false;
        }
        return $respuest;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Ya hay un químico farmacéutico asinado';
    }
}

<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class FechastaRule implements Rule
{
    private $fechdesd, $fechasta;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($fechdesd, $fechasta)
    {
        $this->fechdesd = $fechdesd;
        $this->fechasta = $fechasta;
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
        return $this->fechdesd > $this->fechasta ? false : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La fecha hasta debe ser mayoy o igual a la fecha desde.';
    }
}

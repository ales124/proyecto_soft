<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Carrera;
use Illuminate\Http\Request;

class validarCodigo implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        //
    }

    public function update(Request $request, Carrera $carrera)
    {
        $data = $request->validate([
            'codigo'=> 'regex:/[1-9]/|unique:carreras,codigo|,'.$carrera->codigo,
        ]);
    }



    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'aasd';
    }
}

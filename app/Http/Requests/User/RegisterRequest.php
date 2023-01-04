<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "username" => 'required|min:2|max:15|unique:users,username',
            "country" => 'required|exists:countries,id',
            "name" => 'required|min:3|max:50',
            "last_name" => 'required|min:3|max:50',
            "email" => 'required|email|unique:users,email',
            "password" => 'required|min:8'
        ];
    }

    public function messages()
    {
        return[
            "username.required" => 'Ingrese su A.K.A',
            "username.min" => 'El A.K.A debe tener un minimo de 2 caracteres',
            "username.max" => 'El A.K.A debe tener un maximo de 15 caracteres',
            "username.unique" => 'El A.K.A no se encuentra disponible',
            "country.required" => "Seleccione un país",
            "country.exists" => "El país seleccionado, no se encuentra disponible",
            "name.required" => "Ingrese su nombre",
            "name.min" => "El nombre debe tener un minimo de 3 caracteres",
            "name.max" => "El nombre debe tener un maximo de 50 caracteres",
            "last_name.required" => "Ingrese su apellido",
            "last_name.min" => "El apellido debe tener un minimo de 3 caracteres",
            "last_name.max" => "El apellido debe tener un maximo de 50 caracteres",
            "email.required" => "Ingrese su correo electrónico",
            "email.email" => "El correo electrónico no es valido",
            "email.unique" => "El correo electrónico no se encuentra disponible",
            "password.required" => "Ingrese su contraseña",
            "password.min" => "La contraseña debe tener un minimo de 8 caracteres"

        ];
    }
}

<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        session()->flash('statusTitle', 'Verifique su Cuenta');
        session()->flash('statusMessage', 'Ingrese a su correo electrónico para verificar su cuenta de email.');
        session()->flash('statusColor', 'warning');
        
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'slug' => str()->slug($input['name']),
            'password' => Hash::make($input['password']),
        ]);
    }
}

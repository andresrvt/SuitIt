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

            'name' => ['required', 'string', 'min:2', 'max:255'],
            'surname' =>  ['required', 'string', 'min:2', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'min:0',
                'max:255',
                'regex:/(.*)@(.*)\.(es|com|org)/i',
                Rule::unique(User::class),
            ],
            // "birthdate" => 'after_or_equals:01/01/1923',
            'occupation' => ['required'],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'surname' => $input['surname'],
            'occupation' => $input['occupation'],
            'email' => $input['email'],
            'birthdate' => $input['birthdate'],
            'password' => Hash::make($input['password']),
        ]);
    }
}

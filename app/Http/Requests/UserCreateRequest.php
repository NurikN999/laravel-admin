<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema (
 *     title="Store User request",
 *     description="Store User request body data"
 * )
 */
class UserCreateRequest extends FormRequest
{
    /**
     * @OA\Property(
     *     title="firstname"
     * )
     *
     * @var string
     */
    public $firstname;
    /**
     * @OA\Property(
     *     title="lastname"
     * )
     *
     * @var string
     */
    public $lastname;
    /**
     * @OA\Property(
     *     title="email"
     * )
     *
     * @var string
     */
    public $email;
    /**
     * @OA\Property(
     *     title="role_id"
     * )
     *
     * @var integer
     */
    public $role_id;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
        ];
    }
}

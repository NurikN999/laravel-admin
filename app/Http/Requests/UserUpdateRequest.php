<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
/**
 * @OA\Schema (
 *     title="Update User request",
 *     description="Update User request body data"
 * )
 */
class UserUpdateRequest extends FormRequest
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
     * Determine if the user is authorized to make this request.
     *
     * @return bool
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
            "email" => "email"
        ];
    }
}

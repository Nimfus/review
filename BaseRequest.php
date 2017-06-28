<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Created by PhpStorm.
 * User: Nimfus
 * Date: 08.01.17
 * Time: 17:43
 */

class BaseRequest extends FormRequest
{
    /**
     * @return array
     */
    public function validatedOnly(): array
    {
        return array_filter($this->only(array_keys($this->rules())));
    }
}
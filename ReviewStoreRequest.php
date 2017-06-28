<?php
namespace App\Http\Requests;

class ReviewStoreRequest extends BaseRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'company_id' => 'required|exists:companies,id',
            'type' => 'required|in:positive,negative',
            'rating' => '',
            'name' => '',
            'email' => 'required|email',
            'message' => 'required|min:3'
        ];
    }
}
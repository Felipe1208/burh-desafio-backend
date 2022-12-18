<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'tittle' => 'required',
            'description' => 'required|max:240',
            'job_type_id' => 'required|numeric|exists:job_types,id',
            'salary' => 'required_unless:job_type_id,2',
            'start_time' => 'required_unless:job_type_id,2|date_format:H:i:s|required_with:end_time',
            'end_time' => 'required_unless:job_type_id,2|date_format:H:i:s|required_with:start_time',
            'company_id' => 'required|numeric|exists:companies,id'
        ];
    }
}

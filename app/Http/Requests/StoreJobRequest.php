<?php

namespace App\Http\Requests;

use App\Models\JobType;
use App\Rules\TotalTime;
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
        $requiredUnlessPJ = 'required_unless:job_type_id,' . JobType::PJ;

        $salaryRule = [$requiredUnlessPJ, 'numeric'];

        if ($this->job_type_id == JobType::CLT) {
            $salaryRule[] = 'min:1212';
        }

        $endTimeRule = [$requiredUnlessPJ, 'date_format:H:i:s', 'required_with:start_time'];

        if ($this->job_type_id == JobType::ESTAGIO) {
            $endTimeRule[] = new TotalTime;
        }

        return [
            'title' => 'required',
            'description' => 'required|max:240',
            'job_type_id' => 'required|numeric|exists:job_types,id',
            'salary' => $salaryRule,
            'start_time' => [$requiredUnlessPJ, 'date_format:H:i:s', 'required_with:end_time'],
            'end_time' => $endTimeRule,
            'company_id' => 'required|numeric|exists:companies,id'
        ];
    }
}

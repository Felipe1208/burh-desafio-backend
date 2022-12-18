<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\InvokableRule;

class TotalTime implements DataAwareRule, InvokableRule
{
    protected $data = [];

    public const SIX_HOURS_IN_SECONDS = 21600;

    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */

    public function __invoke($attribute, $value, $fail)
    {
        $startTime = Carbon::parse($this->data["start_time"]);
        $endTime = Carbon::parse($this->data["end_time"]);

        $totalDuration = $endTime->diffInSeconds($startTime);

        if ($totalDuration > $this::SIX_HOURS_IN_SECONDS) {
            $fail('A carga horária não deve passar de 6h');
        }
    }

    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }
}

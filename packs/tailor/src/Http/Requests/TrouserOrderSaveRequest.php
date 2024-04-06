<?php
namespace Dani\Tailor\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Dani\Tailor\Traits\OrderSaveRequestTrait;

class TrouserOrderSaveRequest extends FormRequest
{
    use OrderSaveRequestTrait;

    public function authorize(): bool
    {
        return 1;
    }

    public function rules(): array
    {
        $out = [];
        foreach(['waist_around', 'hip_around', 'waist_to_heel'] as $measurement){
            $out[$measurement] = ['required', 'integer', 'min:0', ];
        }
        return array_merge($this->get_basic_rules(), $out);
    }
}

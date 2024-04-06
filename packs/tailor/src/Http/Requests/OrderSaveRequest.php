<?php
namespace Dani\Tailor\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Dani\Tailor\Traits\OrderSaveRequestTrait;

class OrderSaveRequest extends FormRequest
{
    use OrderSaveRequestTrait;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return 1;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return $this->get_basic_rules();
    }
}

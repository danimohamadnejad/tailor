<?php
namespace Dani\Tailor\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Dani\Tailor\Garments\Garment;

class OrderSaveRequest extends FormRequest
{
    protected ?Garment $garment = null;

    public function authorize(): bool
    {
        return 1;
    }

    public function rules(): array
    {
     $garment_types = array_keys(config('dani-tailor.garments'));
     $fabric_types = array_keys(config('dani-tailor.fabrics'));
     /* basic rules */
     $out = [
        'garment_type'=>['required', "in:".implode(',', $garment_types)],
        'fabric_type'=>['required', "in:".implode(',', $fabric_types),],
     ];   
     $garment_type = request()->input('garment_type');
     /* more rules to be added to $out based on garment type */
     if(in_array($garment_type, $garment_types)){
        $garment_class = config("dani-tailor.garments.{$garment_type}.class");
        $garment_instance = app()->make($garment_class);
        $out = array_merge($out, $garment_instance->get_order_save_request_rules());
        $this->garment = $garment_instance;
     }
     return $out;
    }
    public function get_garment(){
        return $this->garment;
    }
}

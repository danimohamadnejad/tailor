<?php
namespace Dani\Tailor\Garments;
use Dani\Tailor\Garments\Garment;

class Shirt extends Garment{
    public int $chest_around = 0;
    public int $shoulder_width = 0;
    
    public function get_cost() : float{
     $out = $this->get_swing_cost();
     return $out + $this->calculate_fabric_cost();        
    }
    
    public function get_order_save_request_rules() : array{
        $sizes = [
            'chest_around', 'shoulder_width' 
        ];
        $out = [];
        foreach($sizes as $size){
            $out[$size] = ['required', 'integer', 'min:0'];
        }
        return $out;
    }
    public function get_description() : string {
        $out = __('public.chest-around').': '.$this->chest_around.', '.__('public.shoulder-width')
         .': '.$this->shoulder_width.' '.$this->measurements_unit;
        return $out;
    }
    public function calculate_fabric_cost() : float{
        return 2.4 * $this->fabric->get_cost_per_yard();
    }
    
}
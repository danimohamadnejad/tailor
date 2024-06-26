<?php
namespace Dani\Tailor\Garments;
use Dani\Tailor\Garments\Garment;

class Trouser extends Garment{
    public int $waist_around = 0;
    public int $hip_around = 0;
    public int $waist_to_heel = 0;
    
    public function get_cost() : float{
     $out = $this->get_swing_cost();
     return $out + $this->calculate_fabric_cost();        
    }
    
    public function get_order_save_request_rules() : array{
        $sizes = [
            'waist_around', 'hip_around', 'waist_to_heel' 
        ];
        $out = [];
        foreach($sizes as $size){
            $out[$size] = ['required', 'integer', 'min:0'];
        }
        return $out;
    }
    public function get_description() : string {
        $out = __("public.waist-around").": {$this->waist_around}, ".__('public.hip-around')
         .": {$this->hip_around}, ".__('public.waist-to-heel').': '.$this->waist_to_heel.' '.$this->measurements_unit;
        return $out;
    }
    public function calculate_fabric_cost() : float{
        $required_fabric_in_yards = inches_to_yards($this->waist_to_heel * 2);
        return $this->fabric->get_cost_per_yard() * $required_fabric_in_yards;
    }
    
}
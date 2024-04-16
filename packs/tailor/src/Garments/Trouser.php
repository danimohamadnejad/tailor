<?php
namespace Dani\Tailor\Garments;
use Dani\Tailor\Garments\Garment;

class Trouser extends Garment{
    public int $waist_around;
    public int $hip_around;
    public int $waist_to_heel;
    
    public function get_cost() : float{
     $out = $this->cost;
     return $out + $this->fabric->get_year_cost();        
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
    
}
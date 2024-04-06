<?php
namespace Dani\Tailor\Traits;
trait OrderSaveRequestTrait{
 
 public function get_basic_rules(){
    $garments = tailor_get_garments();
    $garment_values = array_map(function($d){
        return $d['type'];
    }, $garments);
    $fabric_types = array_map(function($d){
        return $d['type'];
    }, tailor_get_fabrics());
    return [
        'garment_type'=>['required', "in:".implode(',', $garment_values)],
        'fabric_type'=>['required', 'in:'.implode(',', $fabric_types)],
    ];
 }

}
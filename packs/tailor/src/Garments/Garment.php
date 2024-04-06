<?php
namespace Dani\Tailor\Garments;
use Dani\Tailor\Fabrics\Fabric;

abstract class Garment {
    protected Fabric $fabric;

    public function __construct(){

    }
    public function set_attributes(array $data){
     foreach($data as $k=>$v){
        if(isset($this->$k)){
            $this->$k = $v;
        }
     }
     return $this;
    }
    public function set_fabric(Fabric $fabric){
        $this->fabric = $fabric;
        return $this;
    }
    public abstract function get_cost() : float;
    public function set_fabric_by_type($fabric_type){
        $fabric_attributes = tailor_find_fabric_by_type($fabric_type);
        $f = app()->make($fabric_attributes['class']);
        $this->set_fabric($f);
        return $this;
    }
    public static function create_garment_by_type($type){
     $attributes = tailor_find_garment_by_type($type);
     $out = app()->make($attributes['class']);
     return $out;
    }  
    public function get_fabric(){
        return $this->fabric;
    }
}
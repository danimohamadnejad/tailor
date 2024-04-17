<?php
namespace Dani\Tailor\Garments;
use Dani\Tailor\Fabrics\Fabric;
use Dani\Tailor\Interfaces\ItemableInterface;
use Dani\Tailor\Interfaces\InvoiceableInterface;

abstract class Garment implements ItemableInterface, InvoiceableInterface{
    protected Fabric $fabric;
    protected array $attributes = [];
    protected $garment_type = 'garment-type'; /* trouser, shirt, ... */
    protected $measurements_unit = 'inches';

    public function to_invoice_array() : array {
        $notes=__('public.sweing-cost').': '.$this->get_sweing_cost().' + '
         .__('public.fabric-cost').': '.$this->calculate_fabric_cost().' = '.$this->get_cost().' '.get_currency();
        return [
            'notes'=>$notes,
        ];
    }
    public function to_item_array() : array {
        return [
         'name'=>$this->get_name().' - '.\Str::random(),
         'rate'=>$this->get_cost(),
         'description'=>$this->get_description(),
        ];
    }
    
    public function set_measurements(array $data){
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
    public abstract function calculate_fabric_cost() : float;
    public abstract function get_description() : string;
    public abstract function get_order_save_request_rules() : array;
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
    public function get_attributes(){
        return config("dani-tailor.garments.{$this->garment_type}");
    }
    protected function init_attributes(){
        if(empty($this->attributes)){
            $this->attributes = $this->get_attributes();
        }
    }
    public function get_name(){
     $this->init_attributes();
     return __($this->attributes['text']);
    }
    public function get_swing_cost(){
     $this->init_attributes();
     return $this->attributes['sweing-cost'];   
    }
    public function get_sweing_cost(){
     $this->init_attributes();
     return $this->attributes['sweing-cost'];
    }
}
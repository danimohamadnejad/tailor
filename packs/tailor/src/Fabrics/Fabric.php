<?php
namespace Dani\Tailor\Fabrics;
abstract class Fabric {
    protected $fabric_type = '';
    protected $attributes = [];

    public function get_cost_per_yard(){
        $this->init_attributes();
        return $this->attributes['cost-per-yard'];
    }
    protected function init_attributes(){
        if(empty($this->attributes))
         $this->attributes = config("dani-tailor.fabrics.{$this->fabric_type}");  
        return $this;
    }
}
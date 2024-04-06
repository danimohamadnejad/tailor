<?php
namespace Dani\Tailor\Fabrics;
abstract class Fabric {
    public function get_yard_cost(){
        return $this->yard_cost;
    }
}
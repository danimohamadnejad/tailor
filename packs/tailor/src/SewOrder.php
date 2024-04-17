<?php
namespace Dani\Tailor;
use Dani\Tailor\Garments\Garment;
use Dani\Tailor\Zohobooks\Models\Contact;
use Dani\Tailor\Zohobooks\Models\Item;

class SewOrder {
    protected Garment $garment;
    protected Contact $customer;
    
    public function set_garment(Garment $garment){
       $this->garment =$garment;
       return $this;     
    }

    public function set_customer(Contact $customer){
        $this->customer = $customer;
        return $this;
    }

    public function create_invoice(){
    }
}
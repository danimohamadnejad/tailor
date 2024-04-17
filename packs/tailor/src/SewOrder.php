<?php
namespace Dani\Tailor;
use Dani\Tailor\Garments\Garment;
use Dani\Tailor\Zohobooks\Models\Contact;
use Dani\Tailor\Zohobooks\Models\Item;
use Dani\Tailor\Zohobooks\Models\Invoice;

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
        $item = $this->create_item();
        $data_from_garment = $this->garment->to_invoice_array();
        $data = [
            'customer_id'=>$this->customer->getKey(),
            'line_items'=>[
             ['item_id'=>$item->getKey()]
            ]
        ];
        $data = array_merge($data, $data_from_garment);
        $invoice = Invoice::model()->create($data);
        var_dump($invoice, $invoice->getKey());exit;
    }

    private function create_item(){
        $data = $this->garment->to_item_array();
        $item = Item::model()->create($data);
        if(!is_a($item, Item::class)){
            throw new \Exception('could not create order item');
        }
        return $item;
    }
}
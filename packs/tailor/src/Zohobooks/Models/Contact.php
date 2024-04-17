<?php
namespace Dani\Tailor\Zohobooks\Models;
use Dani\Tailor\Zohobooks\Models\ZohobookModel;

class Contact extends ZohobookModel{
  protected $uri = 'contacts';
  protected $primary_key = 'contact_id';
  public function filter_customers(){
   $this->query['contact_type'] = 'customer';
   return $this;   
  }
}
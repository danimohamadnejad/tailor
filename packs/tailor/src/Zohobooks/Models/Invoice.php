<?php
namespace Dani\Tailor\Zohobooks\Models;
use Dani\Tailor\Zohobooks\Models\ZohobookModel;

class Invoice extends ZohobookModel{
  protected $uri = 'invoices';
  protected $primary_key = 'invoice_id';

}
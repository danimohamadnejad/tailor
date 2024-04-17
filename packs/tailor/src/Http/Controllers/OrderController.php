<?php
namespace Dani\Tailor\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Dani\Tailor\Http\Requests\OrderSaveRequest;
use Dani\Tailor\SewOrder;
use Dani\Tailor\Zohobooks\Models\Item;
use Dani\Tailor\Zohobooks\Models\Contact;

class OrderController extends Controller
{
    public function store(OrderSaveRequest $req, SewOrder $order, Contact $customer_model){
      $data = $req->validated();
      $garment = $req->get_garment();
      $garment->set_measurements($data)
       ->set_fabric_by_type($data['fabric_type']);
      $invoice = $order->set_garment($garment)->set_customer(
        $customer_model->filter_customers()->first()
      )->create_invoice();
    }
}

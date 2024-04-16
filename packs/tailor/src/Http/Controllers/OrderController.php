<?php
namespace Dani\Tailor\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Dani\Tailor\Http\Requests\OrderSaveRequest;
use Dani\Tailor\Zohobooks\Order;

class OrderController extends Controller
{
    public function store(OrderSaveRequest $req, Order $order){
      $data = $req->validated();
      $garment = $req->get_garment();
      $garment->set_attributes($data);
      
    }
}

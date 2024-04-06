<?php
namespace Dani\Tailor\Http\Controllers;
use Illuminate\Http\Request;
use Dani\Tailor\Http\Requests\OrderSaveRequest;
use App\Http\Controllers\Controller;
use Dani\Tailor\Garments\Garment;
use Dani\Tailor\Zoho\Models\Customer;

class OrderController extends Controller
{
    public function store(OrderSaveRequest $req){
        $data = $req->validated();
        $garment = tailor_find_garment_by_type($data['garment_type']);
        $data = (app()->make($garment['order-save-request']))->validated();
        $garment = (Garment::create_garment_by_type($data['garment_type']))->
         set_attributes($data);
        $garment->set_fabric_by_type($data['fabric_type']);
        $customer = Customer::first_or_create();
    }
}

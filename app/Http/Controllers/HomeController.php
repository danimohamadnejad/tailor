<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Dani\Tailor\Zohobooks\Models\Organization;
use Dani\Tailor\Zohobooks\Models\Contact;
use Dani\Tailor\Zohobooks\Models\Item;

class HomeController extends Controller
{
    public function index(Item $model){
       $dani = $model->get();
       $dani = current($dani);
       return $dani->getKey();
    }
}    



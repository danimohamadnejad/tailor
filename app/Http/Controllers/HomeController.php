<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => "https://accounts.zoho.com/oauth/v2/token?grant_type=authorization_code&client_id=1000.IJM2PVV90CWI9JQI2RV9V8RKIT1U4L&client_secret=939af4604eea078353bc6d45e4ee003d415547b849&redirect_uri=http://localhost:8000/dani&code=1000.74468cfff6fa58ada452987ecd069039.679a985d3b941f405be446e8b828ff4f",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_HTTPHEADER => array(
"cache-control: no-cache"
),
));

$response = curl_exec($curl);
dd($response);
    }
}

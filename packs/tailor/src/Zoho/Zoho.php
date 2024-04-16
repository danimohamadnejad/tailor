<?php
namespace Dani\Tailor\Zoho;
class Zoho { 
  public static function generate_access_token(){
    $curl = curl_init("https://accounts.zoho.com/oauth/v2/token");
    curl_setopt($curl, CURLOPT_POST, 1);
    $post_data = [
     'client_id'=>config('dani-tailor.zoho.client-id'),
     'client_secret'=>config('dani-tailor.zoho.client-secret'),
     'refresh_token'=>config('dani-tailor.zoho.refresh-token'),
     'redirect_uri'=>'http://www.zoho.com/books',
     'grant_type'=>'refresh_token',
    ];
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post_data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $res = curl_exec($curl);
    if($res){
      return json_decode($res, 1)['access_token'];
    }
    return false;
  }
}
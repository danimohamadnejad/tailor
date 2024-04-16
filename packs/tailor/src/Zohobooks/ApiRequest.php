<?php
namespace Dani\Tailor\Zohobooks;
use Dani\Tailor\Zoho\Zoho;

class ApiRequest{
 protected $base_uri = 'https://www.zohoapis.com/books/v3';
 protected $uri;
 protected $method;
 protected $auth_header = "";   
 protected $auth_header_generation_attempts = 0;  
 
 public function __construct(){
    $this->generate_auth_header_from_token(config('dani-tailor.zoho.access-token'));
 }

 public function uri($uri){
  $this->uri = $uri;
  return $this;
 }

 protected function method($method){
    $this->method = $method;
    return $this;
 }

 public function get(){
  return $this->method('GET')->send();     
 }

 protected function send(){
    if($this->should_generate_auth_header())
    {
     $this->generate_auth_header();
    }
    $url = $this->base_uri."/".trim($this->uri, '/');
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    if($this->is_post()){
     curl_setopt($curl, CURLOPT_POST, 1);
    }
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
      $this->auth_header,
    ]);
    $res = curl_exec($curl);
    curl_close($curl);
    $this->reset_auth_header_generation_attempts();
    return $this->extract_data_from_successful_response(
      $res
    );
 }
 protected function reset_auth_header_generation_attempts(){
    $this->auth_header_generation_attempts = 0;
    return $this;
 }
 public function is_post(){
    return $this->method == 'POST';
 }
 protected function should_generate_auth_header(){
    $auth_header_generated_at = config('dani-tailor.zoho.auth-header-generated-at');
    if(is_int($auth_header_generated_at)){
     return (time() - $auth_header_generated_at) > (config('dani-tailor.zoho.auth-header-generation-interval'));
    }
    return true;
 }

 protected function generate_auth_header(){
   $this->auth_header_generation_attempts++;
   if($this->auth_header_generation_attempts > 3){
    $this->reset_auth_header_generation_attempts();
    throw new \Exception("could not get zoho books access token");
    exit;
   }  
   $token = Zoho::generate_access_token();
   if(!$token){
    return $this->generate_auth_header();
   }
   config(['dani-tailor.zoho.access-token'=>$token, 
    'dani-tailor.zoho.auth-header-generated-at'=>time()]);
   file_put_contents(config_path('dani-tailor.php'), "<?php return ".var_export(config('dani-tailor'), true).';'); 
   $this->generate_auth_header_from_token($token);
 }
 protected function generate_auth_header_from_token($token){
    if($token){
     $this->auth_header = "Authorization: Zoho-oauthtoken {$token}";
    }
    return $this;
 }
 protected function extract_data_from_successful_response($res){
   if($res){
    $data = json_decode($res, 1);
    array_shift($data);
    array_shift($data); 
    return current($data);
   } 
   return false;       
 }
}
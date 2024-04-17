<?php
namespace Dani\Tailor\Zohobooks;
use Dani\Tailor\Zoho\Zoho;

class ApiRequest{
 protected $base_uri = 'https://www.zohoapis.com/books/v3';
 protected $uri;
 protected $method;
 protected $auth_header = "";   
 protected $auth_header_generation_attempts = 0;  
 protected $query = [];
 protected $body = [];
 protected $response_code = null;

 public function __construct(){
    $this->generate_auth_header_from_token(config('dani-tailor.zoho.access-token'));
 }
 public function body(array $body = []){
   $this->body = $body;
   return $this;
 }
 public function query(array $query = []){
    $this->query = $query;
    return $this;
 }
 public function uri($uri){
  $this->uri = $uri;
  return $this;
 }

 protected function method($method){
    $this->method = $method;
    return $this;
 }
 public function reset(){
   $this->uri = '';
   $this->query = [];
   $this->body = [];
   $this->method = '';
   $this->response_code = null;
   $this->reset_auth_header_generation_attempts();
   return $this;
}
 public function get(){
  return $this->method('GET')->send();     
 }
 public function post(){
   return $this->method('POST')->send();
 }
 protected function send(){
    if($this->should_generate_auth_header())
    {
     $this->generate_auth_header();
    }
    $url = $this->base_uri."/".trim($this->uri, '/').'?'.http_build_query($this->query);
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    if($this->is_post()){
     curl_setopt($curl, CURLOPT_POST, 1);
     curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($this->body));
    }
    curl_setopt($curl, CURLOPT_HTTPHEADER, $this->get_headers());
    $res = curl_exec($curl);
    curl_close($curl);
    return $this->process_response(
      $res
    );
 }
 protected function get_headers(){
   $out = [
      $this->auth_header,
   ];
   if($this->is_post()){
      $out[] = "Content-Type: application/json";
   }
   return $out;
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
 public function is_successful(){
   return $this->response_code === 0;
 }
 protected function process_response($res){
   if($res){
    $data = json_decode($res, 1);
    $this->response_code = current($data);
    return $data;
   }
   return false;
 }
 public function extract_data_from_succesful_response(array $response = []){
   array_shift($response);
   array_shift($response);
   return current($response); 
 }
}
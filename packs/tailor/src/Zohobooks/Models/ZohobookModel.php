<?php
namespace Dani\Tailor\Zohobooks\Models;
use Dani\Tailor\Zohobooks\ApiRequest;

abstract class ZohobookModel {
    protected ?ApiRequest $api_request = null;
    protected $uri;
    protected $query = [];
    protected $primary_key = 'id';
    
    public function __construct(ApiRequest $req = null){
        $this->api_request = $req;
    }
    public function getKey(){
        $pk = $this->primary_key;
        return $this->$pk;  
    }
    public function get(){
        $res = $this->api_request->reset()->query($this->query)->uri($this->uri)->get();
        $out = [];
        if($this->api_request->is_successful()){
         $out = $this->api_request->extract_data_from_succesful_response($res);
        }
        foreach($out as $index=>$data){
            $out[$index] = $this->array_to_model($data);
        }
        return $out;
    }
    
    public function first(){
        $res = $this->get();
        return !empty($res) ? current($res) : null;
    }
    public function array_to_model(array $data = []){
       $selfclass = get_called_class();
       $out = new $selfclass;
       foreach($data as $attribute=>$value)
       {
        $out->$attribute = $value;
       } 
       return $out;
    }
    public function create(array $data){
      $res = $this->api_request->reset()->uri($this->uri)->body($data)->post();  
      if($this->api_request->is_successful()){
        $data = $this->api_request->extract_data_from_succesful_response($res);
        return $this->array_to_model($data);
      }
      return $this->api_request->extract_msg_from_failed_response($res);
    }
    public static function model(){
        $class = get_called_class();
        return app()->make($class);
    }
}
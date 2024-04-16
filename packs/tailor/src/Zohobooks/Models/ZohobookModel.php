<?php
namespace Dani\Tailor\Zohobooks\Models;
use Dani\Tailor\Zohobooks\ApiRequest;

abstract class ZohobookModel {
    protected ?ApiRequest $api_request = null;
    protected $uri;
    protected $query = [];
    protected $key;
    
    public function __construct(ApiRequest $req = null){
        $this->api_request = $req;
    }
    public function get(){
        $out = $this->api_request->query($this->query)->uri($this->uri)->get();
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
}
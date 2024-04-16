<?php
namespace Dani\Tailor\Zohobooks\Models;
use Dani\Tailor\Zohobooks\ApiRequest;

abstract class ZohobookModel {
    protected ApiRequest $api_request;
    protected $uri;
    
    public function __construct(ApiRequest $req){
        $this->api_request = $req;
    }
    public function get(){
        return $this->api_request->uri($this->uri)->get();
    }
    
}
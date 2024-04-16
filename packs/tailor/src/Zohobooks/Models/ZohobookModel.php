<?php
namespace Dani\Tailor\Zohobooks\Models;
use Dani\Tailor\Zohobooks\ZohobookApiRequest;

abstract class ZohobookModel {
    protected ZohobookApiRequest $api_request;
    protected $uri;
    
    public function __construct(ZohobookApiRequest $req){
        $this->api_request = $req;
    }
    public function get(){
        return $this->api_request->uri($this->uri)->get();
    }
    
}
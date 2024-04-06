<?php
function tailor_get_garments(){
  return tailor_config("garments");  
}
function tailor_config($key, $value = null){
 return config("dani-tailor.{$key}", $value);
} 
function tailor_find_garment_by_type($type){
    foreach(tailor_get_garments() as $k=>$data){
      if($data['type'] == $type){
        return $data;
      }
    }
    return null;
}
function tailor_get_fabrics(){
  return tailor_config('fabrics');
}
function tailor_find_fabric_by_type($type){
 foreach(tailor_get_fabrics() as $data){
  if($data['type'] == $type)
   return $data;
 } 
 return null;
} 
<?php
namespace Dani\Tailor;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class TailorServiceProvider extends ServiceProvider{

  public function boot(){
   $this->publishes([
    __DIR__.'/../config/tailor.php'=>config_path('dani-tailor.php')
   ], 'dani.tailor.config');  
   $this->mergeConfigFrom(__DIR__.'/../config/tailor.php', 'dani-tailor'); 
   $this->load_routes();
  }  
  private function load_routes(){
    Route::group(['prefix'=>config('dani-tailor.routes-prefix'), 
     'as'=>config('dani-tailor.routes-alias')], function(){
      $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
     });
  }
}
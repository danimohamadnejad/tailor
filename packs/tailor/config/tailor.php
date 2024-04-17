<?php return array (
  'zoho' => 
  array (
    'client-id' => '1000.5VZUD9OKIR6J8MELFTQ3Y5DJZVNAMC',
    'client-secret' => 'af0f5f3a6829a2020122086adb402af34b9f790e37',
    'access-token' => '1000.5d725fa2063dca62352d819f7148f573.54df128103174e9b71ea730d26d5509f',
    'refresh-token' => '1000.d246fa77fbf6fdb2d2f9c536285b4847.77c40208cebd82d8fb274991f4703544',
    'auth-header-generated-at' => 1713352599,
    'auth-header-generation-interval' => 3600,
  ),
  'routes-prefix' => 'tailor',
  'routes-alias' => 'tailor.',
  'garments' => 
  array (
    'trouser' => 
    array (
      'type' => 'trouser',
      'text' => 'public.trouser',
      'class' => 'Dani\\Tailor\\Garments\\Trouser',
      'sweing-cost' => 20,
    ),
    'shirt' => 
    array (
      'type' => 'trouser',
      'text' => 'public.trouser',
      'class' => 'Dani\\Tailor\\Garments\\Shirt',
      'sweing-cost' => 10.5,
    ),
  ),
  'fabrics' => 
  array (
    'cotton' => 
    array (
      'text' => 'public.cotton',
      'type' => 'cotton',
      'class' => 'Dani\\Tailor\\Fabrics\\Cotton',
      'cost-per-yard' => 2.8,
    ),
    'leather' => 
    array (
      'text' => 'public.leather',
      'type' => 'leather',
      'class' => 'Dani\\Tailor\\Fabrics\\Leather',
      'cost-per-yard' => 3.2,
    ),
  ),
);
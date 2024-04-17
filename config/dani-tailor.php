<?php return array (
  'zoho' => 
  array (
    'client-id' => '1000.8EZ82UEPTJNSPJRU2MD21ZIQF9202K',
    'client-secret' => '71f7a4e4973d9756e1f737415e393dba790b97a236',
    'access-token' => '1000.a2db7beb035d0f76a4b7b3427f226ef3.d4bfc2ac9215fe99c0f056cac122266e',
    'refresh-token' => '1000.5a19e862771a73f14cfea954401aba91.d24752b0e068ac8a3b6dcacebe4cf5a3',
    'auth-header-generated-at' => 1713339077,
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
      'type' => 'shirt',
      'text' => 'public.shirt',
      'class' => 'Dani\\Tailor\\Garments\\Shirt',
      'sweing-cost' => 14,
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
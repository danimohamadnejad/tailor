<?php return array (
  'zoho' => 
  array (
    'client-id' => '1000.8EZ82UEPTJNSPJRU2MD21ZIQF9202K',
    'client-secret' => '71f7a4e4973d9756e1f737415e393dba790b97a236',
    'access-token' => '1000.5651731e23170b025bd149d122f25fd6.73998998040040c9b02693541e2a6148',
    'refresh-token' => '1000.5a19e862771a73f14cfea954401aba91.d24752b0e068ac8a3b6dcacebe4cf5a3',
    'auth-header-generated-at' => 1713294779,
    'auth-header-generation-interval' => 3600,
  ),
  'routes-prefix' => 'tailor',
  'routes-alias' => 'tailor.',
  'garments' => 
  array (
    'trouser' => 
    array (
      'order-save-request' => 'Dani\\Tailor\\Http\\Requests\\TrouserOrderSaveRequest',
      'type' => 'trouser',
      'text' => 'public.trouser',
      'cost' => 12,
      'class' => 'Dani\\Tailor\\Garments\\Trouser',
    ),
  ),
  'fabrics' => 
  array (
    'cotton' => 
    array (
      'text' => 'public.cotton',
      'type' => 'cotton',
      'class' => 'Dani\\Tailor\\Fabrics\\Cotton',
      'yard-cost' => 2.8,
    ),
    'leather' => 
    array (
      'text' => 'public.leather',
      'type' => 'leather',
      'class' => 'Dani\\Tailor\\Fabrics\\Leather',
      'yard-cost' => 3.2,
    ),
  ),
);
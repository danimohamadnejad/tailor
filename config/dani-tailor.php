<?php return array (
  'zoho' => 
  array (
    'client-id' => '1000.8EZ82UEPTJNSPJRU2MD21ZIQF9202K',
    'client-secret' => '71f7a4e4973d9756e1f737415e393dba790b97a236',
    'access-token' => '1000.39628dfa10a0186fe49ecd7bd2ee9cb0.1c55e77a9e5681bedc8ea1825adac2d9',
    'refresh-token' => '1000.5a19e862771a73f14cfea954401aba91.d24752b0e068ac8a3b6dcacebe4cf5a3',
    'auth-header-generated-at' => 1713299005,
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
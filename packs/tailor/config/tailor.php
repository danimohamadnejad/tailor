<?php
return [
    'zoho'=>[
      'client-id'=>'1000.BBXXKVH48DV1BJVCLKTHX8CYTCI9NI',
      'client-secret'=>'ba84f5e245f3cce417fa83cbb37c90edad36c2818e'
    ],
    'routes-prefix'=>'tailor',
    'routes-alias'=>'tailor.',
    'garments'=>[
      'trouser'=>['order-save-request'=>\Dani\Tailor\Http\Requests\TrouserOrderSaveRequest::class, 'type'=>'trouser', 'text'=>'public.trouser', 'cost'=>12,
       'class'=>\Dani\Tailor\Garments\Trouser::class],
    ],
    'fabrics'=>[
      'cotton'=>['text'=>'public.cotton', 'type'=>'cotton', 'class'=>\Dani\Tailor\Fabrics\Cotton::class, 'yard-cost'=>2.8],
      'leather'=>['text'=>'public.leather', 'type'=>'leather', 'class'=>\Dani\Tailor\Fabrics\Leather::class, 'yard-cost'=>3.2],
    ],
];
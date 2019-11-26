<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$config = (object) [
    'ui' => 1,
    'wrapper' => ['width' => 30],
];

$banner = new FieldsBuilder('banner', ['label' => 'Banner']);

$banner
    ->addImage('bg',['label' => 'Tło'])
    ->addText('title',['label' => 'Tekst']);

return $banner;
<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$config = (object) [
    'ui' => 1,
    'wrapper' => ['width' => 30],
];

$slider = new FieldsBuilder('slider', ['label' => 'Slider']);

$slider
    ->addRepeater('baner', ['min' => 0, 'layout' => 'block'])
        ->addImage('image', ['label' => 'Tło'])
            ->setInstructions('Wybierz tło slidera');

return $slider;
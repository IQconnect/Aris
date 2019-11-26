<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$config = (object) [
    'ui' => 1,
    'wrapper' => ['width' => 30],
];

$hero = new FieldsBuilder('hero', ['label' => 'hero']);

$hero
    ->addTrueFalse('small', ['label'=>'Małe hero?'])
    ->addImage('image', ['label' => 'Tło'])
    ->AddText('header', ['label' => 'tytuł'])
    ->addText('subheader', ['label' => 'podtytuł']);

return $hero;
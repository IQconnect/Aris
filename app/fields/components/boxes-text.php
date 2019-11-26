<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$config = (object) [
    'ui' => 1,
    'wrapper' => ['width' => 30],
];

$boxesText = new FieldsBuilder('boxes-text', ['label' => 'boxy z tekstem']);

$boxesText
    ->addRepeater('boxes', ['min' => 0, 'layout' => 'block', 'label' => 'Box'])
      ->addText('header', ['label' => 'Tytuł'])
      ->addTextarea('desc', ['rows' => '3', 'label' => 'Opis'])
      ->addPageLink('link', ['type' => 'page_link', ['label' => 'Link']]);

return $boxesText;
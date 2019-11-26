<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$config = (object) [
    'ui' => 1,
    'wrapper' => ['width' => 30],
];

$textImg = new FieldsBuilder('text-img', ['label' => 'Zdjęcie z tekstem']);

$textImg
    ->addFields(get_field_partial('components.title'))
    ->addRadio('pozycja', ['label' => 'Z której strony zdjęcie?',  'wrapper' => ['width' => '20%']])
        ->addChoices('lewo', 'prawo')
    ->addImage('image',['label' => 'Zdjęcie', 'wrapper' => ['width' => '80%']])
    ->addWysiwyg('content', ['label' => 'Treść', 'media_upload' => 0])
    ->addRadio('button', ['title'=>'Pokaż przycisk'])
    ->setInstructions('Pokaż przycisk pod tekstem')
    ->addChoices('nie', 'tak')
    ->addPageLink('link', ['post_type' => 'page'])
        ->conditional('button', '==', 'tak');

return $textImg;
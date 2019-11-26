<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$config = (object) [
    'ui' => 1,
    'wrapper' => ['width' => 30],
];

$title = new FieldsBuilder('title', ['label' => 'Tytuł']);

$title
    ->addRadio('header', ['title'=>'Pokaż tytuł sekcji?', 'label' => 'Tytuł sekcji'])
        ->setInstructions('Pokaż tytuł sekcji.')
        ->addChoices('nie', 'tak')

    ->addText('title', ['label' => 'Tytuł'])
        ->setInstructions('Wprowadź tytuł')
        ->conditional('header', '==', 'tak')

    ->addRadio('subheader', ['title'=>'Pokaż opi sekcji?', 'label' => 'Opis sekcji'])
        ->setInstructions('Pokaż opis sekcji.')
        ->addChoices('nie', 'tak')
        ->conditional('header', '==', 'tak')    

    ->addText('subtitle', ['label' => 'Opis'])
        ->setInstructions('Wprowadź opis')
        ->conditional('subheader', '==', 'tak');

return $title;
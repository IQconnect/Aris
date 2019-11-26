<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$config = (object) [
    'ui' => 1,
    'wrapper' => ['width' => 30],
];

$headerSection = new FieldsBuilder('header-section');

$headerSection
    ->addRadio('header', ['title'=>'Pokaż tytuł sekcji?'])
        ->setInstructions('Pokaż nagłówek sekcji.')
        ->addChoices('nie', 'tak')

    ->addText('title', ['label' => 'Tytuł'])
        ->conditional('header', '==', 'tak')
    ->addTextarea('subtitle', ['rows' => 4, 'label' => 'Opis'])
        ->conditional('header', '==', 'tak');

return $headerSection;
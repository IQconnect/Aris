<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$config = (object) [
  'ui' => 1,
  'wrapper' => ['width' => 30],
];

$atractions = new FieldsBuilder('atractions', ['label' => 'Atrakcje']);

$atractions
  ->addFields(get_field_partial('components.title'))
  ->addRelationship('atractions', ['label'=>'Atrakcje', 'post_type'=>'atrakcje']);

return $atractions;

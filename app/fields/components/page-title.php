<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$config = (object) [
    'ui' => 1,
    'wrapper' => ['width' => 30],
];

$pageTitle = new FieldsBuilder('page-title', ['label' => 'Nagłówek']);

return $pageTitle;
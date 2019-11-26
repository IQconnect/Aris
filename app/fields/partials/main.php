<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$main = new FieldsBuilder('main');

$main
    ->addTab('main', ['label'=>'Ustawienia stopki','placement' => 'left'])
        ->addTrueFalse('show_map', ['label'=>'Wyświetl mape w stopce', 'default_value' => 0]);

return $main;
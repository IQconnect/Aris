<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$order = new FieldsBuilder('order');

$order
    ->setLocation('post_type', '==', 'shop_order');

$order
    ->addDatePicker('from')
    ->addDatePicker('to')
    ->addText('text');
    
return $order;

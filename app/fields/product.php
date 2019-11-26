<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$post = new FieldsBuilder('product');

$post
    ->setLocation('post_type', '==', 'product');

$post
    ->addTextarea('orders');

return $post;

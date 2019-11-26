<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$post = new FieldsBuilder('post');

$post
    ->setLocation('post_type', '==', 'atrakcje');

$post
    ->addTab('PageHeader', ['label'=>'Nagłówek', 'placement' => 'left'])
        ->addGroup('hero')
            ->addTrueFalse('small', ['label' => 'Małe hero?'])
            ->addText('header', ['label' => 'tytuł'])
            ->addText('subheader', ['label' => 'podtytuł'])
            ->addImage('image', ['label' => 'Tło'])
        ->endGroup()
    ->addTab('Galeria',['placement' => 'left'])
        ->addGallery('gallery', ['label' => 'Galeria']);

return $post;

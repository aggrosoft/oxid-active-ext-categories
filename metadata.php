<?php

$sMetadataVersion = '2.0';

$aModule = array(
    'id'           => 'agactiveextcategories',
    'title'        => 'Aggrosoft Active External Categories',
    'description'  => 'Will activate categories having a matching external link for internal routes',
    'thumbnail'    => '',
    'version'      => '1.0.2',
    'author'       => 'Aggrosoft GmbH',
    'extend'      => array(
        \OxidEsales\Eshop\Application\Component\CategoriesComponent::class => Aggrosoft\ActiveExternalCategories\Application\Component\CategoriesComponent::class
    )
);

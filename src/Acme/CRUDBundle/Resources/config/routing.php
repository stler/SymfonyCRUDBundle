<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('acme_crud_homepage', new Route('/create', array(
    '_controller' => 'AcmeCRUDBundle:Default:create',
)));

$collection->add('acme_crud_homepage', new Route('/delete/{id}', array(
    '_controller' => 'AcmeCRUDBundle:Default:delete',
)));

$collection->add('acme_crud_homepage', new Route('/update/{id}/{name}', array(
    '_controller' => 'AcmeCRUDBundle:Default:update',
)));

$collection->add('acme_crud_homepage', new Route('/get/{id}', array(
    '_controller' => 'AcmeCRUDBundle:Default:get',
)));
return $collection;

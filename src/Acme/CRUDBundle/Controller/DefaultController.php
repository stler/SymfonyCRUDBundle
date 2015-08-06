<?php

namespace Acme\CRUDBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\CRUDBundle\Form\Type\ProductType;
use Acme\CRUDBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function createAction()
    {
        $product = new Product();
        $product->setName('Tiny');
        $product->setDescription('Nice toy');
        $product->setPrice('30');

        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($product);
        $em->flush();


        return new Response('Created product id '.$product->getId());

    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $product = $em->getRepository('AcmeCRUDBundle:Product')->find($id);
        $em->remove($product);
        $em->flush();
    }

    public function updateAction($id,$name)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $product = $em->getRepository('AcmeCRUDBundle:Product')->find($id);

        if (!$product) {
            throw $this->createNotFoundException('No product found for id '.$id);
        }

        $product->setName($name);
        $em->flush();

        return new Response('I change product id='. $id);
    }

    public function  getAction($id)
    {
        $product = $this->getDoctrine()
            ->getRepository('AcmeCRUDBundle:Product')
            ->find($id);
        if(!$product){
            throw $this->createNotFoundException('No product found for id '.$id);
        }
        return new Response('I find product id='. $id);
    }

}

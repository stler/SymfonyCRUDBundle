<?php

namespace Acme\CRUDBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;;
use Symfony\Component\Validator\Constraints\Collection;
class ProductType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name', 'text')
            ->add('price','text')
            ->add('description', 'text')
            ->add('save','submit');

    }

    public function getName() {
        return "product";
    }

    public function getDefaultOptions(array $options)
    {
        $collectionConstraint = new Collection(array(
            'name' => new NotBlank(),
            'price' => new NotBlank(),
            'description' => new NotBlank()
        ));

        $options['validation_constraint'] = $collectionConstraint;

        return array(
            'data_class' => 'Acme\CRUDBundle\Entity\Product',
        );
    }
}
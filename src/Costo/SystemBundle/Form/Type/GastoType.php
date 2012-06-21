<?php

namespace Costo\SystemBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class GastoType extends AbstractType {

    public function buildForm(FormBuilder $builder, array $options) {

        $builder->add('nombre_gasto');
        $builder->add('costo_gasto');
        $builder->add('fecha_emision_gasto');
        $builder->add('fecha_pago_gasto');
        
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Costo\SystemBundle\Model\Gasto',
        );
    }

    public function getName() {
        return 'costo_systembundle_gastotype';
    }

}

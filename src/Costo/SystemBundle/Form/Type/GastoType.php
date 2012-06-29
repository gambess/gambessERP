<?php

namespace Costo\SystemBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Costo\SystemBundle\Model\CuentaQuery;

class GastoType extends AbstractType {

    public function buildForm(FormBuilder $builder, array $options) {

        $builder->add('cuenta', 'model',
                array(
                    'label'    => 'Cuenta',
                    'class'    => 'Costo\SystemBundle\Model\Cuenta',
                    'property' => 'NombreCuenta',
        ));
        $builder->add('nombre_gasto', 'text', array('label'  => 'Gasto',));
        $builder->add('costo_gasto', 'number', array('label'  => 'Costo',));
        $builder->add('fecha_emision_gasto', 'datetime', array('label'  => 'F. Emisión','widget' => 'single_text'));
        $builder->add('fecha_pago_gasto', 'datetime', array('label'  => 'F. Pago','widget' => 'single_text'));
   
        
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

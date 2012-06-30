<?php

namespace Costo\SystemBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class VentaType extends AbstractType {

    public function buildForm(FormBuilder $builder, array $options) {
        $builder
                ->add('fecha_venta', 'date', array('label' => 'Fecha Venta', 'widget' => 'single_text'))
                ->add('tipo_venta', 'choice', array(
                    'label' => 'Tipo',
                    'choices' => array(
                        'FORMAL' => 'Formal', 'INFORMAL' => 'Informal'),
                    'required' => true)
                )
                ->add('total_venta', 'number', array('label' => 'Total Venta'))
                ->add('total_venta_formal', 'number', array('label' => 'V. Formal'))
                ->add('total_venta_informal', 'number', array('label' => 'V. Informal'))
                ->add('total_iva_venta', 'number', array('label' => 'I.V.A'))
                ->add('detalle_venta', 'textarea', array('label' => 'Detalle'))
        ;
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Costo\SystemBundle\Model\Venta',
        );
    }

    public function getName() {
        return 'venta';
    }

}

<?php

namespace Costo\SystemBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class VentaType extends AbstractType {

    public function buildForm(FormBuilder $builder, array $options) {
        $builder
                ->add('fecha', 'date', array(
                    'label' => 'Fecha Venta',
                    'widget' => 'single_text',
                    'input' => 'datetime',
                    'format' => 'dd/MM/yyyy'
                        )
                    )
                ->add('detalleVentas', 'collection', array(
                    'type'          => new \Costo\SystemBundle\Form\Type\DetalleVentaType(),
                    'allow_add'     => true,
                    'allow_delete'  => true,
                    'by_reference'  => false
                     )
                        )
                ->add('total_neto_documentada', 'money', array(
                    'label' => 'Documentado',
                    'currency' => 'CLP',
                    'precision' => 0,
//                    'grouping' => true
                        )
                )
                ->add('total_iva_documentada', 'money', array(
                    'label' => 'Documentado',
                    'currency' => 'CLP',
                    'precision' => 0,
//                    'grouping' => true
                        )
                )
                ->add('total_documentada', 'money', array(
                    'label' => 'Documentado',
                    'currency' => 'CLP',
                    'precision' => 0,
//                    'grouping' => true
                        )
                )
                ->add('total_neto_no_documentada', 'money', array(
                    'label' => 'No Documentado',
                    'currency' => 'CLP',
                    'precision' => 0,
//                    'grouping' => true
                        )
                )
                ->add('total_iva_no_documentada', 'money', array(
                    'label' => 'No Documentado',
                    'currency' => 'CLP',
                    'precision' => 0,
//                    'grouping' => true
                        )
                )
                ->add('total_no_documentada', 'money', array(
                    'label' => 'No Documentado',
                    'currency' => 'CLP',
                    'precision' => 0,
//                    'grouping' => true
                        )
                )
                ->add('total_neto', 'money', array(
                    'label' => 'I.V.A.',
                    'currency' => 'CLP',
                    'precision' => 0,
//                    'grouping' => true
                        )
                )
                ->add('total_iva', 'money', array(
                    'label' => 'I.V.A.',
                    'currency' => 'CLP',
                    'precision' => 0,
//                    'grouping' => true
                        )
                )
                ->add('total', 'money', array(
                    'label' => 'Total',
                    'currency' => 'CLP',
                    'precision' => 0,
//                    'grouping' => true
                        )
                )
                ->add('total_neto_real', 'money', array(
                    'label' => 'I.V.A.',
                    'currency' => 'CLP',
                    'precision' => 0,
//                    'grouping' => true
                        )
                )
                ->add('total_iva_real', 'money', array(
                    'label' => 'I.V.A.',
                    'currency' => 'CLP',
                    'precision' => 0,
//                    'grouping' => true
                        )
                )
                ->add('total_real', 'money', array(
                    'label' => 'Total',
                    'currency' => 'CLP',
                    'precision' => 0,
//                    'grouping' => true
                        )
                )
                ->add('descripcion', 'textarea', array(
                    'label' => 'Detalles',
                    'required' => false,
                        )
                    )
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

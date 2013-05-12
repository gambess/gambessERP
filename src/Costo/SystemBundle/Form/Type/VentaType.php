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
                ->add('total_neto_documentada', 'hidden') 
//                        array(
//                    'label' => 'Documentado',
//                    'currency' => 'CLP',
//                    'precision' => 0,
//                    'grouping' => true
//                        )
                ->add('total_iva_documentada', 'hidden')
//                        array(
//                    'label' => 'Documentado',
//                    'currency' => 'CLP',
//                    'precision' => 0,
//                    'grouping' => true
//                        )
//                )
                ->add('total_documentada', 'hidden') 
//                        array(
//                    'label' => 'Documentado',
//                    'currency' => 'CLP',
//                    'precision' => 0,
//                    'grouping' => true
//                        )
//                )
                ->add('total_neto_no_documentada', 'hidden') 
//                        array(
//                    'label' => 'No Documentado',
//                    'currency' => 'CLP',
//                    'precision' => 0,
//                    'grouping' => true
//                        )
//                )
                ->add('total_iva_no_documentada', 'hidden') 
//                        array(
//                    'label' => 'No Documentado',
//                    'currency' => 'CLP',
//                    'precision' => 0,
//                    'grouping' => true
//                        )
//                )
                ->add('total_no_documentada', 'hidden') 
//                        array(
//                    'label' => 'No Documentado',
//                    'currency' => 'CLP',
//                    'precision' => 0,
//                    'grouping' => true
//                        )
//                )
                ->add('total_neto', 'hidden')
//                        array(
//                    'label' => 'I.V.A.',
//                    'currency' => 'CLP',
//                    'precision' => 0,
//                    'grouping' => true
//                        )
//                )
                ->add('total_iva', 'hidden')
//                        array(
//                    'label' => 'I.V.A.',
//                    'currency' => 'CLP',
//                    'precision' => 0,
//                    'grouping' => true
//                        )
//                )
                ->add('total', 'hidden') 
//                        array(
//                    'label' => 'Total',
//                    'currency' => 'CLP',
//                    'precision' => 0,
//                    'grouping' => true
//                        )
//                )
                ->add('total_neto_real', 'hidden') 
//                        array(
//                    'label' => 'I.V.A.',
//                    'currency' => 'CLP',
//                    'precision' => 0,
//                    'grouping' => true
//                        )
//                )
                ->add('total_iva_real', 'hidden')
//                        array(
//                    'label' => 'I.V.A.',
//                    'currency' => 'CLP',
//                    'precision' => 0,
//                    'grouping' => true
//                        )
//                )
                ->add('total_real', 'hidden') 
//                        array(
//                    'label' => 'Total',
//                    'currency' => 'CLP',
//                    'precision' => 0,
//                    'grouping' => true
//                        )
//                )
                ->add('descripcion', 'textarea', array(
                    'label' => 'Detalles',
                    'required' => false,
                    'attr' => array('class' => 'editor'),
                        )
                    )
                ->add('id','hidden')
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

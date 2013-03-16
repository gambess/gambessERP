<?php

namespace Costo\SystemBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Costo\SystemBundle\Model\VentaFormaQuery;
use Costo\SystemBundle\Model\LugarVentaQuery;
use Costo\SystemBundle\Model\FormaPagoQuery;

class DetalleVentaType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('ventaForma', 'model',
                array(
                    'label' => 'Forma de Venta',
                    'class' => 'Costo\SystemBundle\Model\VentaForma',
                    'property' => 'NombreVentaForma',
            )
                    )
            ->add('lugarVenta', 'model',
                array(
                    'label' => 'Lugar de Venta',
                    'class' => 'Costo\SystemBundle\Model\LugarVenta',
                    'property' => 'NombreLugarVenta',
            )
                    )
            ->add('formaPago', 'model',
                array(
                    'label' => 'Forma de Pago',
                    'class' => 'Costo\SystemBundle\Model\FormaPago',
                    'property' => 'NombreFormaPago',
            )
                    )
            ->add('fecha_venta', 'date', array(
                    'label' => 'Fecha Venta',
                    'widget' => 'single_text',
                    'input' => 'datetime',
                    'format' => 'dd/MM/yyyy'
                        )
                )
            ->add('total_venta', 'hidden' 
//                    'money', array(
//                    'label' => 'Neto',
//                    'currency' => 'CLP',
//                    'precision' => 0,
////                    'grouping' => true
//                        )
                    )
            ->add('total_iva_venta','hidden'
//                    'money', array(
//                    'label' => 'I.V.A',
//                    'currency' => 'CLP',
//                    'precision' => 0,
////                    'grouping' => true
//                        )
                    )
            ->add('total_neto_venta', 'money', array(
                    'label' => 'Total',
                    'currency' => 'CLP',
                    'precision' => 0,
//                    'grouping' => true
                        )
                )
            ->add('descripcion_venta', 'textarea', array(
                'label' => 'Detalle'
                    )
                )
        ;
    }

//    public function getName()
//    {
//        return 'testing_milibundle_detalleventatype';
//    }

//    public function buildForm(FormBuilder $builder, array $options) {
//        $builder
//
//
//                ->add('formal_total_venta', 'money', array(
//                    'label' => 'V. Formal',
//                    'currency' => 'CLP',
//                    'precision' => 0,
////                    'grouping' => true
//                        )
//                )
//                ->add('informal_total_venta'
//                )
//                ->add('total_iva_venta_formal'
//                )
//                ->add('detalle_venta', 'textarea', array('label' => 'Detalle'))
//        ;
//    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Costo\SystemBundle\Model\DetalleVenta',
        );
    }

    public function getName() {
        return 'detalleventa';
    }
}

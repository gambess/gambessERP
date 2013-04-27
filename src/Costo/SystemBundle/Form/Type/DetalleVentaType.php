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
                    'empty_value' => 'Forma de Venta...',
                    'class' => 'Costo\SystemBundle\Model\VentaForma',
                    'property' => 'NombreVentaForma',
                    'query' => VentaFormaQuery::create()
                ->orderByIdTipoVentaForma('ASC')
                ->orderByNombreVentaForma('ASC')
                ,
            )
                    )
            ->add('lugarVenta', 'model',
                array(
                    'label' => 'Lugar de Venta',
                    'empty_value' => 'Lugar de Venta...',
                    'class' => 'Costo\SystemBundle\Model\LugarVenta',
                    'property' => 'NombreLugarVenta',
            )
                    )
            ->add('formaPago', 'model',
                array(
                    'label' => 'Forma de Pago',
                    'empty_value' => 'Forma de Pago...',
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
            ->add('total_venta', 'money', array(
                    'label' => 'Total',
                    'currency' => 'CLP',
                    'precision' => 0,
//                    'grouping' => true
                        )
                )
            ->add('total_neto_venta', 'hidden' 
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
            ->add('descripcion_venta', 'textarea', array(
                'label' => 'Detalle',
                'required' => false,
                'attr' => array('class' => 'editor'),
                    )
                )
            ->add('id_detalle','hidden')
        ;
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Costo\SystemBundle\Model\DetalleVenta',
        );
    }

    public function getName() {
        return 'detalleventa';
    }
}
/**
* ModelType class.
*
* @author William Durand <william.durand1@gmail.com>
* @author Toni Uebernickel <tuebernickel@gmail.com>
*
* Example using the preferred_choices option.
*
* <code>
* public function buildForm(FormBuilderInterface $builder, array $options)
* {
* $builder
* ->add('product', 'model', array(
*   'class' => 'Model\Product',
*   'query' => ProductQuery::create()
*       ->filterIsActive(true)
*       ->useI18nQuery($options['locale'])
*           ->orderByName()
*       ->endUse()
*   ,
*   'preferred_choices' => ProductQuery::create()
*       ->filterByIsTopProduct(true)
*   ,
* ))
* ;
* }
* </code>
*/
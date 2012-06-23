<?php

namespace Costo\SystemBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class VentaType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('fk_venta')
            ->add('fecha_venta')
            ->add('tipo_venta')
            ->add('total_venta')
            ->add('total_venta_formal')
            ->add('total_venta_informal')
            ->add('total_iva_venta')
            ->add('detalle_venta')
        ;
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Costo\SystemBundle\Model\Venta',
        );
    }

    public function getName()
    {
        return 'costo_systembundle_ventatype';
    }
}

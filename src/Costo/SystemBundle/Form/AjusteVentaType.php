<?php

namespace Costo\SystemBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class AjusteVentaType extends AbstractType
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
            ->add('total_iva_venta_formal')
            ->add('detalle_venta')
        ;
    }

    public function getName()
    {
        return 'costo_systembundle_ajusteventatype';
    }
}

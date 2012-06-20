<?php

namespace Costo\SystemBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CuentaType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('nombreCuenta');
        $builder->add('ValorCuenta');
        $builder->add('TipoCuenta');
    }
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Costo\SystemBundle\Model\Cuenta',
        );
    }
    public function getName()
    {
        return 'cuenta';
    }
}

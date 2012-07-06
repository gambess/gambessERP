<?php

namespace Costo\SystemBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Costo\SystemBundle\Model\Venta;
use Costo\SystemBundle\Model\VentaQuery;
use Costo\SystemBundle\Model\Gasto;
use Costo\SystemBundle\Model\GastoQuery;

/**
 * @author Raziel Valle <razielvalle@gambess.com>
 * Controlador de HomePage, Metods CRUD+
 * Este controlador controla las acciones request de la pagina web
 */
class InformeController extends Controller {

    /**
     * Lanza la pagina de inicio
     * No necesita parametros
     * @method GET route: "/" name="_homepage"
     * @return Response view
     */
    public function indexAction() {

//        if ($form->isValid()) {
//            return $this->redirect($this->generateUrl('_report', array('date_max' => 'NOw', 'date_min'=> 'NOW')));
//        }
        $form = $this->createFormBuilder(null, array())
                        ->add('min_date', 'date', array(
                            'input' => 'string',
                            'widget' => 'single_text',
                            'format' => 'dd/MM/yyyy',
                        ))
                        ->add('max_date', 'date', array(
                            'input' => 'string',
                            'widget' => 'single_text',
                            'format' => 'dd/MM/yyyy',
                                )
                        )
                        ->getForm()
        ;
        return $this->render('CostoSystemBundle:Informe:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function reportAction() {

        $dates = array();
        $request = $this->getRequest();

        if ('POST' === $request->getMethod()) {
            $dates = $request->request->get('form');

            $form = $this->createFormBuilder(null, array())
                            ->add('min_date', 'date', array(
                                'input' => 'string',
                                'widget' => 'single_text',
                                'format' => 'dd/MM/yyyy',
                            ))
                            ->add('max_date', 'date', array(
                                'input' => 'string',
                                'widget' => 'single_text',
                                'format' => 'dd/MM/yyyy',
                                    )
                            )
                            ->getForm()
            ;
            $form->bindRequest($request);

            $timeline = $this->proccessDates($dates);
            $totalventa = 0;
            $ventayear = 0;
            $totalgasto = 0;
            $gastoyear = 0;
            if ($timeline['max'] >= $timeline['min']) {
                $ventas = VentaQuery::create()->filterByTipoVenta('FORMAL')->filterByFechaVenta($timeline)->find();
                $tventas = VentaQuery::create('v')
                                ->select(array('v.FormalTotalVenta'))
                                ->filterByTipoVenta('FORMAL')
                           ->find();
                foreach ($tventas->getIterator() as $tv)
                        $ventayear += $tv;

                $gastos = GastoQuery::create()
                            ->useCuentaQuery('cuenta')
                                ->filterByTipoCuenta('FORMAL')
                            ->endUse()
                        ->filterByFechaPagoGasto($timeline)->find();
                $tgastos = GastoQuery::create('g')
                            ->useCuentaQuery('c')
                                ->filterByTipoCuenta('FORMAL')
                            ->endUse()
                            ->select(array('g.CostoGasto'))
                        ->find();
                foreach ($tgastos->getIterator() as $tg)
                        $gastoyear += $tg;
                foreach ($ventas->getIterator() as $v)
                        $totalventa += $v->getFormalTotalVenta();
                $ivaVenta = $totalventa * 0.19;
                foreach ($gastos->getIterator() as $g)
                        $totalgasto += $g->getCostoGasto();
                $ivaGasto = $totalgasto * 0.19;

            }
            return $this->render("CostoSystemBundle:Informe:report.html.twig", array(
                'form' => $form->createView(),
                'dates' => $timeline ,
                'gastos' => $gastos,
                'ventas' => $ventas,
                'totalgasto' => $totalgasto,
                'totalventa' => $totalventa,
                'gastoyear' => $gastoyear,
                'ivagasto' => $ivaGasto,
                'ventayear' => $ventayear,
                'ivaventa' => $ivaVenta
            ));
        }
    }

    private function proccessDates($dates) {
        $timelines = array();
        $timelines['min']= \DateTime::createFromFormat('d/m/Y', $dates['min_date']);
        $timelines['max']= \DateTime::createFromFormat('d/m/Y', $dates['max_date']);
        return $timelines;
    }

}
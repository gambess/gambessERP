<?php

namespace Costo\SystemBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
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
        $form = $this->generateForm();
        return $this->render('CostoSystemBundle:Informe:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * Generador de Informes
     * @param string $format
     * @return mixed
     */
    public function reportAction() {

        $dates = array();
        $request = $this->getRequest();

            if ('POST' === $request->getMethod()) {

            // Se recuperan las fechas
            $dates = $request->request->get('form');
            
            //Se convierten las fechas en Objetos DateTime y se almacenan en un arreglo con los indices mix y max
            $timeline = $this->proccessDates($dates);
            //variables a definir para el cuadro informativo de ingresos totales
            $gyformal = 0; $gyinformal = 0; $vyformal = 0; $vyinformal = 0; $giva = 0; $viva = 0;
            //variables a definir para el cuadro informativo de ingresos de las fechas seleccionadas
            $gmformal = 0; $gminformal = 0; $vmformal = 0; $vminformal = 0; $gmiva = 0; $vmiva = 0;
            //Arrays necesarios
            $gasto = array(); $gastos = array();
            // Solo se hacen los calculos si:
            // la fecha del textBox de la derecha es mayor que el de la izquierda
            if ($timeline['max'] >= $timeline['min']) {
                //Ventas Totales del Formales, Informales e IVAS Año
                $tventas = $this->getAllVentas();
                //acumulador ventas totales
                foreach ($tventas->getIterator() as $tv) {
                    $vyformal += $tv['v.FormalTotalVenta']; $vyinformal += $tv['v.InformalTotalVenta']; $viva += $tv['v.TotalIvaVentaFormal'];
                }
                // Calculos por fechas
                // VENTAS en rango de fechas
                $ventas = $this->getVentasByDate($timeline);
                //acumulador Ventas
                foreach ($ventas->getIterator() as $v) {
                    $vmformal += $v->getFormalTotalVenta(); $vminformal += $v->getInformalTotalVenta(); $vmiva += $v->getTotalIvaVentaFormal();
                }
                //GASTOS formales en rango de fechas
                $gastosf = $this->getGastosFormalesByDate($timeline);
                //acumulador Gastos
                foreach ($gastosf->getIterator() as $gf) {
                    $gmformal += $gf->getCostoGasto(); $gmiva += ( ($gf->getCostoGasto() / 1.19) * 0.19);
                }
                //GASTOS informales en rango de fechas
                $gastosi = $this->getGastosInformalesByDate($timeline);
                //acumulador Gastos
                foreach ($gastosi->getIterator() as $gi) {
                    $gminformal += $gi->getCostoGasto();
                }
                //crear arreglo gasto y gastos
                $i = 0;
                foreach ($gastosf->getIterator() as $gfr) {
                    $gasto['fechapagogasto'] = $gfr->getFechaPagoGasto();
                    $gasto['costogasto'] = $gfr->getCostoGasto();
                    foreach ($gastosi->getIterator() as $ginf){
                        if($gfr->getFechaPagoGasto() == $ginf->getFechaPagoGasto() ){
                            $gasto['informal'] = $ginf->getCostoGasto();
                        }else
                            $gasto['informal'] = 0;
                    }
                    $gastos[$i] = $gasto;
                    $i++;
                }

                // Calculos Totales
                //GASTOS Totales Formales
                $tfgastos = $this->getAllGastosFormales();
                //acumulador Gastos Formales
                foreach ($tfgastos->getIterator() as $tg) {
                    $gyformal += $tg;
                    $giva += ( ($tg / 1.19) * 0.19);
                }
                //GASTOS Totales Informales
                $tigastos = $this->getAllGastosInformales();
                //acumulador Gastos Informales
                foreach ($tigastos->getIterator() as $tgi)
                    $gyinformal += $tgi;
            }
           $form = $this->generateForm();
            // Se ponen las fechas elejidas en el formulario nuevamente
            $form->bindRequest($request);

                    // Se vuelve a generar el formulario
                    $view = $this->renderView("CostoSystemBundle:Informe:report.html.twig", array(
                            'form' => $form->createView(), 'dates' => $timeline, 'gastos' => $gastos, 'ventas' => $ventas,
                            //primer cuadro
                            //gastos
                            'gyformal' => $gyformal, 'gyinformal' => $gyinformal, 'giva' => $giva,
                            //ventas
                            'vyformal' => $vyformal, 'vyinformal' => $vyinformal, 'viva' => $viva,
                            //segundo cuadro
                            //gastos
                            'gmformal' => $gmformal, 'gminformal' => $gminformal, 'gmiva' => $gmiva,
                            //ventas
                            'vmformal' => $vmformal, 'vminformal' => $vminformal, 'vmiva' => $vmiva
                        ));
                     if('/informe/create' == $request->getPathInfo()){
                            return new Response($view);
                        }
                     if('/informe/report' == $request->getPathInfo()){
                            return new Response($this->get('knp_snappy.pdf')->getOutputFromHtml($view),
                            200,
                            array(
                                'Content-Type'          => 'application/pdf',
                                'Content-Disposition'   => 'attachment; filename="report.pdf"'
                            )
                        );
                     }
                }
    }
    /**
     * Creador del formulario
     * @return Form
     */
    protected function generateForm(){

        return $this->createFormBuilder(null, array())
                        ->add('min_date', 'date', array('label' => 'Desde el día: ','input' => 'string','widget' => 'single_text','format' => 'dd/MM/yyyy'))
                        ->add('max_date', 'date', array('label' => ' Hasta el día: ','input' => 'string','widget' => 'single_text','format' => 'dd/MM/yyyy'))
                    ->getForm()
                ;

    }

        /**
     * Se recuperan los datos de todas las ventas los campos FormalTotalVenta, InformalTotalVenta, TotalIvaVentaFormal
     * return \PropelArrayCollection tventas
     */
    protected function  getAllVentas(){
        
        return VentaQuery::create('v')
                    ->select(array('v.FormalTotalVenta', 'v.InformalTotalVenta', 'v.TotalIvaVentaFormal'))
                ->find();
    }
    /**
     * Se recuperan todos los gastos formales existentes
     * @return \PropelArrayCollection tfgastos
     */
    protected function  getAllGastosFormales(){
        return GastoQuery::create('g')
                            ->useCuentaQuery('c')
                                ->filterByTipoCuenta('FORMAL')
                            ->endUse()
                        ->select(array('g.CostoGasto'))
                    ->find();
    }
    /**
     * Se recuperan todos los gastos informales existentes
     * @return \PropelArrayCollection tigastos
     */
    protected function  getAllGastosInformales(){
        return GastoQuery::create('g')
                                ->useCuentaQuery('c')
                                    ->filterByTipoCuenta('INFORMAL')
                                ->endUse()
                            ->select(array('g.CostoGasto'))
                        ->find();
    }
    /**
     * Se recuperan todas las fechas en el rango de fechas
     * @param array $dates
     * @return \PropelObjectCollection ventas
     */
    protected function  getVentasByDate($dates){
        return VentaQuery::create('v')
                        ->filterByFechaVenta($dates)
                    ->orderByFechaVenta('ASC')
                ->find();
    }
    /**
     * Se recuperan todos los gastos formales por fechas
     * @param array $dates
     * @return \PropelObjectCollection gastosf
     */
     protected function  getGastosFormalesByDate($dates){
        return GastoQuery::create('g')
                                ->useCuentaQuery('c', 'INNER JOIN')
                                    ->filterByTipoCuenta('FORMAL')
                                ->endUse()
                            ->orderByFechaPagoGasto('ASC')
                            ->filterByFechaPagoGasto($dates)
                        ->find();
    }
    /**
     * Se recuperan todos los gastos Informales por fechas
     * @param array $dates
     * @return \PropelObjectCollection gastosi
     */
    protected function  getGastosInformalesByDate($dates){
        return GastoQuery::create('g')
                            ->useCuentaQuery('c', 'INNER JOIN')
                                ->filterByTipoCuenta('INFORMAL')
                            ->endUse()
                        ->filterByFechaPagoGasto($dates)
                        ->orderByFechaPagoGasto('ASC')
                    ->find();
    }
    /**
     * Se genera el array de Objetos PHPDateTime
     * @param array $dates
     * @return array
     */
    private function proccessDates($dates) {
        $timelines = array();
        $timelines['min'] = \DateTime::createFromFormat('d/m/Y', $dates['min_date']);
        $timelines['max'] = \DateTime::createFromFormat('d/m/Y', $dates['max_date']);
        return $timelines;
    }

}
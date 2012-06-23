<?php

namespace Costo\SystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Costo\SystemBundle\Entity\AjusteVenta
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Costo\SystemBundle\Entity\AjusteVentaRepository")
 */
class AjusteVenta
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer $fk_venta
     *
     * @ORM\Column(name="fk_venta", type="integer")
     */
    private $fk_venta;

    /**
     * @var datetime $fecha_venta
     *
     * @ORM\Column(name="fecha_venta", type="datetime")
     */
    private $fecha_venta;

    /**
     * @var string $tipo_venta
     *
     * @ORM\Column(name="tipo_venta", type="string", length=255)
     */
    private $tipo_venta;

    /**
     * @var float $total_venta
     *
     * @ORM\Column(name="total_venta", type="float")
     */
    private $total_venta;

    /**
     * @var float $total_venta_formal
     *
     * @ORM\Column(name="total_venta_formal", type="float")
     */
    private $total_venta_formal;

    /**
     * @var float $total_venta_informal
     *
     * @ORM\Column(name="total_venta_informal", type="float")
     */
    private $total_venta_informal;

    /**
     * @var float $total_iva_venta_formal
     *
     * @ORM\Column(name="total_iva_venta_formal", type="float")
     */
    private $total_iva_venta_formal;

    /**
     * @var text $detalle_venta
     *
     * @ORM\Column(name="detalle_venta", type="text")
     */
    private $detalle_venta;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fk_venta
     *
     * @param integer $fkVenta
     */
    public function setFkVenta($fkVenta)
    {
        $this->fk_venta = $fkVenta;
    }

    /**
     * Get fk_venta
     *
     * @return integer 
     */
    public function getFkVenta()
    {
        return $this->fk_venta;
    }

    /**
     * Set fecha_venta
     *
     * @param datetime $fechaVenta
     */
    public function setFechaVenta($fechaVenta)
    {
        $this->fecha_venta = $fechaVenta;
    }

    /**
     * Get fecha_venta
     *
     * @return datetime 
     */
    public function getFechaVenta()
    {
        return $this->fecha_venta;
    }

    /**
     * Set tipo_venta
     *
     * @param string $tipoVenta
     */
    public function setTipoVenta($tipoVenta)
    {
        $this->tipo_venta = $tipoVenta;
    }

    /**
     * Get tipo_venta
     *
     * @return string 
     */
    public function getTipoVenta()
    {
        return $this->tipo_venta;
    }

    /**
     * Set total_venta
     *
     * @param float $totalVenta
     */
    public function setTotalVenta($totalVenta)
    {
        $this->total_venta = $totalVenta;
    }

    /**
     * Get total_venta
     *
     * @return float 
     */
    public function getTotalVenta()
    {
        return $this->total_venta;
    }

    /**
     * Set total_venta_formal
     *
     * @param float $totalVentaFormal
     */
    public function setTotalVentaFormal($totalVentaFormal)
    {
        $this->total_venta_formal = $totalVentaFormal;
    }

    /**
     * Get total_venta_formal
     *
     * @return float 
     */
    public function getTotalVentaFormal()
    {
        return $this->total_venta_formal;
    }

    /**
     * Set total_venta_informal
     *
     * @param float $totalVentaInformal
     */
    public function setTotalVentaInformal($totalVentaInformal)
    {
        $this->total_venta_informal = $totalVentaInformal;
    }

    /**
     * Get total_venta_informal
     *
     * @return float 
     */
    public function getTotalVentaInformal()
    {
        return $this->total_venta_informal;
    }

    /**
     * Set total_iva_venta_formal
     *
     * @param float $totalIvaVentaFormal
     */
    public function setTotalIvaVentaFormal($totalIvaVentaFormal)
    {
        $this->total_iva_venta_formal = $totalIvaVentaFormal;
    }

    /**
     * Get total_iva_venta_formal
     *
     * @return float 
     */
    public function getTotalIvaVentaFormal()
    {
        return $this->total_iva_venta_formal;
    }

    /**
     * Set detalle_venta
     *
     * @param text $detalleVenta
     */
    public function setDetalleVenta($detalleVenta)
    {
        $this->detalle_venta = $detalleVenta;
    }

    /**
     * Get detalle_venta
     *
     * @return text 
     */
    public function getDetalleVenta()
    {
        return $this->detalle_venta;
    }
}
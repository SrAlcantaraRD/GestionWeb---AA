<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Shipment
 *
 * @ORM\Table(name="shipment", indexes={@ORM\Index(name="fk_shipment_service1_idx", columns={"id_service"}), @ORM\Index(name="fk_shipment_transport_agency1_idx", columns={"id_transport_agency"}), @ORM\Index(name="fk_shipment_employee1_idx", columns={"id_employee"})})
 * @ORM\Entity
 */
class Shipment
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="picker", type="string", length=45, nullable=true)
     */
    private $picker;

    /**
     * @var string|null
     *
     * @ORM\Column(name="expedition", type="string", length=45, nullable=true)
     */
    private $expedition;

    /**
     * @var \Employee
     *
     * @ORM\ManyToOne(targetEntity="Employee")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_employee", referencedColumnName="id")
     * })
     */
    private $idEmployee;

    /**
     * @var \Service
     *
     * @ORM\ManyToOne(targetEntity="Service")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_service", referencedColumnName="id")
     * })
     */
    private $idService;

    /**
     * @var \TransportAgency
     *
     * @ORM\ManyToOne(targetEntity="TransportAgency")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_transport_agency", referencedColumnName="id")
     * })
     */
    private $idTransportAgency;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPicker(): ?string
    {
        return $this->picker;
    }

    public function setPicker(?string $picker): self
    {
        $this->picker = $picker;

        return $this;
    }

    public function getExpedition(): ?string
    {
        return $this->expedition;
    }

    public function setExpedition(?string $expedition): self
    {
        $this->expedition = $expedition;

        return $this;
    }

    public function getIdEmployee(): ?Employee
    {
        return $this->idEmployee;
    }

    public function setIdEmployee(?Employee $idEmployee): self
    {
        $this->idEmployee = $idEmployee;

        return $this;
    }

    public function getIdService(): ?Service
    {
        return $this->idService;
    }

    public function setIdService(?Service $idService): self
    {
        $this->idService = $idService;

        return $this;
    }

    public function getIdTransportAgency(): ?TransportAgency
    {
        return $this->idTransportAgency;
    }

    public function setIdTransportAgency(?TransportAgency $idTransportAgency): self
    {
        $this->idTransportAgency = $idTransportAgency;

        return $this;
    }


}

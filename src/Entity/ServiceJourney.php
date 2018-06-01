<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ServiceJourney
 *
 * @ORM\Table(name="service_journey", indexes={@ORM\Index(name="fk_service_journey_service_state1_idx", columns={"id_service_state"}), @ORM\Index(name="fk_service_journey_shipement_type1_idx", columns={"id_shipement_type"}), @ORM\Index(name="fk_service_journey_shipment1_idx", columns={"id_shipment"})})
 * @ORM\Entity
 */
class ServiceJourney
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
     * @ORM\Column(name="description", type="string", length=45, nullable=true)
     */
    private $description;

    /**
     * @var \ServiceState
     *
     * @ORM\ManyToOne(targetEntity="ServiceState")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_service_state", referencedColumnName="id")
     * })
     */
    private $idServiceState;

    /**
     * @var \ShipementType
     *
     * @ORM\ManyToOne(targetEntity="ShipementType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_shipement_type", referencedColumnName="id")
     * })
     */
    private $idShipementType;

    /**
     * @var \Shipment
     *
     * @ORM\ManyToOne(targetEntity="Shipment")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_shipment", referencedColumnName="id")
     * })
     */
    private $idShipment;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIdServiceState(): ?ServiceState
    {
        return $this->idServiceState;
    }

    public function setIdServiceState(?ServiceState $idServiceState): self
    {
        $this->idServiceState = $idServiceState;

        return $this;
    }

    public function getIdShipementType(): ?ShipementType
    {
        return $this->idShipementType;
    }

    public function setIdShipementType(?ShipementType $idShipementType): self
    {
        $this->idShipementType = $idShipementType;

        return $this;
    }

    public function getIdShipment(): ?Shipment
    {
        return $this->idShipment;
    }

    public function setIdShipment(?Shipment $idShipment): self
    {
        $this->idShipment = $idShipment;

        return $this;
    }


}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Service
 *
 * @ORM\Table(name="service", indexes={@ORM\Index(name="fk_service_invoice_order1_idx", columns={"id_invoice_order"})})
 * @ORM\Entity
 */
class Service
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
     * @var float|null
     *
     * @ORM\Column(name="amount", type="float", precision=10, scale=0, nullable=true)
     */
    private $amount;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="charged", type="boolean", nullable=true)
     */
    private $charged = '0';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_charged", type="date", nullable=true)
     */
    private $dateCharged;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_closed", type="date", nullable=true)
     */
    private $dateClosed;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=45, nullable=true)
     */
    private $description;

    /**
     * @var \InvoiceOrder
     *
     * @ORM\ManyToOne(targetEntity="InvoiceOrder")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_invoice_order", referencedColumnName="id")
     * })
     */
    private $idInvoiceOrder;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(?float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getCharged(): ?bool
    {
        return $this->charged;
    }

    public function setCharged(?bool $charged): self
    {
        $this->charged = $charged;

        return $this;
    }

    public function getDateCharged(): ?\DateTimeInterface
    {
        return $this->dateCharged;
    }

    public function setDateCharged(?\DateTimeInterface $dateCharged): self
    {
        $this->dateCharged = $dateCharged;

        return $this;
    }

    public function getDateClosed(): ?\DateTimeInterface
    {
        return $this->dateClosed;
    }

    public function setDateClosed(?\DateTimeInterface $dateClosed): self
    {
        $this->dateClosed = $dateClosed;

        return $this;
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

    public function getIdInvoiceOrder(): ?InvoiceOrder
    {
        return $this->idInvoiceOrder;
    }

    public function setIdInvoiceOrder(?InvoiceOrder $idInvoiceOrder): self
    {
        $this->idInvoiceOrder = $idInvoiceOrder;

        return $this;
    }


}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InvoiceOrder
 *
 * @ORM\Table(name="invoice_order", indexes={@ORM\Index(name="fk_service_store_client1_idx", columns={"id_store_client"})})
 * @ORM\Entity
 */
class InvoiceOrder
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
     * @ORM\Column(name="invoice_code", type="string", length=45, nullable=true)
     */
    private $invoiceCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="string", length=255, nullable=true)
     */
    private $descripcion;

    /**
     * @var \StoreClient
     *
     * @ORM\ManyToOne(targetEntity="StoreClient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_store_client", referencedColumnName="id")
     * })
     */
    private $idStoreClient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInvoiceCode(): ?string
    {
        return $this->invoiceCode;
    }

    public function setInvoiceCode(?string $invoiceCode): self
    {
        $this->invoiceCode = $invoiceCode;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getIdStoreClient(): ?StoreClient
    {
        return $this->idStoreClient;
    }

    public function setIdStoreClient(?StoreClient $idStoreClient): self
    {
        $this->idStoreClient = $idStoreClient;

        return $this;
    }


}

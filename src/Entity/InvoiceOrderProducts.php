<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InvoiceOrderProducts
 *
 * @ORM\Table(name="invoice_order_products", indexes={@ORM\Index(name="fk_order_products_order_idx", columns={"id_order"})})
 * @ORM\Entity(repositoryClass="App\Repository\InvoiceOrderProductsRepository")
 */
class InvoiceOrderProducts
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var \InvoiceOrder
     *
     * @ORM\ManyToOne(targetEntity="InvoiceOrder")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_order", referencedColumnName="id")
     * })
     */
    private $idOrder;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIdOrder(): ?InvoiceOrder
    {
        return $this->idOrder;
    }

    public function setIdOrder(?InvoiceOrder $idOrder): self
    {
        $this->idOrder = $idOrder;

        return $this;
    }


}

<?php 

final class Basket
{
	private $shelf;
	private $products;
	private $finalPrice	= 0.0;
	private $productsPrice = 0.0;
	private $discountPrice = 0.0;
	private $VAT = 0.2;
	private $deliveryCostUnder = 2.0;
	private $deliveryCostOver = 3.0;
	private $deliveryCostIncesion = 10;


	public function __construct(Shelf $shelf)
	{
		$this->shelf = $shelf;
	}

	public function addProduct(Product $product)
	{
		$this->products[] = $product;

		$this->productsPrice += $this->shelf->getProductPrice($product);
		$this->discountPrice += $this->count() % 3 === 0 ? $this->shelf->getProductPrice($product) : 0;
		$this->finalPrice = $this->productsPrice - $this->discountPrice;
	}

	public function getTotalPrice()
	{
		return $this->finalPrice
			 +  $this->getVAT()
		 	 +  $this->getDeliveryCost();
	}

	private function getDeliveryCost()
	{
		return $this->finalPrice > $this->deliveryCostIncesion ? $this->deliveryCostUnder : $this->deliveryCostOver;
	}

	private function getVAT()
	{
		return $this->finalPrice * $this->VAT;
	}

	public function count()
	{
		return count($this->products);
	}

	public function getProducts()
	{
		return $this->products;
	}
}
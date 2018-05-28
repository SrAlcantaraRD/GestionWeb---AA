<?php

final class Shelf
{
	private $priceMap = array();

	public function setProductPrice(Product $product)
	{
		$this->priceMap[$product->getName()] = $product->getPrice();
	}

	public function getProductPrice(Product $product)
	{
		return $this->priceMap[$product->getName()];
	}
}
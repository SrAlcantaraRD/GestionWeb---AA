<?php

final class Product
{
	private $name;
	private $price;
	
   public function __construct($name, $price)
   {
		$this->name = $name;
		$this->price = $price;
   }

	public function setName(string $name)
	{
		$this->name = $name;
	}

	public function getName() : string
	{
		return $this->name;
	}

	public function setPrice(float $price)
	{
		$this->price = $price;
	}

	public function getPrice() : float
	{
		return $this->price;
	}

}
<?php 

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Nelmio\ApiDocBundle\Annotation\Security;
use Swagger\Annotations as SWG;
use Faker\Factory as Faker;

class SecurityController extends DefaultController
{
    /**
     * @Route("/tryFaker")
     */
   public function tryFaker()
	{
		$faker = Faker::create("es_ES");
		echo $faker->name."<br>";
		echo $faker->address."<br>";
		echo $faker->realText($maxNbChars = 500) ."<br>";

		return new Response();
	}

    /**
     * @Route("/api/books/{something}", methods={"GET"})
     */
	public function books($something)
	{
		var_dump($something);
		return new Response($something);
	}	
}
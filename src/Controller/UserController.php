<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Nelmio\ApiDocBundle\Annotation\Security;
use Symfony\Component\Routing\Annotation\Route;
use Swagger\Annotations as SWG;
use App\Entity\User;

class UserController extends DefaultController
{

	/**
	* List all users.
	*
	* This call return the complete users table from database.
	*
	* @Route("/api/users", methods={"GET"})
	* @SWG\Response(
	*     response=200,
	*     description="Returns the rewards of an user"
	* )
	* @SWG\Parameter(
	*     name="order",
	*     in="query",
	*     type="string",
	*     description="The field used to order rewards"
	* )
	* @SWG\Tag(name="Users")
	* @Security(name="Bearer")
	*/
	public function getUsers()
	{
		$serializer = $this->getSerializer();

     	$users = $this->getDoctrine()
         		->getRepository(User::class)
         		->findAll();

      return new Response($serializer->serialize($users, 'json'));
	}
}
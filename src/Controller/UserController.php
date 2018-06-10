<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Nelmio\ApiDocBundle\Annotation\Security;
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
	*     description="Returns all users"
	* )
	* @SWG\Tag(name="Users")
	* @Security(name="Bearer")
	*/
	public function getUsers()
	{
     	$users = $this->getDoctrine()
         		->getRepository(User::class)
         		->findAll();

      	return new Response($this->serializer->serialize($users, 'json'));
	}
}
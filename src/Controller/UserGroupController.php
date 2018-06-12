<?php

namespace App\Controller;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Nelmio\ApiDocBundle\Annotation\Security;
use Swagger\Annotations as SWG;
use App\Entity\UserGroup;

class UserGroupController extends DefaultController
{

	/**
	* List all user groups.
	*
	* This call return the complete usergroup table from database.
	*
	* @Route("/api/userGroups", methods={"GET"})
	* @SWG\Response(
	*     response=200,
	*     description="Returns all user groups"
	* )
	* @SWG\Response(
	*     response=404,
	*     description="There are not usergroups"
	* )
	* @SWG\Parameter(
	*     name="order",
	*     in="query",
	*     type="string",
	*     description="The field used to order user groups"
	* )
	* @SWG\Tag(name="UserGroups")
	* @Security(name="Bearer")
	*/
	public function getAllUserGroups()
	{
		$this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

		$serializer = $this->getSerializer();

     	$userGroups = $this->getDoctrine()
         		->getRepository(UserGroup::class)
         		->findAll();
     
     if (empty($userGroups)) {
         throw new NotFoundHttpException("There are not usergroups");
     }

     return new Response($serializer->serialize($userGroups, 'json'));
	}

	/**
	* List al userGroup .
	*
	* This call return the complete userGroup from database.
	*
	* @Route("/api/usergroup/{groupId}", methods={"GET"})
	* @SWG\Response(
	*     response=200,
	*     description="User group found."
	* )
	* @SWG\Response(
	*     response=404,
	*     description="There are not a usergroup with this ID."
	* )
	* @SWG\Parameter(
	*     name="groupId",
	*     in="path",
	*     type="string",
	*		required=true,
	*     description="The user group ID to find at the DDBB"
	* )
	* @SWG\Tag(name="UserGroups")
	* @Security(name="Bearer")
	*/
	public function getUserGroup($groupId = 0)
	{
		$this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

     	$userGroup = $this->getDoctrine()
         		->getRepository(UserGroup::class)
         		->find($groupId);

		if (empty($userGroup)) {
			throw new NotFoundHttpException("Not exist a usergroup with id: ${groupId}");
		}

      	return new Response($this->serializer->serialize($userGroup, 'json'));
	}

	/**
	* List al userGroup .
	*
	* This call return the complete userGroup from database.
	*
	* @Route("/api/usergroup/name/{strName}", methods={"GET"})
	* @SWG\Response(
	*     response=200,
	*     description="User group found."
	* )
	* @SWG\Response(
	*     response=404,
	*     description="There are not a usergroup with this ID."
	* )
	* @SWG\Parameter(
	*     name="groupId",
	*     in="path",
	*     type="string",
	*		required=true,
	*     description="The user group ID to find at the DDBB"
	* )
	* @SWG\Tag(name="UserGroups")
	* @Security(name="Bearer")
	*/
	public function getUserGroupByName($strName)
	{
		$this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

     	$userGroup = $this->getDoctrine()
         		->getRepository(UserGroup::class)
         		->findOneByName($strName);

		if (empty($userGroup)) {
			throw new NotFoundHttpException("Not exist a usergroup with name: ${strName}");
		}

      	return new Response($this->serializer->serialize($userGroup, 'json'));
	}
}
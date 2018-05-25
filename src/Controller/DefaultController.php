<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use Swagger\Annotations as SWG;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/Ey")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig', []);
    }

    /**
     * @Route("/admin")
     */
    public function admin()
    {
        return new Response('<html><body>Admin page!</body></html>');
    }

    /**
     * List the rewards of the specified user.
     *
     * This call takes into account all confirmed awards, but not pending or refused awards.
     *
     * @Route("/api/data", methods={"GET"})
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
     * @SWG\Tag(name="rewards")
     * @Security(name="Bearer")
     */
    public function dataAction()
    {
    return new JsonResponse([
        [
            'id' => 1,
            'author' => 'Chris Colborne',
            'avatarUrl' => 'http://1.gravatar.com/avatar/13dbc56733c2cc66fbc698cdb07fec12',
            'title' => 'Bitter Predation',
            'description' => 'Thirteen thin, round towers …',
        ],
        [
            'id' => 2,
            'author' => 'Louanne Perez',
            'avatarUrl' => 'https://randomuser.me/api/portraits/thumb/women/18.jpg',
            'title' => 'Strangers of the Ambitious',
            'description' => "A huge gate with thick metal doors …",
        ],
        [
            'id' => 3,
            'author' => 'Theodorus Dietvorst',
            'avatarUrl' => 'https://randomuser.me/api/portraits/thumb/men/49.jpg',
            'title' => 'Outsiders of the Mysterious',
            'description' => "Plain fields of a type of grass cover …",
        ],
    ]);
    }
}
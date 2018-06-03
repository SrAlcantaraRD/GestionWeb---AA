<?php

namespace App\Controller;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\Security;
use Symfony\Component\Serializer\Serializer;
use Swagger\Annotations as SWG;

class DefaultController extends Controller
{
    public $serializer;
    private $userInfo;

    public function __construct() {
        $this->serializer =$this->getSerializer();
    }

    public function getSerializer(){
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        return  $serializer = new Serializer($normalizers, $encoders);
    }

    /**
    * @Route("/", name="Homepage")
    * @Route("/login", name="login")
    * @Route("/Gestion/asda/awww")
    */
    public function index(Request $request, AuthenticationUtils $authenticationUtils, $slug = null)
    {
        $hasSession = $this->hasSession();
        if ($hasSession) {
            //Build user info
            $this->setUserInfo();

            // FOS firewall will prevent accesing pages without permission
            return $this->delegateRender($request, $slug);
        }else{
            // Not logged in? Render Login Page
            return $this->renderLoginPage($authenticationUtils);
        }
    }

    private function renderLoginPage(AuthenticationUtils $authenticationUtils){
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }

    private function hasSession() {

        $userLogger = false;

        $auth = $this->get('security.authorization_checker');

        if($auth->isGranted('IS_AUTHENTICATED_FULLY') || $auth->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $userLogger = true;
        }

        return $userLogger;
    }

    private function delegateRender(Request $request, $slug) {
        return $this->render('default/index.html.twig', [
            // We pass an array as props
            'props' => $this->serializer->normalize(
                [
                    'usuari' => $this->userInfo,
                    'location' => $request->getRequestUri($slug),
                ]
            )
        ]);
    }

    private function setUserInfo() {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $userInfo = $this->serializer->serialize($user, 'json');
    }
}
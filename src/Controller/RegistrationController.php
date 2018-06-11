<?php
namespace App\Controller;

use App\Form\Type\UserFormType;
use App\Entity\User;
use App\Entity\UserGroup;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends Controller
{
    /**
     * @Route("/Register", name="Register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        // 1) build the form
        $user = new User;
        $entityManager = $this->getDoctrine()->getManager();
        $form = $this->createForm(UserFormType::class, $user, array( 'entity_manager' => $entityManager, ));

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            $strGroupName = $user->getIdUserGroup()->getName();
            $userGroup = $this->getDoctrine()->getRepository(UserGroup::class)->findOneByName($strGroupName);
            $user->setIdUserGroup($userGroup);

            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            // return $this->render(
            //     'registration/register_confirmed.html.twig',
            //     array(
            //         "email" => $user->getEmail()
            //     )
            // );
            
            return $this->redirectToRoute(
                'RegistrationConfirmed',
                array(
                    "email" => base64_encode($user->getEmail())
                )
            );
        }

        return $this->render(
            'registration/register.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/RegistrationConfirmed/{email}", name="RegistrationConfirmed")
     */
    public function registerConfirmed($email)
    {
        return $this->render(
            'registration/register_confirmed.html.twig',
            array(
                "email" => base64_decode($email)
            )
        );
    }
}
<?php


namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use App\Form\EditType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends AbstractController
{

    /**
     * @Route("/register", name="register")
     */
    public function register(Request $request, EntityManagerInterface $em, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();

        $user -> setCreationDate(new \DateTime());
        $user -> setRoles("ROLE_USER");

        $registerForm = $this->createForm(RegisterType::class, $user);

        $registerForm->handleRequest($request);

        if ($registerForm->isSubmitted() && $registerForm->isValid())
        {

            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);

            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'Registration is okay!');
            return $this->redirectToRoute("login");
        }

        if ($registerForm->isSubmitted() && $registerForm->getErrors())
        {
            $this->addFlash('error', 'An error has occurred..');
        }

        return $this->render('user/register.html.twig', [
            'controller_name' => 'UserController', "registerForm" =>$registerForm->createView()
        ]);
    }

    /**
     * @Route("/login", name="login")
     */
    public function login(AuthenticationUtils $authUtils)
    {
        $error = $authUtils->getLastAuthenticationError();
        $lastUsername = $authUtils->getLastUsername();
        return $this->render('user/login.html.twig', [
            'lastUsername' => $lastUsername,
            'error'         => $error,
        ]);
    }

    //Symfony gère entièrement cette route!!!
    /**
     * @Route("/logout", name="logout")
     */
    public function logout(){}

	/**
     * @Route("/editprofile", name="editprofile")
     */
    public function editprofile(Request $request, EntityManagerInterface $em, UserPasswordEncoderInterface $encoder)
    {



        $user = new User();
        $user = $this->getUser();

        $editForm = $this->createForm(EditType::class, $user);

        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid())
        {

            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);

            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'Your profile has been modified!');
            return $this->redirectToRoute("home");
        }

        if ($editForm->isSubmitted() && $editForm->getErrors())
        {
            $this->addFlash('error', 'An error has occurred..');
        }

        return $this->render('user/editprofile.html.twig', [
            'controller_name' => 'UserController', "editForm" =>$editForm->createView()
        ]);
    }
}
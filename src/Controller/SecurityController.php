<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * @Route(name="securite_")
 */
class SecurityController extends AbstractController
{
    /**
     * @Route(path="/connexion", name="connexion", methods={"GET", "POST"})
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {

        if ($this->isGranted('ROLE_USER')) {
            return $this->render('accueil/accueil.html.twig');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route(path="/deconnexion", name="deconnexion",  methods={"GET"})
     */
    public function logout(): void {}
}

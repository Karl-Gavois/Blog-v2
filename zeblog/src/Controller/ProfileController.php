<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')]
    public function index(UserRepository $userRepository): Response
    {
        // Get the current user (assuming you are using Symfony's security component)
        $currentUser = $this->getUser();

        // Fetch the user entity based on the current user's id
        $user = $userRepository->findOneBy(['id' => $currentUser->getId()]);

        return $this->render('profile/index.html.twig', [
            'controller_name' => 'ProfileController',
            'user' => $user,
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;

class UserController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index(ClientRegistry $clientRegistry)
    {
        //  /** @var \KnpU\OAuth2ClientBundle\Client\Provider\FacebookClient $client */
        //  $client = $clientRegistry->getClient('facebook_main');

        //  try {
        //      // the exact class depends on which provider you're using
        //      /** @var \League\OAuth2\Client\Provider\FacebookUser $user */
        //      $user = $client->fetchUser();
 
        //      // do something with all this new power!
  
        //       dump($user);
        //       // die;


        //       return $this->render('test/index.html.twig', [
        //           'user' => $user,
        //       ]);
              

        //  } catch (IdentityProviderException $e) {
        //      // something went wrong!
        //      // probably you should return the reason to the user
        //      var_dump($e->getMessage());
        //      die;
        //  }

        
        return $this->render('test/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}

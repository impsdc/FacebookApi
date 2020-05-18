<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FacebookMainController extends AbstractController
{

    /**
     * Link to this controller to start the "connect" process
     *
     * @Route("/connect/facebook", name="connect_facebook_start")
     */
    public function connectAction(ClientRegistry $clientRegistry)
    {
        // will redirect to Facebook!
        return $clientRegistry
            ->getClient('facebook_main') // key used in config/packages/knpu_oauth2_client.yaml
            ->redirect([
                'public_profile', 'email' // the scopes you want to access
            ]);
    }

    /**
     * After going to Facebook, you're redirected back here
     * because this is the "redirect_route" you configured
     * in config/packages/knpu_oauth2_client.yaml
     *
     * @Route("/connect/facebook/check", name="connect_facebook_check")
     */
    public function connectCheckAction(Request $request, ClientRegistry $clientRegistry)
    {
           /** @var \KnpU\OAuth2ClientBundle\Client\Provider\FacebookClient $client */
           $client = $clientRegistry->getClient('facebook_main');

           try {
               // the exact class depends on which provider you're using
               /** @var \League\OAuth2\Client\Provider\FacebookUser $user */
               $user = $client->fetchUser();
   
               // do something with all this new power!
               $name = $user->getFirstName();
               
               $prenom = $user->getLastName();
            //    $response = $this->forward('App\Controller\UserController::index', [
            //         'name'  => $name,
            //         'prenom' => $prenom,
            //     ]);
                // dump($user);
                // die;

                return $this->render('user/index.html.twig', [
                    'user' => $user,
                ]);
                
  
           } catch (IdentityProviderException $e) {
               // something went wrong!
               // probably you should return the reason to the user
               var_dump($e->getMessage());
               die;
           }
    }
}

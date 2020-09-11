<?php

namespace App\Controller;

use App\Entity\Minecraft;
use App\Entity\ServerStatus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 * @package App\Controller
 * @Route("/api")
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/player/{playerName}", name="getPlayer")
     */
    public function getPlayer(Minecraft $minecraft, $playerName){

        return $this->json($minecraft->getPlayer($playerName));
    }

    /**
     * @Route("/server/{hostname}/{port}", name="getServerStatus", methods={"GET"})
     */
    public function getServerStatus($hostname, $port = "25565"){
        $response =  ServerStatus::query($hostname, $port);
        if(!$response)
        {
            return $this->json(array('online'=>'false', 'description'=>'Serveur hors ligne'));
        }
        return $this->json($response);
    }
}

<?php


namespace App\Entity;

use GuzzleHttp\Client;
use JMS\Serializer\Serializer;
use MinecraftServerStatus\MinecraftServerStatus;

class Minecraft
{
    private $minecraftClient;
    private $sessionServer;
    private $serializer;

    /**
     * Minecraft constructor.
     * @param Client $minecraftClient
     * @param Client $sessionServerClient
     * @param Serializer $serializer
     */
    public function __construct(Client $minecraftClient, Client $sessionServerClient, Serializer $serializer)
    {
        $this->minecraftClient = $minecraftClient;
        $this->serializer = $serializer;
        $this->sessionServerClient = $sessionServerClient;
    }

    public function getPlayer($name){
        $uri = 'users/profiles/minecraft/'.$name;
        $response = $this->minecraftClient->get($uri);
        $data = $this->serializer->deserialize($response->getBody()->getContents(), 'array', 'json');

        return [
            'name' => $data["name"],
            'id' => $data["id"],
            'skin'=> "https://crafatar.com/avatars/".$data["id"]
        ];
    }

    public function getServerStatus($host, $port){
        return MinecraftServerStatus::query($host, $port);
    }
}

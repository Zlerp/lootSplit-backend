<?php
// src/Controller/Sess.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class LootSessionsController
{
    /**
    * @Route("/loot/sessions")
    */
    public function number()
    {
        $response = new JsonResponse(['lootSessions' => 123]);

        return $response;
    }
}
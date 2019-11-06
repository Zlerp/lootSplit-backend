<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Session;
use App\Entity\Trip;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;


class SessionController extends AbstractController
{



    /**
     * @Route("/session/create", name="session_create")
     */
    public function createSession(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $session = new Session();
        $session->setSessionName($request->query->get('sessionName'));

        $entityManager->persist($session);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();


        $response = new JsonResponse(['sessionId' => $session->getId(), 'sessionName' => $session->getSessionName()]);

        return $response;

    }

    /**
     * @Route("/session/{id}", name="session_get")
     */
    public function getSession($id = '')
    {

        if ($id === '') {
            $sessionRepository = $this->getDoctrine()
                ->getRepository(Session::class);
            $sessions = $sessionRepository->findAll();
        } else {
            $sessions = [$this->getDoctrine()
                ->getRepository(Session::class)
                ->find($id)];

        }


        if (!$sessions) {
            throw $this->createNotFoundException(
                'No session found for id '.$id
            );
        }

        $trips = $this->getDoctrine()
            ->getRepository(Trip::class)
            ->findBy(array('sessionId' => $id));

        return new JsonResponse([$sessions, $trips]);

    }


    /**
     * @Route("/session/edit/{id}", name="session_update")
     */
    public function update(Request $request, $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $session = $entityManager->getRepository(Session::class)->find($id);

        if (!$session) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $session->setSessionName($request->request->get('sessionName'));
        $entityManager->flush();

        return $this->redirectToRoute('session_show', [
            'id' => $session->getId()
        ]);
    }

    /**
     * @Route("/session/delete/{id}", name="session_delete")
     */
    public function delete($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $session = $entityManager->getRepository(Session::class)->find($id);

        $entityManager->remove($session);
        $entityManager->flush();



        return new Response('Session with ID: '.$id.' Deleted');

    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Trip;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;


class TripController extends AbstractController
{



    /**
     * @Route("/trip/create", name="trip_create")
     */
    public function createTrip(Request $request)
    {
        header("Access-Control-Allow-Origin: *");

        $entityManager = $this->getDoctrine()->getManager();
        $trip = new Trip();
        $trip->setUserName($request->query->get('userName'));
        $trip->setLootValue($request->query->get('lootValue'));
        $trip->setSessionId($request->query->get('sessionId'));

        $entityManager->persist($trip);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();


        $response = new JsonResponse(['tripId' => $trip->getId(), 'tripUsername' => $trip->getUserName(), 'tripLootValue' => $trip->getLootValue(), 'tripSessionId' => $trip->getSessionId()]);

        return $response;

    }

    /**
     * @Route("/trip/{id}", name="trip_get")
     */
    public function getTrips($id = '')
    {
        header("Access-Control-Allow-Origin: *");

        if ($id === '') {
            $tripRepository = $this->getDoctrine()
                ->getRepository(Trip::class);
            $trips = $tripRepository->findAll();
        } else {
            $trips = [$this->getDoctrine()
                ->getRepository(Trip::class)
                ->find($id)];

        }
        if (!$trips) {
            throw $this->createNotFoundException(
                'No trips found for id '
            );
        }


        return new JsonResponse($trips);

    }


    /**
     * @Route("/trip/edit/{id}", name="trip_update")
     */
    public function update(Request $request, $id)
    {        header("Access-Control-Allow-Origin: *");

        $entityManager = $this->getDoctrine()->getManager();
        $trip = $entityManager->getRepository(Trip::class)->find($id);

        if (!$trip) {
            throw $this->createNotFoundException(
                'No trip found for id '.$id
            );
        }
        $trip->setUserName($request->request->get('userName'));
        $trip->setLootValue($request->request->get('lootValue'));

        $entityManager->flush();

        return $this->redirectToRoute('trip_get', [
            'id' => $trip->getId()
        ]);
    }

    /**
     * @Route("/trip/delete/{id}", name="trip_delete")
     */
    public function delete($id)
    {        header("Access-Control-Allow-Origin: *");

        $entityManager = $this->getDoctrine()->getManager();
        $trip = $entityManager->getRepository(Trip::class)->find($id);

        $entityManager->remove($trip);
        $entityManager->flush();



        return new Response('Trip with ID: '.$id.' Deleted');

    }
}

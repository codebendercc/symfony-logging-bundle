<?php

namespace Codebender\LogBundle\Controller;

use Codebender\LogBundle\CodebenderLogBundle;
use Codebender\LogBundle\Entity\Log;
use Codebender\LogBundle\Entity\ViewLog;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Response;

// testing ContainerAware
use Symfony\Component\DependencyInjection\ContainerAware;

class LogController extends ContainerAware//Controller
{

    public function logAction($user, $action, $description, $metadata)
    {


        $log = new Log();
        $log->setUser($user);
        $log->setAction($action);
        $log->setDescription($description);
        $log->setMetadata($metadata);

        $log->setTimestamp(new \DateTime("now"));
        $this->em->persist($log);
        $this->em->flush();

        return new Response(json_encode(array('success' => true)));
    }

    public function logViewAction($user, $action, $description, $metadata, $session, $hasPreviousSession)
    {


        $log = new ViewLog();
        $log->setUser($user);
        $log->setAction($action);
        $log->setDescription($description);
        $log->setMetadata($metadata);
        $log->setTimestamp(new \DateTime("now"));
        $log->setSession($session);
        $log->setHasPreviousSession($hasPreviousSession);
        $this->em->persist($log);
        $this->em->flush();

        return new Response(json_encode(array('success' => true)));
    }

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

}
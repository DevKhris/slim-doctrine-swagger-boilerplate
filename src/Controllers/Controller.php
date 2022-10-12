<?php

declare(strict_types=1);

namespace App\Controllers;

use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;

class Controller
{
    protected $container;

    protected $view;

    protected $entityManager;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->view = $this->container->get('view');

        $this->entityManager = $this->container->get(EntityManager::class);
    }
}

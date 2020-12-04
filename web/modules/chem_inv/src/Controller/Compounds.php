<?php

namespace Drupal\chem_inv\Controller;

use Drupal\chem_inv\Entities;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Returns responses for Chem Inv routes.
 */
class Compounds extends ControllerBase
{

    /**
     * The cheminv.entities service.
     *
     * @var Entities
     */
    protected Entities $cheminvEntities;

    /**
     * The controller constructor.
     *
     * @param Entities $cheminv_entities
     *   The cheminv.entities service.
     */
    public function __construct(Entities $cheminv_entities)
    {
        $this->cheminvEntities = $cheminv_entities;
    }

    /**
     * {@inheritdoc}
     */
    public static function create(ContainerInterface $container)
    {
        return new static(
            $container->get('cheminv.entities')
        );
    }

    /**
     * Builds the response.
     */
    public function build()
    {
        $compounds = $this->cheminvEntities->getAllCompounds();

        $build['content'] = [
            '#theme' => 'cheminv-compounds',
            '#compounds' => $compounds,
        ];

        return $build;
    }
}

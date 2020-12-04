<?php

namespace Drupal\chem_inv\Form;

use Drupal\chem_inv\Entities;
use Drupal\Core\Database\Connection;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a Chem Inv form.
 */
class Compound extends FormBase
{
    /**
     * Entities service
     *
     * @var Entities
     */
    protected Entities $entities;

    /**
     * Compound constructor.
     *
     * @param Entities $entities
     */
    public function __construct(Entities $entities)
    {
        $this->entities = $entities;
    }

    /**
     * Create Controller
     *
     * @param ContainerInterface $container
     *
     * @return Compound|static
     */
    public static function create(ContainerInterface $container)
    {
        return new static($container->get('cheminv.entities'));
    }

    /**
     * {@inheritdoc}
     */
    public function getFormId()
    {
        return 'chem_inv_compound';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['name'] = [
            '#type' => 'textfield',
            '#title' => $this
                ->t('Compound name'),
            '#size' => 60,
            '#required' => true,
        ];
        $form['cas'] = [
            '#type' => 'textfield',
            '#title' => $this
                ->t('CAS number'),
        ];

        $form['actions'] = [
            '#type' => 'actions',
        ];
        $form['actions']['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Submit'),
        ];

        return $form;

    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state)
    {
        if (mb_strlen($form_state->getValue('name')) < 1) {
            $form_state->setErrorByName('name', $this->t('Please give a valid compound name'));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        $values = [
            'name' => $form_state->getValue('name'),
            'cas' => $form_state->getValue('cas'),
        ];

        $this->entities->addCompound($values);

        $this->messenger()->addStatus($this->t('Compound added'));
        $form_state->setRedirect('chem_inv.compounds');
    }
}

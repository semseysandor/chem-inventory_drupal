<?php

namespace Drupal\chem_inv\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a Chem Inv form.
 */
class Compound extends FormBase
{

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
            '#default_value' => $node->title,
            '#size' => 60,
            '#required' => true,
        ];

        $form['cas'] = [
            '#type' => 'textfield',
            '#title' => $this
                ->t('CAS number'),
            '#default_value' => $node->title,
            '#size' => 60,
        ];

        $form['actions'] = [
            '#type' => 'actions',
        ];
        $form['actions']['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Send'),
        ];

        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state)
    {
        if (mb_strlen($form_state->getValue('message')) < 10) {
            $form_state->setErrorByName('name', $this->t('Message should be at least 10 characters.'));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        $this->messenger()->addStatus($this->t('The message has been sent.'));
        $form_state->setRedirect('<front>');
    }

}

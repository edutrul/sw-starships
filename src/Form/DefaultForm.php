<?php

/**
 * @file
 * Contains \Drupal\sw\Form\DefaultForm.
 */

namespace Drupal\sw\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Serialization\Json;
use GuzzleHttp\Client;
/**
 * Class DefaultForm.
 *
 * @package Drupal\sw\Form
 */
class DefaultForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'default_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    
    $films = [];
    try {
      $client = new Client();
      $res = $client->get('http://swapi.co/api/films/');
      $films_response = Json::decode($res->getBody());
    } catch (RequestException $e) {
      // return($this->t('Error'));
    }
    $films_titles = [];
    foreach ($films_response['results'] as $films_response) {
      $films_titles[$films_response['episode_id']] = $films_response['title'];
    }
    
    $form['films'] = array(
      '#type' => 'select',
      '#title' => $this->t('Films'),
      '#description' => $this->t('Select Films'),
      '#options' => $films_titles,
      '#size' => 1,
    );
    
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Get Startships'),
      '#button_type' => 'primary',
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

  }

}

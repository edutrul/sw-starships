<?php

/**
 * @file
 * Contains \Drupal\sw\Tests\DefaultController.
 */

namespace Drupal\sw\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Provides automated tests for the sw module.
 */
class DefaultControllerTest extends WebTestBase {
  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return array(
      'name' => "sw DefaultController's controller functionality",
      'description' => 'Test Unit for module sw and controller DefaultController.',
      'group' => 'Other',
    );
  }

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();
  }

  /**
   * Tests sw functionality.
   */
  public function testDefaultController() {
    // Check that the basic functions of module sw.
    $this->assertEquals(TRUE, TRUE, 'Test Unit Generated via App Console.');
  }

}

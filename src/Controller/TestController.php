<?php

namespace Drupal\migration_exercise\Controller;

use Drupal\migration_exercise\Entity\CityInterface;

class TestController extends \Drupal\Core\Controller\ControllerBase
{


  public function testage() {
    dsm("test");
    $values = [
      'remote_id' => "test",
      'title' => "test",
      'city' => "test",
      'pop' => 11,
      'state' => "test",
      ];

    /** @var CityInterface $city */
    $city = \Drupal::entityTypeManager()->getStorage('city')->create($values);
    $city->setLoc([1.222, 3.4444]);
//    $city->setName($data->name);
//    $city->setProductNumber($data->number);
    $city->save();
    dsm($city);
    dsm($city->getLoc());
    return ['#markup' => "test content"];
  }
}

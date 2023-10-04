<?php

namespace Drupal\migration_exercise\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;

/**
 * Defines the City entity.
 *
 * @ContentEntityType(
 *   id = "city",
 *   label = @Translation("City"),
 *   base_table = "city",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "title",
 *     "uuid" = "uuid",
 *   },
 * )
 */
class City extends ContentEntityBase implements CityInterface  {
  use EntityChangedTrait;

  /**
   * {@inheritdoc}
   */
  public function getRemoteId()
  {
    return $this->get('remote_id')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setRemoteId($remote_id)
  {
    $this->set('remote_id', $remote_id);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getTitle() {
    return $this->get('title')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setTitle($title) {
    $this->set('title', $title);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCity() {
    return $this->get('city')->value;
  }
  /**
   * {@inheritdoc}
   */
  public function setCity($city) {
    $this->set('city', $city);
    return $this;
  }
  /**
   * {@inheritdoc}
   */
  public function getLoc() {
    return [$this->get('loc_lat')->value,  $this->get('loc_lon')->value];
  }
  /**
   * {@inheritdoc}
   */
  public function setLoc($loc) {
    $this->set('loc_lat', $loc[0]);
    $this->set('loc_lon', $loc[1]);
    return $this;
  }

  public function getPop()
  {
    return $this->get('pop')->value;
  }

  public function setPop($pop)
  {
    $this->set('pop', $pop);
    return $this;
  }

  public function getState()
  {
    return $this->get('state')->value;
  }

  public function setState($state)
  {
    $this->set('state', $state);
    return $this;
  }

  public static function baseFieldDefinitions(EntityTypeInterface  $entity_type)
  {
    $fields = parent::baseFieldDefinitions($entity_type);
    $fields['remote_id'] = BaseFieldDefinition::create('string')
      ->setLabel(t('remote_id'))
      ->setDescription(t('The remote_id of this city.'))
      ->setRequired(TRUE)
      ->setDefaultValue('');
    $fields['title'] = BaseFieldDefinition::create('string')
      ->setLabel(t('title'))
      ->setDescription(t('The title of this city.'))
      ->setRequired(TRUE)
      ->setDefaultValue('');
    $fields['city'] = BaseFieldDefinition::create('string')
      ->setLabel(t('city'))
      ->setDescription(t('The city name of this city.'))
      ->setRequired(TRUE)
      ->setDefaultValue('');
    $fields['loc_lat'] = BaseFieldDefinition::create('float')
      ->setLabel(t('loc_lat'))
      ->setDescription(t('The lattitude of location of this city.'))
      ->setRequired(TRUE)
      ->setDefaultValue(NULL);
    $fields['loc_lon'] = BaseFieldDefinition::create('float')
      ->setLabel(t('loc_lon'))
      ->setDescription(t('The longitude of location of this city.'))
      ->setRequired(TRUE)
      ->setDefaultValue(NULL);
    $fields['pop'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('pop'))
      ->setDescription(t('The pop of this city.'))
      ->setRequired(TRUE)
      ->setDefaultValue(NULL);
    $fields['state'] = BaseFieldDefinition::create('string')
      ->setLabel(t('state'))
      ->setDescription(t('The state of this city.'))
      ->setRequired(TRUE)
      ->setDefaultValue('');
    return $fields;
  }
}

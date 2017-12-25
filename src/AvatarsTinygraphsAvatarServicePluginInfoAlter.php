<?php

namespace Drupal\avatars_tinygraphs;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Drupal\avatars\Event\AvatarKitEvents;
use Drupal\avatars\Event\AvatarKitServiceDefinitionAlterEvent;
use Drupal\avatars_tinygraphs\Plugin\Avatars\Service\Tinygraphs;

/**
 * Used to alter avatar service plugin definitions.
 */
class AvatarsTinygraphsAvatarServicePluginInfoAlter implements EventSubscriberInterface {

  /**
   * Alter avatar service plugin definitions.
   *
   * @param \Drupal\avatars\Event\AvatarKitServiceDefinitionAlterEvent $event
   *   The event.
   */
  public function alterServiceInfo(AvatarKitServiceDefinitionAlterEvent $event) {
    // Avatar Kit service plugin manager will pick up common services simply by
    // making these services use a real class instead of an abstract.
    $definitions = $event->getDefinitions();
    $event->setDefinitions($definitions);
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[AvatarKitEvents::PLUGIN_SERVICE_ALTER][] = ['alterServiceInfo'];
    return $events;
  }

}

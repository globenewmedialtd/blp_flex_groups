<?php

namespace Drupal\blp_flex_groups\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Drupal\group\Entity\GroupInterface;
use Drupal\Core\Url;

/**
 * Class LocalTaskRedirect.
 */
class LocalTaskRedirect implements EventSubscriberInterface {

  /**
   * Constructor.
   */
  public function __construct() {
  }

  /**
   * {@inheritdoc}
   */
  static function getSubscribedEvents() {
    $events[KernelEvents::REQUEST][] = ['redirect'];
    return $events;
  }

  /**
   * Code that should be triggered on event specified
   */
  public function redirect() {

    $current_route_name = \Drupal::service('current_route_match')->getRouteName();

    if ($current_route_name == 'view.event_series_per_project.page_event_series') {
    
        $group = \Drupal::service('current_route_match')->getParameter('group');

        \Drupal::logger('blp_flex_groups')->notice($group);
        if(!getReferencedGroup($group)) {

            $url = Url::fromRoute('entity.group.canonical',['group' => $group]);
            \Drupal::logger('blp_flex_groups')->notice($url->toString());
            $response = new RedirectResponse($url->toString(), 302);
            $response->send();

        }
    }
  }
}
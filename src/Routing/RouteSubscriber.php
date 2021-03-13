<?php

namespace Drupal\blp_flex_groups\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Listens to the dynamic route events.
 */
class RouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    if ($route = $collection->get('view.event_series_per_project.page_event_series')) {
      $route->setRequirement('_blp_flex_group_custom_access', 'Drupal\blp_flex_groups\Access\BlpFlexGroupsAccessCheck');
    }
  }
}

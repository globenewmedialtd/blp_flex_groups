<?php

namespace Drupal\blp_flex_groups\Access;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Routing\Access\AccessInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\group\Entity\GroupInterface;
use Symfony\Component\Routing\Route;
use Drupal\Core\Routing\RouteMatch;

/**
 * Determines access to for event series view.
 */
class BlpFlexGroupsAccessCheck implements AccessInterface {

  /**
   * Checks access to the event series view
   */
  public function access(Route $route, RouteMatch $route_match) {    

    $parameters = $route_match->getParameters();
    $group = $parameters->get('group');

    if (isset($group)) {
    
      if (!blp_flex_groups_get_referenced_group($group)) {
	      return AccessResult::forbidden();
      }

    } 

    return AccessResult::allowed();
    
  }

}

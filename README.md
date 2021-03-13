# blp_flex_groups
Core Module for custom flexible group types

## Node Access

There is a new hook_node_access to handle our group types!

## New Feature - Access check

It is best to use here an real access check. Doing that gives us the opportunity to remove the redirect from unwanted routes and the use hook_local_tasks_alter.

Please make sure you clear all caches.

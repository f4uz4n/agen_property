<?php

if (!function_exists('activity_log')) {
  function activity_log($action, $description = null)
  {
    $session = session();
    $userId = $session->get('user_id') ?? 0;
    $ip = service('request')->getIPAddress();
    $agent = service('request')->getUserAgent()->getAgentString();

    $message = sprintf(
      "[User:%s] [Action:%s] [Desc:%s] [IP:%s] [Agent:%s]",
      $userId,
      $action,
      $description,
      $ip,
      $agent
    );

    log_message('info', $message);
  }
}

<?php if (!defined('APPLICATION')) exit;



function activateButton($activity_type) {
   $qs = [
       'Name' => $activity_type['Name'],
       'Public' => !$activity_type['Public']
   ];

   $state = ($activity_type['Public'] ? 'active' : 'inActive');

   $return = '<span id="activitytype-toggle">';
   if ($state === 'active') {
      $return .= wrap(anchor('<div class="toggle-well"></div><div class="toggle-slider"></div>', '/activityswitch/toggle?'.http_build_query($qs), 'Hijack'), 'span', ['class' => "toggle-wrap toggle-wrap-on"]);
   } else {
      $return .= wrap(anchor('<div class="toggle-well"></div><div class="toggle-slider"></div>', '/activityswitch/toggle?'.http_build_query($qs), 'Hijack'), 'span', ['class' => "toggle-wrap toggle-wrap-off"]);
   }

   $return .= '</span>';

   return $return;
}

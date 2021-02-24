<?php if (!defined('APPLICATION')) exit; ?>
<?php
$desc = '<p>'.t('Activity').' '
    .t('')
    .'</p>';

helpAsset(t('Heads up!'), $desc);

echo heading($this->data('Title'));

?>
<div class="table-wrap">
<table class="table-data js-tj">
   <thead>
      <tr>
         <th class="NameColumn column-lg"><?php echo t('ActivityType'); ?></th>
         <th class="column-xl"><?php echo t("Description"); ?></th>
         <th class="options"><?php echo t("Public"); ?></th>
      </tr>
   </thead>
   <tbody>
      <?php foreach ($this->data('activity_types') as $activity_type): ?>
      
      <tr id="activity_type_<?php echo $activity_type['Name']; ?>" class="activity_type_<?php echo $activity_type['Name']; ?>">
         <td class="NameColumn">
            <?php echo $activity_type['Name']; ?>
         </td>
         <td class="AutoDescription">
            <?php
            //<li>'.$activity_type['ProfileHeadline'].'</li>
            echo wrap('<li>'.$activity_type['FullHeadline'].'</li>', 'ul');
            ?>
         </td>
         <td class="options">
            <div class="btn-group">
               
               <?php echo activateButton($activity_type); ?>
            </div>
         </td>
      </tr>
      <?php endforeach; ?>
   </tbody>
</table>
</div>

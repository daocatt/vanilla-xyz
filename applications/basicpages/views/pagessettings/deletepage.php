<?php defined('APPLICATION') or exit(); ?>
    <h1><?php echo $this->data('Title'); ?></h1>
    <div class="padded">
        <?php echo t('BasicPages.Settings.DeletePage.Notice',
            'Are you sure you want to delete this page? This action cannot be undone.'); ?>
    </div>
<?php
echo $this->Form->open();
echo $this->Form->errors();
?>
    <div class="form-footer">
        <?php
        echo $this->Form->button(t('BasicPages.Settings.DeletePage.OK', 'OK'), array('class' => 'Button Primary'));
        echo anchor(t('BasicPages.Settings.Cancel', 'Cancel'), 'pagessettings/allpages', 'Button');
        ?>
    </div>
<?php echo $this->Form->close();

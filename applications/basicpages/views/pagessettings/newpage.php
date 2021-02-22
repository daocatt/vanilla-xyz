<?php defined('APPLICATION') or exit();
$Page = $this->data('Page');
$Session = Gdn::session();

if (isset($this->_Definitions['CurrentFormat'])) {
    $FormatSelected = $this->_Definitions['CurrentFormat'];
} else {
    $FormatSelected = val('Format', $Page, $this->_Definitions['DefaultFormat']);
}

echo heading($this->data('Title'), '', '', [], '/pagessettings/allpages');

echo $this->Form->open();
echo $this->Form->errors();
?>
    <ul>
        <li class="form-group">
            <div class="label-wrap"><?php echo $this->Form->label(t('BasicPages.Settings.PageTitle', 'Page Title'), 'Name'); ?></div>
            <div class="input-wrap"><?php echo $this->Form->textBox('Name', array('maxlength' => 100)); ?></div>
        </li>
        <li id="UrlCode" class="form-group">
            <div class="label-wrap"><?php echo wrap(t('BasicPages.Settings.PageUrl', 'Page URL'), 'strong') . ':'; ?></div>
            <div class="input-wrap category-url-code">
                <?php
                echo Gdn::request()->url('page', true);
                echo '/';
                echo wrap(htmlspecialchars($this->Form->getValue('UrlCode')));
                echo $this->Form->textBox('UrlCode');
                echo anchor(t('edit'), '#', 'Edit btn btn-link');
                echo anchor(t('OK'), '#', 'Save btn btn-primary');
                ?>
            </div>
        </li>
    </ul>

    <section>
        <h2 class="subheading"><?php echo $this->Form->label(t('BasicPages.Settings.NewPage.PageBody', 'Page Body'), 'Body'); ?></h2>

        <?php
        echo wrap($this->Form->textBox('Body',
            array('MultiLine' => true, 'format' => $FormatSelected, 'table' => 'Page', 'class' => 'TextBox')), 'div',
            array('class' => 'TextBoxWrapper'));
        ?>
    </section>

    <div id="AdvancedOptionsToggle" class="padded">
        <?php echo $this->Form->checkBox('ShowAdvancedOptions', t('Show advanced options?')); ?>
    </div>

    <ul id="AdvancedOptions">
        <li class="form-group">
            <div class="label-wrap"><?php echo $this->Form->label(t('Body Format'), 'Format'); ?></div>
            <div class="input-wrap"><?php echo $this->Form->dropDown('Format', $this->data('Formats'), array('Value' => $FormatSelected)); ?></div>
        </li>
        <li class="form-group">
            <?php echo $this->Form->toggle('SiteMenuLink',
                t('BasicPages.Settings.NewPage.PageShowSiteMenuLink', 'Show header site menu link?')); ?>
        </li>
        <li class="form-group">
            <?php echo $this->Form->toggle('HidePageFromURL',
                t('BasicPages.Settings.NewPage.PageHidePageFromURL', 'Hide "/page" from the URL?')); ?>
        </li>
        <li class="form-group">
            <?php echo $this->Form->toggle('ViewPermission', t('BasicPages.Settings.NewPage.PageCustomViewPermission',
                'Use custom view permission for roles? If unchecked, then this page will visible to anyone.')); ?>
        </li>
    </ul>

<?php echo $this->Form->close('Save');

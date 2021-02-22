<?php defined('APPLICATION') or exit();
$Session = Gdn::session();

// Format page body.
$PageBody = $this->Page->Body;
if ($this->Page->Format === 'RawHtmlLineBreaks') {
    $PageBody = preg_replace("/(\015\012)|(\015)|(\012)/", "<br />", $PageBody);
    $PageBody = fixNl2Br($PageBody);
} else if ($this->Page->Format !== 'RawHtml') {
    $PageBody = Gdn_Format::to($PageBody, $this->Page->Format);
}
?>
<div id="Page_<?php echo $this->Page->PageID; ?>" class="PageContent Page-<?php echo $this->Page->UrlCode; ?>">
    <?php $this->fireEvent('BeforePageOptions'); ?>
    <?php if ($Session->checkPermission('Garden.Settings.Manage')): ?>
        <div class="Options">
         <span class="ToggleFlyout OptionsMenu">
            <span class="OptionsTitle" title="<?php echo T('Options'); ?>"><?php echo t('Options'); ?></span>
             <?php echo sprite('SpFlyoutHandle', 'Arrow'); ?>
             <ul class="Flyout MenuItems" style="display: none;">
                 <?php echo wrap(anchor(t('BasicPages.Settings.EditPage', 'Edit Page'),
                     'pagessettings/editpage/' . $this->Page->PageID, 'EditPage'), 'li'); ?>
             </ul>
         </span>
        </div>
    <?php endif; ?>
    <h1 id="PageTitle" class="H"><?php echo $this->Page->Name; ?></h1>
    <?php $this->fireEvent('AfterPageTitle'); ?>
    <div id="PageBody"><?php echo $PageBody; ?></div>
    <?php $this->fireEvent('AfterPageBody'); ?>
</div>

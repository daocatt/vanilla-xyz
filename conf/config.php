<?php if (!defined('APPLICATION')) exit();

// Database
$Configuration['Database']['Name'] = 'vanillaforums4';
$Configuration['Database']['Host'] = 'localhost';
$Configuration['Database']['User'] = 'root';
$Configuration['Database']['Password'] = 'walleve939';

// EnabledApplications
$Configuration['EnabledApplications']['Vanilla'] = 'vanilla';

// EnabledLocales
$Configuration['EnabledLocales']['vf_zh'] = 'zh';

// EnabledPlugins
$Configuration['EnabledPlugins']['recaptcha'] = false;
$Configuration['EnabledPlugins']['GettingStarted'] = 'GettingStarted';
$Configuration['EnabledPlugins']['stubcontent'] = true;
$Configuration['EnabledPlugins']['swagger-ui'] = true;
$Configuration['EnabledPlugins']['Quotes'] = false;
$Configuration['EnabledPlugins']['rich-editor'] = true;
$Configuration['EnabledPlugins']['Ignore'] = true;
$Configuration['EnabledPlugins']['VanillaInThisDiscussion'] = false;
$Configuration['EnabledPlugins']['ProfileExtender'] = false;
$Configuration['EnabledPlugins']['QnA'] = true;
$Configuration['EnabledPlugins']['AllViewed'] = true;
$Configuration['EnabledPlugins']['IndexPhotos'] = false;

// Feature
$Configuration['Feature']['QnAFollowUp']['Enabled'] = false;
$Configuration['Feature']['DeferredLegacyScripts']['Enabled'] = true;

// Garden
$Configuration['Garden']['Title'] = 'Vanilla';
$Configuration['Garden']['Cookie']['Salt'] = 'pnRnVx58JhZx4I5m';
$Configuration['Garden']['Cookie']['Domain'] = '';
$Configuration['Garden']['Registration']['ConfirmEmail'] = '1';
$Configuration['Garden']['Registration']['Method'] = 'Approval';
$Configuration['Garden']['Registration']['InviteExpiration'] = '1 week';
$Configuration['Garden']['Registration']['InviteTarget'] = '';
$Configuration['Garden']['Registration']['InviteRoles'][3] = '0';
$Configuration['Garden']['Registration']['InviteRoles'][4] = '0';
$Configuration['Garden']['Registration']['InviteRoles'][8] = '5';
$Configuration['Garden']['Registration']['InviteRoles'][32] = '-1';
$Configuration['Garden']['Registration']['InviteRoles'][16] = '-1';
$Configuration['Garden']['Email']['SupportName'] = 'Vanilla';
$Configuration['Garden']['Email']['Format'] = 'text';
$Configuration['Garden']['SystemUserID'] = '1';
$Configuration['Garden']['UpdateToken'] = '4344b0dd2f62f145846ab9c6b42f0f696e6082a5';
$Configuration['Garden']['InputFormatter'] = 'rich';
$Configuration['Garden']['Themes']['Visible'] = 'theme-foundation';
$Configuration['Garden']['Version'] = 'Undefined';
$Configuration['Garden']['CanProcessImages'] = true;
$Configuration['Garden']['MobileInputFormatter'] = 'rich';
$Configuration['Garden']['Installed'] = true;
$Configuration['Garden']['RewriteUrls'] = true;
$Configuration['Garden']['Theme'] = 'gtdsimple';
$Configuration['Garden']['MobileTheme'] = 'gtdsimple';
$Configuration['Garden']['ThemeOptions']['Styles']['Key'] = 'Simple';
$Configuration['Garden']['ThemeOptions']['Styles']['Value'] = '%s_simple';
$Configuration['Garden']['ThemeOptions']['Options']['hasHeroBanner'] = false;
$Configuration['Garden']['ThemeOptions']['Options']['hasFeatureSearchbox'] = false;
$Configuration['Garden']['ThemeOptions']['Options']['panelToLeft'] = false;
$Configuration['Garden']['Locale'] = 'zh';
$Configuration['Garden']['HomepageTitle'] = '';
$Configuration['Garden']['Description'] = '';
$Configuration['Garden']['OrgName'] = '';
$Configuration['Garden']['Logo'] = 'http://vanilla.it/uploads/2GXBZK69XOBE/logo.png';
$Configuration['Garden']['MobileLogo'] = '';
$Configuration['Garden']['BannerImage'] = '';
$Configuration['Garden']['FavIcon'] = '';
$Configuration['Garden']['TouchIcon'] = '';
$Configuration['Garden']['ShareImage'] = '';
$Configuration['Garden']['MobileAddressBarColor'] = '#333149';

// Plugins
$Configuration['Plugins']['GettingStarted']['Dashboard'] = '1';
$Configuration['Plugins']['GettingStarted']['Discussion'] = '1';
$Configuration['Plugins']['GettingStarted']['Registration'] = '1';
$Configuration['Plugins']['GettingStarted']['Plugins'] = '1';
$Configuration['Plugins']['GettingStarted']['Profile'] = '1';

// Preferences
$Configuration['Preferences']['Email']['AnswerAccepted'] = 1;
$Configuration['Preferences']['Email']['QuestionAnswered'] = 1;
$Configuration['Preferences']['Popup']['AnswerAccepted'] = 1;
$Configuration['Preferences']['Popup']['QuestionAnswered'] = 1;

// QnA
$Configuration['QnA']['Points']['Enabled'] = false;
$Configuration['QnA']['Points']['Answer'] = 1;
$Configuration['QnA']['Points']['AcceptedAnswer'] = 1;

// Recaptcha
$Configuration['Recaptcha']['PrivateKey'] = '';
$Configuration['Recaptcha']['PublicKey'] = '';

// RecaptchaV3
$Configuration['RecaptchaV3']['PublicKey'] = '';
$Configuration['RecaptchaV3']['PrivateKey'] = '';

// RichEditor
$Configuration['RichEditor']['Quote']['Enable'] = true;

// Routes
$Configuration['Routes']['YXBwbGUtdG91Y2gtaWNvbi5wbmc='] = array (
  0 => 'utility/showtouchicon',
  1 => 'Internal',
);
$Configuration['Routes']['cm9ib3RzLnR4dA=='] = array (
  0 => '/robots',
  1 => 'Internal',
);
$Configuration['Routes']['dXRpbGl0eS9yb2JvdHM='] = array (
  0 => '/robots',
  1 => 'Internal',
);
$Configuration['Routes']['Y29udGFpbmVyLmh0bWw='] = array (
  0 => 'staticcontent/container',
  1 => 'Internal',
);
$Configuration['Routes']['DefaultController'] = array (
  0 => 'discussions',
  1 => 'Internal',
);

// Vanilla
$Configuration['Vanilla']['Discussions']['Layout'] = 'table';
$Configuration['Vanilla']['Categories']['Layout'] = 'modern';
$Configuration['Vanilla']['Password']['SpamCount'] = 2;
$Configuration['Vanilla']['Password']['SpamTime'] = 1;
$Configuration['Vanilla']['Password']['SpamLock'] = 120;
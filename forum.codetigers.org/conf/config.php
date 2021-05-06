<?php if (!defined('APPLICATION')) exit();

// Conversations
$Configuration['Conversations']['Version'] = '3.0';

// Database
$Configuration['Database']['Name'] = 'i6656385_vf1';
$Configuration['Database']['Host'] = 'localhost';
$Configuration['Database']['User'] = 'i6656385_vf1';
$Configuration['Database']['Password'] = 'W.526D5r3tHcvk36ZSA92';

// EnabledApplications
$Configuration['EnabledApplications']['Conversations'] = 'conversations';
$Configuration['EnabledApplications']['Vanilla'] = 'vanilla';

// EnabledPlugins
$Configuration['EnabledPlugins']['recaptcha'] = false;
$Configuration['EnabledPlugins']['GettingStarted'] = 'GettingStarted';
$Configuration['EnabledPlugins']['stubcontent'] = true;
$Configuration['EnabledPlugins']['swagger-ui'] = true;
$Configuration['EnabledPlugins']['Quotes'] = false;
$Configuration['EnabledPlugins']['rich-editor'] = true;
$Configuration['EnabledPlugins']['Facebook'] = true;
$Configuration['EnabledPlugins']['googlesignin'] = true;
$Configuration['EnabledPlugins']['Gravatar'] = true;
$Configuration['EnabledPlugins']['oauth2'] = true;
$Configuration['EnabledPlugins']['Twitter'] = true;
$Configuration['EnabledPlugins']['GooglePlus'] = true;
$Configuration['EnabledPlugins']['IndexPhotos'] = true;
$Configuration['EnabledPlugins']['heroimage'] = true;
$Configuration['EnabledPlugins']['Flagging'] = true;
$Configuration['EnabledPlugins']['emojiextender'] = true;
$Configuration['EnabledPlugins']['AllViewed'] = true;
$Configuration['EnabledPlugins']['editor'] = true;
$Configuration['EnabledPlugins']['VanillaInThisDiscussion'] = true;
$Configuration['EnabledPlugins']['Akismet'] = true;
$Configuration['EnabledPlugins']['StopForumSpam'] = true;
$Configuration['EnabledPlugins']['SplitMerge'] = true;
$Configuration['EnabledPlugins']['VanillaStats'] = true;
$Configuration['EnabledPlugins']['vanillicon'] = true;

// Garden
$Configuration['Garden']['Title'] = 'CodeTigers Forum';
$Configuration['Garden']['Cookie']['Salt'] = 'ioDPCzgeWzpvVF67';
$Configuration['Garden']['Cookie']['Domain'] = '';
$Configuration['Garden']['Registration']['ConfirmEmail'] = false;
$Configuration['Garden']['Registration']['Method'] = 'Basic';
$Configuration['Garden']['Registration']['InviteExpiration'] = '1 week';
$Configuration['Garden']['Registration']['InviteTarget'] = 'https://codetigers.org/forum.codetigers.org/index.php';
$Configuration['Garden']['Registration']['InviteRoles'][3] = '0';
$Configuration['Garden']['Registration']['InviteRoles'][4] = '0';
$Configuration['Garden']['Registration']['InviteRoles'][8] = '0';
$Configuration['Garden']['Registration']['InviteRoles'][16] = '0';
$Configuration['Garden']['Registration']['InviteRoles'][32] = '0';
$Configuration['Garden']['Email']['SupportName'] = 'CodeTigers Forum';
$Configuration['Garden']['Email']['Format'] = 'text';
$Configuration['Garden']['SystemUserID'] = '1';
$Configuration['Garden']['UpdateToken'] = '37e856b550fe2519f320a659854a8aebce77c5a0';
$Configuration['Garden']['InputFormatter'] = 'Rich';
$Configuration['Garden']['Version'] = 'Undefined';
$Configuration['Garden']['CanProcessImages'] = true;
$Configuration['Garden']['MobileInputFormatter'] = 'Rich';
$Configuration['Garden']['Installed'] = true;
$Configuration['Garden']['InstallationID'] = 'E5BF-C86C2C4F-07C1B978';
$Configuration['Garden']['InstallationSecret'] = '801575312d72d4305c2309ea15c62565406c2ef0';
$Configuration['Garden']['HomepageTitle'] = 'CodeTigers Forum';
$Configuration['Garden']['Description'] = '';
$Configuration['Garden']['Logo'] = '7803538afaf470ce5e4fcbbce3d3313d.png';
$Configuration['Garden']['MobileLogo'] = '';
$Configuration['Garden']['FavIcon'] = '';
$Configuration['Garden']['TouchIcon'] = '';
$Configuration['Garden']['ShareImage'] = '';
$Configuration['Garden']['MobileAddressBarColor'] = '';
$Configuration['Garden']['Theme'] = 'keystone';
$Configuration['Garden']['MobileTheme'] = 'keystone';
$Configuration['Garden']['AllowFileUploads'] = true;

// Plugins
$Configuration['Plugins']['GettingStarted']['Dashboard'] = '1';
$Configuration['Plugins']['GettingStarted']['Discussion'] = '1';
$Configuration['Plugins']['GettingStarted']['Profile'] = '1';
$Configuration['Plugins']['GettingStarted']['Plugins'] = '1';
$Configuration['Plugins']['GettingStarted']['Registration'] = '1';
$Configuration['Plugins']['editor']['ForceWysiwyg'] = false;
$Configuration['Plugins']['Akismet']['UserID'] = '8';
$Configuration['Plugins']['StopForumSpam']['UserID'] = '9';
$Configuration['Plugins']['Vanillicon']['Type'] = 'v2';

// Recaptcha
$Configuration['Recaptcha']['PrivateKey'] = '6LdeY_kUAAAAAPh0WcFSfWU2f7PvmKMahND74Uu5';
$Configuration['Recaptcha']['PublicKey'] = '6LdeY_kUAAAAAKrfc4inaQRDczO2FUr8Q48Dcdwv';

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
$Configuration['Routes']['DefaultController'] = 'discussions';

// Vanilla
$Configuration['Vanilla']['Version'] = '3.0';
$Configuration['Vanilla']['Password']['SpamCount'] = 2;
$Configuration['Vanilla']['Password']['SpamTime'] = 1;
$Configuration['Vanilla']['Password']['SpamLock'] = 120;
$Configuration['Vanilla']['AdminCheckboxes']['Use'] = true;

// Last edited by admin (103.242.188.9) 2020-05-19 02:33:28
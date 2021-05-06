<?php return Vanilla\Addon::__set_state(array(
   'info' => 
  array (
    'name' => 'Basic Mobile',
    'description' => 'A simplified theme made to target mobile browsers.',
    'version' => '1.1.4',
    'isMobile' => true,
    'hidden' => false,
    'key' => 'mobile',
    'type' => 'theme',
    'priority' => 1000,
    'authors' => 
    array (
      0 => 
      array (
        'name' => 'Mark O\'Sullivan',
        'email' => 'mark@vanillaforums.com',
        'homepage' => 'http://vanillaforums.com',
      ),
    ),
    'Issues' => 
    array (
    ),
  ),
   'classes' => 
  array (
    'mobilethemehooks' => 
    array (
      0 => 
      array (
        'namespace' => '',
        'className' => 'MobileThemeHooks',
        'path' => '/class.mobilethemehooks.php',
      ),
    ),
  ),
   'subdir' => '/themes/mobile',
   'translations' => 
  array (
  ),
   'special' => 
  array (
    'plugin' => 'MobileThemeHooks',
  ),
));

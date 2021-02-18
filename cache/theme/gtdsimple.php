<?php return Vanilla\Addon::__set_state(array(
   'info' => 
  array (
    'key' => 'gtdsimple',
    'name' => 'gtdsimple',
    'description' => 'A responsive Vanilla theme with customization options.',
    'version' => '2.0.1',
    'hidden' => false,
    'authors' => 
    array (
      0 => 
      array (
        'name' => 'GTD',
        'email' => 'hiro@ecdo.co',
        'homepage' => 'https://gtd.xyz',
      ),
    ),
    'isResponsive' => true,
    'license' => 'GPL-2.0-only',
    'sites' => 
    array (
    ),
    'priority' => 1000,
    'type' => 'theme',
    'build' => 
    array (
      'process' => 'v1',
    ),
    'options' => 
    array (
      'Styles' => 
      array (
        'Default' => '%s_default',
        'Simple' => '%s_simple',
        'Classic' => '%s_classic',
        'Dark' => '%s_dark',
        'Cerulean' => '%s_cerulean',
        'Coral' => '%s_coral',
        'Dusk' => '%s_dusk',
      ),
    ),
    'assets' => 
    array (
      'variables_default' => 
      array (
        'type' => 'json',
        'file' => 'variables_default.json',
      ),
      'variables_simple' => 
      array (
        'type' => 'json',
        'file' => 'variables_simple.json',
      ),
      'variables_classic' => 
      array (
        'type' => 'json',
        'file' => 'variables_classic.json',
      ),
      'variables_coral' => 
      array (
        'type' => 'json',
        'file' => 'variables_coral.json',
      ),
      'variables_dusk' => 
      array (
        'type' => 'json',
        'file' => 'variables_dusk.json',
      ),
      'variables_dark' => 
      array (
        'type' => 'json',
        'file' => 'variables_dark.json',
      ),
      'variables_cerulean' => 
      array (
        'type' => 'json',
        'file' => 'variables_cerulean.json',
      ),
    ),
    'Features' => 
    array (
      'LegacyDataDrivenTheme' => true,
    ),
    'Issues' => 
    array (
    ),
  ),
   'classes' => 
  array (
    'gtdsimplethemehooks' => 
    array (
      0 => 
      array (
        'namespace' => 'Vanilla\\Themes\\Gtdsimple\\',
        'className' => 'GtdsimpleThemeHooks',
        'path' => '/GtdsimpleThemeHooks.php',
      ),
    ),
  ),
   'subdir' => '/addons/themes/gtdsimple',
   'translations' => 
  array (
  ),
   'special' => 
  array (
    'plugin' => 'Vanilla\\Themes\\Gtdsimple\\GtdsimpleThemeHooks',
    'config' => '/settings/configuration.php',
  ),
));

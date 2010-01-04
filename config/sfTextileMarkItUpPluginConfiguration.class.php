<?php
/**
 * @author        Toni Uebernickel <toni@uebernickel.info>
 * @link          http://toni.uebernickel.info/
 *
 * @package       sfTextileMarkItUpPlugin
 * @subpackage    config
 */

/**
 * The configuration of the sfTextileMarkItUpPlugin.
 * Includes all dependencies.
 */
class sfTextileMarkItUpPluginConfiguration extends sfPluginConfiguration
{
  static protected $DEPENDENCIES = array(
    'sfTextilePlugin' => 'textile support',
  );

  /**
   * @see sfPluginConfiguration
   */
  public function initialize()
  {
    $enabledPlugins = $this->configuration->getPlugins();

    foreach (self::$DEPENDENCIES as $pluginName => $whatFor)
    {
      if (!in_array($pluginName, $enabledPlugins))
      {
        throw new sfConfigurationException(sprintf('You must install and enable plugin "%s" which provides %s.', $pluginName, $whatFor));
      }
    }

    /* required for symfony 1.1 compatibility */
    require dirname(__FILE__).'/config.php';
  }
}

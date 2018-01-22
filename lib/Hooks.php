<?php
/**
 * GidiJobs
 * Hooks Library
 *
*
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 * @package    CATS
 * @subpackage Library
 * @copyright  
 * @version    $Id: Hooks.php 3587 2007-11-13 03:55:57Z will $
 */

/**
 *	Hooks Library
 *	@package    CATS
 *	@subpackage Library
 */
class Hooks
{
    /* Prevent this class from being instantiated. */
    private function __construct() {}
    private function __clone() {}


    /**
     * Executes all hooks by name, if any.
     * Hooks are loaded through getModules.
     *
     * @param string hook name
     * @return void
     */
    public static function get($hookName)
    {
        if (!isset($_SESSION['hooks'])) 
        {
            return 'return true;';
        }        
        
        $hooks = @$_SESSION['hooks'];

        $hookCommands = '';

        if (isset($hooks[$hookName]))
        {
            foreach ($hooks[$hookName] as $value)
            {
                $hookCommands .= $value . "\n";
            }
        }

        return $hookCommands . ' return true;';
    }
}

?>

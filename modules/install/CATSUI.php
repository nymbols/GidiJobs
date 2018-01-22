<?php
/*
 * GidiJobs
 * GidiJobs Schema module / install module
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
 * $Id: CATSUI.php 1479 2007-01-17 00:22:21Z will $
 */

include_once('./modules/install/Schema.php');

class CATSUI extends UserInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->_authenticationRequired = false;
        $this->_moduleDirectory = 'install';
        $this->_moduleName = 'install';
        $this->_schema = CATSSchema::get();
    }

    public function handleRequest()
    {
    }
}

?>

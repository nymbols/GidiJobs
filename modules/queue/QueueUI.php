<?php
/*
 * GidiJobs
 * Queue module
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
 * This module builds an XML file containing public job postings. The
 * exported XML data can be used to submit, en masse, all public job
 * postings to job bulletin sites such as Indeed.com.
 *
 *
 * $Id: QueueUI.php 3600 2007-11-13 18:01:57Z andrew $
 */

class QueueUI extends UserInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->_authenticationRequired = true;
        $this->_moduleDirectory = 'queue';
        $this->_moduleName = 'queue';
        $this->_moduleTabText = '';
        $this->_subTabs = array();
    }


    public function handleRequest()
    {
        $action = $this->getAction();
        switch ($action)
        {
            default:
                break;
        }
    }
}

?>

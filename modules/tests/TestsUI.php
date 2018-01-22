<?php
/*
 * GidiJobs
 * Test Framework Module
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
 * $Id: TestsUI.php 3241 2007-10-19 08:38:32Z will $
 */

/* Allow this script to run as long as possible. */
set_time_limit(300);

/* SimpleTest */
error_reporting(E_ALL); /* Simpletest doesn't work with E_STRICT. */
require_once('lib/simpletest/web_tester.php');
require_once('lib/simpletest/unit_tester.php');
require_once('lib/simpletest/reporter.php');
require_once('lib/simpletest/form.php');

/* GidiJobs Test Framework. */
include_once('./modules/tests/CATSTestReporter.php');
include_once('./modules/tests/CATSWebTestCase.php');
include_once('./modules/tests/CATSAJAXTestCase.php');
include_once('./modules/tests/TestCaseList.php');


class TestsUI extends UserInterface
{
    private $_testCaseList;
    private $reporter;


    public function __construct()
    {
        parent::__construct();

        $this->_authenticationRequired = true;
        $this->_moduleName = 'tests';
        $this->_moduleDirectory = 'tests';
        $this->_testCaseList = new TestCaseList();
        
        $microTimeArray = explode(' ', microtime());
        $microTimeStart = $microTimeArray[1] + $microTimeArray[0];
        
        $this->reporter = new CATSTestReporter($microTimeStart);
        $this->reporter->showPasses = true;
        $this->reporter->showFails = true;
    }


    public function handleRequest()
    {
        $action = $this->getAction();
        switch ($action)
        {
            case 'runSelectedTests':
                $this->runSelectedTests();
                break;

            /* Main tests page. */
            case 'selectTests':
            default:
                $this->selectTests();
                break;
        }
    }

    private function selectTests()
    {
        $this->_template->assign('reporter', $this->reporter);
        $this->_template->assign('systemTestCases', $this->_testCaseList->getSystemTests());
        $this->_template->assign('AJAXTestCases', $this->_testCaseList->getAjaxTests());
        $this->_template->display('./modules/tests/Tests.tpl');
    }

    private function runSelectedTests()
    {
        include('./modules/tests/testcases/WebTests.php');
        include('./modules/tests/testcases/AJAXTests.php');

        /* FIXME: 2 groups! Web, AJAX. */
        $testSuite = new TestSuite('CATS Test Suite');

        foreach ($this->_testCaseList->getSystemTests() as $offset => $value)
        {
            if ($this->isChecked($value[0], $_POST))
            {
                $testSuite->add(new $value[0]());
            }
        }
        foreach ($this->_testCaseList->getAjaxTests() as $offset => $value)
        {
            if ($this->isChecked($value[0], $_POST))
            {
                $testSuite->add(new $value[0]());
            }
        }

        $testSuite->run($this->reporter);
    }
}

?>

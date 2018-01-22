<?php
/*
 * GidiJobs
 * Asynchroneous Queue Processor
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
 * $Id: Task.php 3078 2007-09-21 20:25:28Z will $
 */

class Task {
    protected $taskName;
    protected $taskDescription;
    protected $taskID;

    public function setTaskID($id)
    {
        $this->taskID = $id;
    }

    public function setResponse($msg)
    {
        QueueProcessor::setTaskResponse($this->taskID, $msg);
    }

    public function getName()
    {
        return $taskName;
    }

    public function setName($myName)
    {
        return ($this->taskName = $myName);
    }

    public function getDescription()
    {
        return $taskDescription;
    }

    public function setDescription($myDescription)
    {
        return ($this->taskDescription = $myDescription);
    }

    public function getDayOfMonth()
    {
        return intval(date('j'));
    }

    public function getDayOfWeek()
    {
        return intval(date('w'));
    }

    public function getMonth()
    {
        return intval(date('n'));
    }

    public function getYear()
    {
        return intval(date('Y'));
    }

    public function getHour()
    {
        return intval(date('G'));
    }

    public function getMinute()
    {
        return intval(date('i'));
    }
}


?>

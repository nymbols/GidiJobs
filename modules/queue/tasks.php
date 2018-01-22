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
 *
 * Constants for the standalone QueueProcessor and QueueProcessor tasks.
 *
 *
 * $Id: tasks.php 3673 2007-11-21 20:47:47Z andrew $
 */

// Add a new task to the queue processor using the following line as an example.
// Use the modules/queue/tasks/SampleRecurring.php file as a template
// QueueProcessor::registerRecurringTask('SampleRecurring');

/*************** ADD NEW TASKS HERE (scheduling is set inside the task) ****************/

include_once('config.php');

QueueProcessor::registerRecurringTask('CleanExceptions');

?>

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
 * $Id: tasks.php 3558 2007-11-11 22:44:14Z will $
 */

// Add a new task to the queue processor using the following line as an example.
// Use the modules/queue/tasks/SampleRecurring.php file as a template
// QueueProcessor::registerRecurringTask('SampleRecurring');

/*************** ADD NEW TASKS HERE (scheduling is set inside the task) ****************/

QueueProcessor::registerRecurringTask('./modules/calendar/tasks/Reminders.php');

?>

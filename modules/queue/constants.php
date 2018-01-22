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
 * $Id: constants.php 3597 2007-11-13 17:45:42Z andrew $
 */

define('TASKRET_NO_TASKS',              0);
define('TASKRET_SUCCESS',               1);
define('TASKRET_FAILURE',               2);
define('TASKRET_ERROR',                 3);
define('TASKRET_SUCCESS_NOLOG',         4);

define('QUEUE_CLEANUP_HOURS',           1);

define('QUEUE_CLEANUP_FILE',            'cleanup.time');
define('QUEUE_STATUS_FILE',             'queue.time');

define('QUEUE_TASK_DIR', './modules/queue/tasks');
define('QUEUE_EXPIRATION_DAYS', 7);

define('DEFAULT_QUEUE_TIMEOUT_MINUTES', 60);

?>

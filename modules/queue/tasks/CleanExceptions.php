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
 * QueueProcessor Task for automatically submitting web forms using
 * PHP Curl to job bulletin boards like SimplyHired or Indeed.
 *
 *
 * $Id: CleanExceptions.php 3539 2007-11-09 23:03:11Z andrew $
 */

include_once('./modules/queue/lib/Task.php');

// The number of days a logged exception should be saved before it is deleted.
define('EXCEPTIONS_TTL_DAYS', 7);

class CleanExceptions extends Task
{
    public function getSchedule()
    {
        /**
         * Crontab-formatted string for how often to run the recurring task
         * Examples:
         *     "* * * * *":             Every minute
         *     "1,3,5 * * * *":         1st, 2nd and 5th minute of every hour
         *     "* 1 * * *":             1:00am every day
         *     "* * 1 * *":             The 1st of every month
         *
         * Values are as follows: minute, hour, day of month, month, day of week (0 sun -> 6 mon)
         */
        return '* 3 * * *';
    }

    public function run($siteID, $args)
    {
        Task::setName('CleanExceptions');
        Task::setDescription('Clean up the exceptions log.');

        $db = DatabaseConnection::getInstance();

        $sql = sprintf(
            "DELETE FROM
                exceptions
             WHERE
                DATEDIFF(NOW(), exceptions.date) > %s",
            EXCEPTIONS_TTL_DAYS
        );

        if (!($rs = $db->query($sql)))
        {
            $message = 'Query "' . $sql . '" failed!';
            $ret = TASKRET_ERROR;
        }
        else
        {
            $num = $db->getAffectedRows();

            if ($num > 0)
            {
                $message = 'Cleaned up ' . number_format($num, 0) . ' exception logs.';
                $ret = TASKRET_SUCCESS;
            }
            else
            {
                // Do not log if nothing was done
                $message = 'No logs were cleaned.';
                $ret = TASKRET_SUCCESS_NOLOG;
            }
        }

        // Set the response the task wants logged
        $this->setResponse($message);

        // Return one of the above TASKRET_ constants.
        return $ret;
    }
}

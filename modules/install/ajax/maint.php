<?php
/*
 * GidiJobs
 * Installation Maintenance Interface
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
 * $Id: maint.php 3346 2007-10-29 22:40:53Z brian $
 */

if (file_exists('./modules.cache'))
{
    @unlink('./modules.cache');
}

$maintPage = true;

include_once('index.php');

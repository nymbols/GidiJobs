/*
 * GidiJobs
 * Equal Employment Opportunity JavaScript Library
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
 * $Id: eeo.js 2336 2007-04-14 22:01:51Z will $
 */

function checkUnckeckEEOSettings(setting)
{
    document.getElementById('genderTracking').checked = setting;
    document.getElementById('ethnicTracking').checked = setting;
    document.getElementById('veteranTracking').checked = setting;
    document.getElementById('disabilityTracking').checked = setting;
}

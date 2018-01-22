<?php
/*
 * GidiJobs
 * Configuration File
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
 * $Id: config.php 3826 2007-12-10 06:03:18Z will $
 */

/* License key. */
define('LICENSE_KEY','3163GQ-54ISGW-14E4SHD-ES9ICL-X02DTG-GYRSQ6');

/* Database configuration. */
define('DATABASE_USER', 'cats');
define('DATABASE_PASS', 'yourpass');
define('DATABASE_HOST', 'localhost');
define('DATABASE_NAME', 'cats');

/* Resfly.com Resume Import Services ensure this is disabled. */

define('PARSING_ENABLED', false);

/* If you have an SSL compatible server, you can enable SSL for all of GidiJobs. */
define('SSL_ENABLED', false);

/* Text parser settings. Remember to use double backslashes (\) to represent
 * one backslash (\). On Windows, installing in C:\antiword\ is
 * recomended, in which case you should set ANTIWORD_PATH (below) to
 * 'C:\\antiword\\antiword.exe'. Windows Antiword will have problems locating
 * mapping files if you install it anywhere but C:\antiword\.
 */
define('ANTIWORD_PATH', "/usr/bin/antiword");
define('ANTIWORD_MAP', '8859-1.txt');

define('DOCX2TXT_PATH','/usr/local/bin/docx2txt.pl');

/* XPDF / pdftotext settings. Remember to use double backslashes (\) to represent
 * one backslash (\).
 * http://www.foolabs.com/xpdf/
 */
define('PDFTOTEXT_PATH', "/usr/bin/pdftotext");

/* html2text settings. Remember to use double backslashes (\) to represent
 * one backslash (\). 'html2text' can be found at:
 * http://www.mbayer.de/html2text/
 */
define('HTML2TEXT_PATH', "/usr/bin/html2text");

/* UnRTF settings. Remember to use double backslashes (\) to represent
 * one backslash (\). 'unrtf' can be found at:
 * http://www.gnu.org/software/unrtf/unrtf.html
 */
define('UNRTF_PATH', "/usr/bin/unrtf");

/* Temporary directory. Set this to a directory that is writable by the
 * web server. The default should be fine for most systems. Remember to
 * use double backslashes (\) to represent one backslash (\) on Windows.
 */
define('CATS_TEMP_DIR', './temp');

/* If User Details and Login Activity pages in the settings module are
 * unbearably slow, set this to false.
 */
define('ENABLE_HOSTNAME_LOOKUP', false);

/* GidiJobs can optionally use Sphinx to speed up document searching.
 * Install Sphinx and set ENABLE_SPHINX (below) to true to enable Sphinx.
 */
define('ENABLE_SPHINX', true);
define('SPHINX_API', '/var/www/cats/lib/sphinx_latest/sphinxapi.php');
#define('SPHINX_API', '/usr/share/sphinxsearch/api/ruby/spec/fixtures/sphinxapi.php');
#define('SPHINX_API', '/usr/share/sphinxsearch/api/sphinxapi.php');
#define('SPHINX_API', '/var/www/cats/sphinx/etc/sphinxapi.php');
define('SPHINX_HOST', 'localhost');
define('SPHINX_PORT', 9312);
define('SPHINX_INDEX', 'cats catsdelta');

/* Probably no need to edit anything below this line. */


/* Pager settings. These are the number of results per page. */
define('CONTACTS_PER_PAGE',      150);
define('CANDIDATES_PER_PAGE',    150);
define('CLIENTS_PER_PAGE',       150);
define('LOGIN_ENTRIES_PER_PAGE', 150);

/* Maximum number of characters of the owner/recruiter users' last names
 * to show before truncating.
 */
define('LAST_NAME_MAXLEN', 6);

/* Length of resume excerpts displayed in Search Candidates results. */
define('SEARCH_EXCERPT_LENGTH', 256);

/* Number of MRU list items. */
define('MRU_MAX_ITEMS', 5);

/* MRU item length. Truncate the rest */
define('MRU_ITEM_LENGTH', 20);

/* Number of recent search items. */
define('RECENT_SEARCH_MAX_ITEMS', 5);

/* HTML Encoding. */
define('HTML_ENCODING', 'UTF-8');

/* AJAX Encoding. */
define('AJAX_ENCODING', 'UTF-8');

/* Path to modules. */
define('PORTRAIT_PATH', './images/portrait/');

/* Path to modules. */
define('MODULES_PATH', './modules/');

/* Unique session name. The only reason you might want to modify this is
 * for multiple GidiJobs installations on one server. A-Z, 0-9 only! */
define('CATS_SESSION_NAME', 'CATS');

/* Subject line of e-mails sent to candidates via the career portal when they
 * apply for a job order.
 */
define('CAREERS_CANDIDATEAPPLY_SUBJECT', 'Thank You for Your Application');

/* Subject line of e-mails sent to job order owners via the career portal when
 * they apply for a job order.
 */
define('CAREERS_OWNERAPPLY_SUBJECT', 'GidiJobs - A Candidate Has Applied to Your Job Order');

/* Subject line of e-mails sent to candidates when their status changes for a
 * job order.
 */
define('CANDIDATE_STATUSCHANGE_SUBJECT', 'Job Application Status Change');

/* Password request settings.
 *
 * In FORGOT_PASSWORD_FROM, %s is the placeholder for the password.
 */
define('FORGOT_PASSWORD_FROM_NAME', 'GidiJobs');
define('FORGOT_PASSWORD_SUBJECT',   'GidiJobs - Password Retrieval Request');
define('FORGOT_PASSWORD_BODY',      'You recently requested that your GidiJobs: Recruitement Portal password be sent to you. Your current password is %s.');

/* Is this a demo site? */
define('ENABLE_DEMO_MODE', false);

/* Offset to GMT Time. */
define('OFFSET_GMT', 0);

/* Should we enforce only one session per user (excluding demo)? */
define('ENABLE_SINGLE_SESSION', false);

/* Automated testing. This is only useful for the GidiJobs core team at the moment;
 * don't worry about this yet.
 */
define('TESTER_LOGIN',     'john@mycompany.net');
define('TESTER_PASSWORD',  'john99');
define('TESTER_FIRSTNAME', 'John');
define('TESTER_LASTNAME',  'Anderson');
define('TESTER_FULLNAME',  'John Anderson');
define('TESTER_USER_ID',   4);

/* Demo login. */
define('DEMO_LOGIN',     'john@mycompany.net');
define('DEMO_PASSWORD',  'john99');

/* This setting configures the method used to send e-mail from GidiJobs. GidiJobs
 * can send e-mail via SMTP, PHP's built-in mail support, or via Sendmail.
 * 0 is recomended for Windows.
 *
 * 0: Disabled
 * 1: PHP Built-In Mail Support
 * 2: Sendmail
 * 3: SMTP
 */
define('MAIL_MAILER', 1);

/* Sendmail Settings. You don't need to worry about this unless MAIL_MAILER
 * is set to 1.
 */
define('MAIL_SENDMAIL_PATH', "/usr/sbin/sendmail");

/* SMTP Settings. You don't need to worry about this unless MAIL_MAILER is
 * set to 3. If your server requires authentication, set MAIL_SMTP_AUTH to
 * true and configure MAIL_SMTP_USER and MAIL_SMTP_PASS.
 */
define('MAIL_SMTP_HOST', "localhost");
define('MAIL_SMTP_PORT', 25);
define('MAIL_SMTP_AUTH', false);
define('MAIL_SMTP_USER', "user");
define('MAIL_SMTP_PASS', "password");

/* Event reminder E-Mail Template. */
$GLOBALS['eventReminderEmail'] = <<<EOF
%FULLNAME%,

This is a reminder from the GidiJobs Recruitement Portal about an
upcoming event.

'%EVENTNAME%'
Is scheduled to occur %DUETIME%.

Description:
%NOTES%

--
GidiJobs Recruitement Portal
EOF;

/* Enable replication slave mode? This is probably only useful for the GidiJobs
 * core team. If this setting is enabled, no writing to the database will
 * occur, and only ROOT users can login.
 */
define('CATS_SLAVE', false);

/* If enabled, GidiJobs only scans the modules folder once and stores the results
 * in modules.cache.  When enabled, a performance boost is obtained, but
 * any changes to hooks, schemas, or what modules are installed will require
 * modules.cache to be deleted before they take effect.
 */

define('CACHE_MODULES', false);

/* If enabled, the US zipcode database is installed and the user can filter
 * by distance from a zipcode.
 */

define('US_ZIPS_ENABLED', false);

?>

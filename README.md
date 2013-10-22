sb-drush-workflow
=================

Sample drush files for use with Springboard projects.

**INSTALLATION**

1. Make sure you select the correct branch for the version of Drupal you have
2. Copy the drush folder to your sites/all directory
3. Modify as needed
4. Run "drush cache-clear drush" to load the new aliases
5. Use Drush like a pro

You can also copy the contents of the settings directory to your sites/default directory and use the default.local.settings.php to create the relevant local.settings.php file. 

**DATABASE SCRUBBING**

When generating a database dump, you can use the structure tables flag to remove the data. This is the preferred method for getting a database.

 - common : this empties the cache, history, devel, and search tables
 - springboard : this empties the springboard, ubercart, and webform data tables (MINIMAL)
 - common+springboard : this does all of the above (BEST)

drush sql-dump --structure-tables-key=common+springboard --result-file=~/PROJECT-DATE-db.sql --gzip

_note: this will fail if you have tables listed in the array that are not in your database. Just modify it as needed._

**DRUSH ALIASES**

 - drush hist : nicely formatted git history (with fancy branching)
 - drush nc : list of non core modules
 - drush nc-on : list of enabled non core modules
 - drush nc-dis : disable all non core modules
 - drush wipe : clear all caches
 - drush offline : put site in maintenance mode
 - drush online : take site out of maintenance mode
 - drush get-db : grab a CLEAN copy of the DB using the scrubbing above

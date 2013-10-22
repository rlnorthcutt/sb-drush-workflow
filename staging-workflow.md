## Drush Staging Workflow

----

### GOALS
1. **Simple workflow**  
The overriding purpose of this system is to make the workflow as simple and fast as possible to free you up for coding, testing, and committing.
2. **Automatic workflow where possible**  
Use a hosted repo or deploy script for this (git webhooks)
3. **Easy manual control**  
Use a hosted repo or the deploy script for this (git webhooks)

----

### ALIASES / SERVERS
These are the different servers that we have in the mix, along with their aliases. You will need to have your ssh key on the server (ssh-copy-id) before you can use the aliases. Once it is done, though, you will be able to manage the sites without entering a password.

- **prod** : web head 1  
This is the default @prod
- **prod-2** : web head 2  
Rarely used (maybe for drush vra)
- **staging**  
This is our staging site
- **dev**  
This is a sandbox. It can be commandeered for a quick feature-branch dev site. If you are using it this way, change the environment indicator to say which branch you are on. Set it back to “DEVELOP” when you are done.

----

### BRANCHES
- **master**  
This is the production level code. It is staged automatically and is manually pushed to production.
- **[feature-branch] ** 
We will create feature branches as needed, and deploy them to the the dev site as needed. For longer term projects we can spin up a dedicated dev server until its ready to merge into master.

----

### AUTOMATIC DEPLOYMENTS
staging.mainsite.com : (master -> staging)  
dev.mainsite.com : (jrdev / feature branch -> dev sandbox)  

### MANUAL DEPLYMENTS
www.mainsite.com : (master -> prod)

----

### MIGRATION POLICIES (sql-sync & rsync)
We use the policy.drush.inc file to block certain workflows for safety - the updating of the database and the updating of the files.

- prod : no updates  
- staging : restricts to only update from master  
- dev : allows anything  

----

### DB migration workflow
Soon we will automate more of this, but for now, we can use the “sync-db” command to update the db.

- prod : this is the source, and only flows downstream  
  * we use 24 hr caching on the DB backups to reduce strain  
  * later - use jenkins to backup production db  
- others : drush sync-db @prod @self

----

### Building a local dev site in 5 easy steps
The first four steps are only required the first time you create a site. We plan to create some scripts to help with this. The final drush command can be run at any time.  

1. Clone git repo locally (/repos/jr/ifaw)
2. Create vhost and edit hosts file
3. Create blank DB
4. Edit local.settings.php
5. drush sync-site
  - drush sync-db @prod @self
  - drush go-local

----

### Commandeering the dev site
Sometimes you will want to create a feature branch and take over the dev sandbox for testing and QA before its ready for internal staging. You can change the auto-deploy branch for dev and then alter the environment indicator to let others know when its being used.

1. Create feature branch  
2. Change environment name to show branch name  
3. Adjust deployment branch in deployment script or hosted service  
_(Set it back to “SANDBOX” when done)_

----

### Drush Toolkit
Italicized commands are not ready yet, but hopefully will be soon.  

1. Common tools  
  You will probably use these on a weekly basis to update local and staging sites.  
  - drush cc
  - drush sync-site
  - drush go-local (policy file so it can’t run on prod)  
    no caching, all dev modules
  - _drush go-staging (policy file so it can’t run on prod)  
    some caching, variable changes, (keep auth token for staging)_
  - drush sync-files
  - drush sync-db
  - drush get-db (outputs gzipped db to tmp folder)
  - _drush user-clear (user skip-table array)_
  - _drush change env - change environment indicator_  
2. Debugging  
  These are some solid debugging commands you should know about  
  - drush hook [HOOK] - list and lookup hook implementations  
  - drush function [FUNCTION] - look up the code for a specific function  
  - drush vp/vpa - varnish purge a path (or all)  
  - drush dre - disable and re-enable a list of modules  
3. Features  
  - _drush fo (shortcut to filtered by overridden)_
  - drush fu-all
  - drush fra
  - _drush fu-git (example - sync-site, then drush fo to see if anything is overridden, then fu-all, then commit)_
4. Springboard  
  - drush soql-tables (shortcut - soql show tables)
  - drush soql “[QUERY]”
  - _drush sb-clear (empty the sb testing data - use skip-table array)_
  - _drush sb-run (run sb cron)_
  - _drush sb-requeue [ID] (delete object and recreate it)_

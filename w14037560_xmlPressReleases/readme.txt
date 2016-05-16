Created by Bikesh kawan(W14037560)
Website address : http://unn-w14037560.newnumyspace.co.uk/index.php

installation process:

You need to make changes in following files 
1. there is sql  file “xmlPressReleases.sql” in root directory. upload to your database  management like MYSQL

2.Open folder ‘w14037560_xmlPressReleases’ then go to includes folder and open 
dbConfig.php and you will see coding as below and make changes where ever it is required

// Database Constants
defined('DB_SERVER') ? null : define("DB_SERVER", "127.0.0.1”);// change to you own server
defined('DB_USER')   ? null : define("DB_USER", “username”);//change to your database user name
defined('DB_PASS')   ? null : define("DB_PASS", “password”);// change to your database password
defined('DB_NAME')   ? null : define("DB_NAME", “databasename”); // change to your database name

3. if there is a problem with file permission, you might need to change file permission to the files that needed be changed



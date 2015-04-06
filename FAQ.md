- The installer is saying that it does not have write permission... but I made the folders writeable..
  * You will need to recursively set permissions so all contents are also writeable. However, you only need to focus on sqlconnect.inc and settings.xml

- I am trying to create a database, but I get an error.
  * If the database exists already, make sure you have permissions to make tables. If not, you need to have credentials to create a database.

- I keep entering my server IP address for the MySQL server, but I am getting access denied.
  * You need to provide permissions to access the database from an ip address other than localhost. If you are using ASKS on the same machine as MySQL, use 127.0.0.1 as the server IP.

- I try to put a comma or apostrophe into news but when I try and save, it gives me an error.
  * This is a documented [bug #23](https://code.google.com/p/asks/issues/detail?id=23) and will be resolved in a future update.

- I put an additional stylesheet / theme in the folder, but it is not showing up.
  * At this time (v.0.6) you must edit one of the two included stylesheets. In a future version ASKS will let you select from any uploaded stylesheets.
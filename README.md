Arcade ScoreKeeper System v1.0.0

Distributed Under The GNU GPL v3

---


# Installation #

## Pre-Requsites: ##
  * Web server running PHP 5.0 and a MySQL Database

### Obtain ASKS ###
The easiest method for getting ASKS is to download and copy / extract the contents of the ZIP file to a location of your choice within your web root.

If you decide to use GIT and use the latest source tree, you will copy / download those files to a location of your choice within your web root. Be advised that the GIT at times may be unstable. The developers encourage you to only use the downloable archive files for production.

### Setup Procedure ###
  1. After extracting ASKS to your web root, you will need to chmod or change permissions on /images and /includes to be writeable by your webserver.
  1. Obtain MySQL Credentials.
    * If you are providing credentials with the ability to create databases, the ASKS installer will create the entered database if not already present.
    * If you have specific credentails to a database, those credentials must all you to add and drop tables.
  1. Open a web browser and goto /install/install.php in the directory containing the ASKS files. Follow the directions presented carefully, and do not skip any steps.

### Initial Tests Indicate: All Systems Go! ###
If all goes well, the installer will finish successfully. The installer created a default account to login with the the following credentials:

Username: Admin
Password: admin

With these credentials you can login to ASKS, create new admin users and administer notes / announcements etc.

# NOTES #

- This is BETA and is NOT a complete product. There are many issues and features to be worked out.

- There is a CSS Stylesheet located in the includes directory if you would like to change colors, font sizes, etc.

 - There is NO error checking. You can have duplicates upon duplicates and you can also have whitespace. 

- For Now.. if you want to clear high scores, you need to delete the user.

- Any modifications to this program, please, PLEASE send them back to the ASKS authors. We would love to incorporate them.

- Any other questions, please let us know!
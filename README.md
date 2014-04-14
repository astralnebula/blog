blog
====

Simple photoBlog

Just drop it in your public_html.. and...

Step 1: copy application/config/production to 
application/config/development

Step 2: edit config/development/database.default.php, copy to 
database.php, edit config/development/config.php to your needs.

Step 3: copy your-htaccess to .htaccess and your-gitignore to .gitignore

Step 4: There is some commented out SQL queries you should run. This 
makes all the tables and fills in the demo info . They are located in 
database.default.php


Should fly really nice.



To do:
  "read messages" page... right now you have to go into something like phpmyadmin to check your inbox. wont take long.
  "theme options" page... for admin to quickly change colors and style.
  *require authentication for news/create controller
  font sizes, and template parser for writers.
  add a javascript text editor?
  
  
april 14 2014

        .-. .-. .-. .-. .-. .   . . .-. .-. . . .   .-.
        |-| `-.  |  |(  |-| |   |\| |-  |(  | | |   |-|
        ` ' `-'  '  ' ' ` ' `-' ' ` `-' `-' `-' `-' ` '

# Assigment for full-stack internship at Polsource
_________

## What is required to run this project?

First of all, for creating this project I used PHPStrom by JetBrains and for creating and managing the database I used DataGrip also by JetBrains. 

As a web server you can use either Artisan server (PHP build-in development server) or any server you like - I used Apache + XAMPP Control Panel.

1. Artisan server

You need to enter the project directory with cmd and type Artisan command:
> php artisan serve

and then by default HTTP-server will listen to port 8000. 

2. Apache + XAMPP
 
You need to enter the "Run/Debug Configuration" and then create a configuration for "PHP Web Page". In the configuration field, in the section "server", you need to create new server (i.e. XAMPP) and the host should be, for example localhost (port 80). Then "Apply" and "OK". When server is already set, set index.php in "Public" directory as "Start URL". Browser of your choice.  To start the webservice click on "Run [name of your configuration]"

**Project must be located in htdocs in xampp direcotry otherwise this method will not work**

**Configuration process is based on how it looks in PHPStorm**

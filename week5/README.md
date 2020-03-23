1. At first you need to install Composer (https://getcomposer.org/doc/00-intro.md);

2. On webserver in document root directory (e.g.**htdocs**) from project folder (e.g. divi/week1) run command line and type command **composer update**. This create **vendors** folder with all neccesarry classes and dependencies based on **composer.lock** file;

3. Tests can runs from command line when type **vendor\bin\phpunit tests** in project (e.g. divi/week5) folder.
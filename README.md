# simpleMVC
Just simple MVC (written from scratch tounderstanding how MVC works)

FIRST STEP:

Change configuration data in file conf.in.php to meet your test envitoment configuration:


// CHANGE THIS depends of your test configruation
define('APP_NAME', 'Simple MVC');
define('APP_DOMAIN', 'http://localhost');   // CHANGE THIS
define('APP_INNER_DIRECTORY', '/domain.com'); // CHANGE THIS 
define('APP_ROOT', __DIR__);

define('DB_HOST', 'localhost');             // CHANGE THIS
define('DB_NAME', 'advertising');           // CHANGE THIS
define('DB_USER', 'root');                  // CHANGE THIS
define('DB_PASS', '');                      // CHANGE THIS


Start install.php file (this file create database and popualte with test data)

For example my install URL is 
http://localhost/domain.local/install/install.php   

Test data are generated on https://mockaroo.com and saved as csv files:
users.csv 
advertisements.csv

install.php script create databse and tables and populate it with data extracted from CSV.

STEP TWO:

change this line in .htaccess

RewriteBase /domain.com/    

Put your test folder here


MANUAL INSTALLATION:

For manual installaction in folder named  "_sql" you have three SQL files:
advertising_structure.sql - just database structure  
advertising_data.sql - test data
advertising_with_data.sql - database structure and test data

STEP THREE:

Test application. :)

DESCRIPTION:

Root:
.htaccess
conf.inc.php - configuration file
index.php - main file


src folder:

there is locate all application classes

Core folder contains core classes
Controller and Model folders contains controllers and models classes
View foler contains templates organized by subfolder with same name as controller class
Error folder contain just one file error.php for error displaying.

Template class I not wrote, all templates include top and bottom part of html. This is not my favorite way of work, I usualy using XSLT or Twig templates, but regardles task description I not using any framework, templatin system or bootstrap code.

Templates (views) are simple:

<?php include(APP_ROOT.'/src/View/top.php'); ?>

...content...

<?php include(APP_ROOT.'/src/View/bottom.php'); ?>

For better visual presentations data are displayed in DIV based tables.

CORE folder
Db.php - database connection
Request.php - detect class and method form URL (URL pattern is BASEURL/class/method/?parameters)
Util.php - Util metods, just one - bring template by class and method name

CONTROLLER folder
Home.php
Ads.php
Users.php 
Error.php 

MODEL folder
Ads.php
Users.php 





# Web-Programming-2023

We are live at => https://car-dealership-itcars.onrender.com/index.html

Project description:
IT car is a car dealership web application, which allows users to browse through the business' database, which contains currently available and on sale vehicles, as well as vehicles that are soon going to be available. In case the user recognises the car of his/he dreams - his/her IT car, he/she can book a test drive by filling out a simple form, after which he will receive a confirmation email. In order to make the user's car journey even smoother, he/she can decide to search for particular car specifications through our search bar.  We on the other hand, as admins of the system, can do all of the aforementioned as well as delete cars and their car ads, as well as change the ads' status, for example when an available car becomes reserved/goes on sale, or an incoming car becomes available.

Keywords:
+ Web Application
+ DAO CRUD Operations
+ Single Page Application
+ jQuery
+ Car Dealership Web Application


Coding standards:
+ PHP PSR 12 
+ JavaScript Airbnb style
+ HTML 5
+ DB MySQL

The project makes use of 2 design patterns:

+ Factory method, utilised in the creation of DAO, in order to prevent code repetition and inrease operational efficiency, by utilising resources instantiated once and used throughout the entire project. Found in the dao folder.

+ Chain of responsibility, utilised in the frontend -->backend request and parameter forwarding, as a security layer achieved by data validations and routing middleware. Found in routes of type POST and services called by the aforementioned, as well as DAOs.

JUnit tests can be found in the <tests> folder
+ We aimed to test the database connectivity, result sets and constraints, that were put on the business and database logic.
+ #13 tests in total
+ tests are run through the terminal $ ./vendor/bin/phpunit --verbose tests
+ or $ ./vendor/bin/phpunit --verbose tests/PhpFileName.php
+ any method that is tested with the assertCount() and utilises DAO functions who return reset($result), have been while testing modified to return $result only, due to the nature of theirs
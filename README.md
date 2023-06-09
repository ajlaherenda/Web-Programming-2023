# Web-Programming-2023

Deployment link =>

Project description:


Coding standards:
PHP PSR 12 
JavaScript Airbnb style
HTML 5
MySQL DB

The project makes use of 2 design patterns:
+ Factory method, utilised in the creation of DAO, in order to prevent code repetition and inrease operational efficiency, by utilising resources instatiated once and used throughout the entire project. Found in the dao folder.
+ Chain of responsibility, utilised in the frontend->backend request and parameter forwarding, as a security layer achieved by data validations and routing middleware. Found in routes of type POST and services called by the aforementioned, as well as DAOs.
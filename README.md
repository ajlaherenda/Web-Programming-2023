# Web-Programming-2023

In this (Initial) release, support is provided for the below: 
- Routes (GET/POST/DEL) which have been implemented, in particular:
    - rest/api/cars/ endpoint
    - rest/api/cars/@id endpoint, which works with 1, 2..
    - rest/api/cars/availability/@ad_status endpoint "SALE"/"RESERVED"/"INCOMING"
    + several more endpoints related to DB entity deletion and insertion

Available at:

     https://car-dealership-jnny.onrender.com/

+ Working routes:
    + https://car-dealership-jnny.onrender.com/rest/api/cars
    + https://car-dealership-jnny.onrender.com/rest/api/cars/1 or for any ID#
    + https://car-dealership-jnny.onrender.com/rest/api/cars/availability/SALE or instead of sale we can put RESERVED or INCOMING


 + PSR 12 creates a problem => due to namespace
 + sve moguce metode treba ispraviti od ex. add_car() to addCar()
 + implmentirali smo factory method kao design pattern za dao i services, ali jos jedan treba
 

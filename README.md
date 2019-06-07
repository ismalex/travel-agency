# Travel-agency
Travel-Agency is a web app made in PHP with the Laravel Framework; it uses the Amadeus RESTFUL API to get flight information.

## Getting started
It provides an example on consuming the Amadeus API using guzzle, including the generation of the ```Api Key```and the ```Api Secret``` necessary for this implementation. These can be founded on the [Amadeus documentation](https://developers.amadeus.com/quick-start-guide/category?id=77&durl=335&parentId=NaN)

### Prerequisites
* Install and run XAMPP in your computer.
* Install Laravel Framework.

### Installation guide
* Create a new Laravel project.
```
composer create-project --prefer-dist laravel/laravel travel-agency
```
* Go to C:\xampp\htdocs
* Replace the recently created travel-agency folder with the app folder provided. 
* Run the migrations. (in case the migrations don’t work you can use the ```.bd``` file provided on /database)
* Run the application.
```
http://localhost/travel-agency/public
```

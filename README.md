# Travel-agency
Travel-Agency is a web app made in PHP 7 with the Laravel Framework 5.7. It uses the Amadeus RESTFUL API to get flight information.

## Getting started
This project provides an example of consuming the Amadeus API using guzzle, including the generation of the ```Api Key```and the ```Api Secret``` necessary for this implementation. The Api keys can be founded on the [Amadeus documentation](https://developers.amadeus.com/quick-start-guide/category?id=77&durl=335&parentId=NaN).

### Prerequisites
* Install and run [XAMPP](https://www.apachefriends.org/index.html) in your computer.
* Install [Laravel](https://laravel.com/docs/5.8) Framework.

### Installation guide
* Create a new Laravel project.
```
composer create-project --prefer-dist laravel/laravel travel-agency
```
* Go to C:\xampp\htdocs
* Replace the recently created travel-agency folder with the app folder provided. 
* Run the migrations. (in case the migrations don’t work you can use the ```dream_travel_db.sql``` file provided on /database)
* Run the application.
```
http://localhost/travel-agency/public
```
## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

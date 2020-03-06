<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## How to use

RESTful API is run in default HTTP port (80).

Start the server from scratch
```
sudo ./start.sh
```
Enter your admin password, application will be run at http://laravel.test once done 

Sample API
```
GET http://laravel.test/api/wagers?page=1&limit=5
POST laravel.test/api/buy/1?buying_price=10
POST laravel.test/api/wagers?total_wager_value=9999999999.99&odds=1.2&selling_percentage=50&selling_price=99.99
```

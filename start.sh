echo "127.0.0.1 laravel.test" >> /etc/hosts
cp .env.example .env
cp laradock/env-example laradock/.env
cd laradock
docker-compose up -d apache2 mysql
docker-compose exec workspace composer install
until docker-compose exec workspace php artisan migrate; do
  echo Migration failed to run, retrying in 3 seconds...
  sleep 3
done

echo 'Server is running in http://laravel.test'

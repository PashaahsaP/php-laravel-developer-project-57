setup:
	cp -n .env.example .env
	php artisan key:gen --ansi
	composer update

test:
	php artisan test

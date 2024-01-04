setup:
	composer update
	cp -n .env.example .env
	php artisan key:gen --ansi

test:
	php artisan test
lint:
	composer phpcs

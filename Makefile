setup:
	composer update
	cp -n .env.example .env
	php artisan key:gen --ansi
	touch database/database.sqlite
	php artisan migrate
	php artisan db:seed
	npm install
	npm run build

test:
	-php artisan test

lint:
	composer phpcs

	php artisan test

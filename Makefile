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

coverage:
	XDEBUG_MODE=coverage composer exec --verbose phpunit tests -- --coverage-html /home/pavel/Project/php-laravel-developer-project-57/TESTSOME

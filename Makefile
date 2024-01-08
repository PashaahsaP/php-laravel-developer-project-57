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
	echo "Starting tests..."
	php artisan test
	exit 0

lint:
	composer phpcs

	php artisan test

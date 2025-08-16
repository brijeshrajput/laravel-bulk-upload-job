
# Laravel Bulk Upload Job with live progress - Task

## Overview
This project is a Laravel-based web application designed for bulk processing and management of sales records. It provides tools for uploading, processing, and managing large CSV datasets, as well as job batching and queue management for efficient background processing.

## Features
- Bulk upload and processing of sales records (CSV support)
- Job batching and queue management for scalable background tasks
- User authentication and management
- RESTful API endpoints
- Modern frontend with Vite integration
- Modular MVC architecture
- Error handling and logging
- Database migrations and seeders

## Project Structure
```
app/                # Application core (Controllers, Models, Jobs, Utils)
bootstrap/          # Application bootstrapping
config/             # Configuration files
public/             # Public assets and entry point
resources/          # Views, CSS, JS
routes/             # Route definitions (web, api, console)
database/           # Migrations, seeders, factories
storage/            # File and cache storage
vendor/             # Composer dependencies
tests/              # PHPUnit tests
```

## Getting Started
### Prerequisites
- PHP >= 8.0
- Composer
- Node.js & npm
- MySQL or compatible database

### Installation
1. Clone the repository:
	```sh
	git clone https://github.com/brijeshrajput/eSoftware-bulk-job.git
	cd eSoftware-bulk-job
	```
2. Install PHP dependencies:
	```sh
	composer install
	```
3. Install Node.js dependencies:
	```sh
	npm install
	```
4. Copy `.env.example` to `.env` and configure your environment variables:
	```sh
	cp .env.example .env
	```
5. Generate application key:
	```sh
	php artisan key:generate
	```
6. Run database migrations and seeders:
	```sh
	php artisan migrate --seed
	```
7. Build frontend assets:
	```sh
	npm run build
	```
8. Start the development server:
	```sh
	php artisan serve
	```

## Usage
- Access the application at `http://localhost:8000`
- Upload sales CSV files via the web interface
- Monitor job progress and logs
- Use API endpoints for programmatic access

## Key Files & Directories
- `app/Models/Sales.php` - Sales model
- `app/Jobs/SalesUploadProcess.php` - Job for processing sales uploads
- `app/Http/Controllers/` - Application controllers
- `resources/views/` - Blade templates
- `routes/web.php` - Web routes
- `routes/api.php` - API routes
- `public/assets/csv 50k Sales Records.csv` - Sample CSV file

## Testing
Run PHPUnit tests:
```sh
php artisan test
```

## Contributing
1. Fork the repository
2. Create your feature branch (`git checkout -b feature/YourFeature`)
3. Commit your changes (`git commit -am 'Add new feature'`)
4. Push to the branch (`git push origin feature/YourFeature`)
5. Create a new Pull Request

## License
This project is licensed under the MIT License.

## Author
- Brijesh Rajput

## Support
For issues, please open a ticket on the [GitHub Issues](https://github.com/brijeshrajput/eSoftware-bulk-job/issues) page.

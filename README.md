# Laravel Blog Service

This is a Laravel back-end service for a simple blog. It provides API endpoints for managing users, posts, videos, and comments.

## Requirements

- PHP 7.4 or higher
- Composer
- Docker (optional, for running the app using Laravel Sail)
- MySQL or compatible database server

## Installation

1. Clone the repository:
```bash
git clone <https://github.com/navidman/diginext_blog.git>
```
2. Install the dependencies:
```bash
composer install
```
3. Configure the environment variables:
```bash
cp .env.example .env
```
Update the `.env` file with your database credentials and other necessary configurations.
4. Run the database migrations:
```bash
php artisan migrate
```
5. (Optional) If you're running the app using Docker with Laravel Sail, start the Docker containers:
```bash
./vendor/bin/sail up
```
The app will be accessible at http://localhost.

## API Endpoints

The following API endpoints are available:

- `/api/users`: CRUD operations for users
- `/api/posts`: CRUD operations for posts
- `/api/videos`: CRUD operations for videos
- `/api/posts/{id}/comments`: CRUD operations for comments on a post

Please refer to the API documentation for detailed information on each endpoint.

## Bonus Points

- Dockerizing the project: The app can be run using Laravel Sail, which provides a pre-configured Docker environment for Laravel development.
- Polymorphic relation: The `comments` table uses a polymorphic relation to allow comments on both posts and videos.
- Middleware: The `LogRequests` middleware logs incoming requests and outgoing responses for debugging and auditing purposes.

## Explanation and Motivation

I chose to implement this project because it aligns well with my skills and experience as a backend developer. I have a strong background in Laravel and have worked on various web applications involving user management, content creation, and interaction. This project allowed me to demonstrate my knowledge of Laravel's features, including database migrations, API development, and Docker usage.

By completing the bonus points, I aimed to showcase my ability to go beyond the basic requirements and add valuable features to the project. Dockerizing the application provides an easy and consistent way to set up the development environment. The use of polymorphic relations enables flexibility in handling comments on different types of content. The logging middleware helps with debugging and monitoring the application.

Overall, I believe this project reflects my technical skills, attention to detail, and ability to deliver high-quality code. I'm excited to share this project with you and discuss further how my skills can contribute to your team.

Feel free to reach out to me at navidmansourishsh@gmail.com for any further questions or clarifications.

Thank you for considering my application!

# API Authentication and Authorization with Role-Based Permissions

This project implements an API authentication and authorization system in Laravel for a web application. The system ensures secure access to API endpoints and controls user permissions based on their roles.

## Prerequisites

- PHP 7.4 or higher
- Composer
- MySQL or any supported database

## Installation

1. Clone the repository:

```bash
git clone https://github.com/waqasmehmud/ubiquitous-carnival.git
cd ubiquitous-carnival
```

2. Install project dependencies:

```bash 
composer install
```

3. Set up your environment variables:

Rename the .env.example file to .env and update the following environment variables:

APP_NAME: The name of your application

APP_URL: The URL of your application

DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD: Database connection details

MAIL_MAILER, MAIL_HOST, MAIL_PORT, MAIL_USERNAME, MAIL_PASSWORD, MAIL_ENCRYPTION, and MAIL_FROM_ADDRESS: Email configuration (for user deletion notification)

4. Generate the application key:

```bash
php artisan key:generate
```
5. Run the database migrations:

```bash
php artisan migrate
```
6. Seed the roles table:
```bash
php artisan db:seed --class=RoleSeeder
```
This will populate the roles table with the predefined roles: 'admin', 'manager', and 'regular'.

7. Seed the users table:
```bash
php artisan db:seed --class=UserSeeder
```

8. Run the Scheduler:
```bash
php artisan schedule:work
```

Finally Serve 
```bash
php artisan serve
```
# Usage
## User Roles and Permissions
Three user roles are defined: admin, manager, and regular user.
Roles are populated in the roles table during setup.
The users table contains the necessary columns for role-related information.
API Endpoints
The following API endpoints are implemented:
# Auth

curl -X POST -d 'email=your@email.com&password=yourpassword' http://localhost:8000/api/login

curl -X GET -H "Authorization: Bearer your-api-token" http://localhost:8000/api/users


# User Listing:

Endpoint: GET /api/users
Required role: admin or manager
Description: Retrieve a list of all users along with their relevant information.

# User Update:

Endpoint: PUT /api/users/{id}
Required role: admin (to update any user), manager (to update regular users), regular (to update their own profile)
Description: Update user information.

# User Deletion:

Endpoint: DELETE /api/users/{id}
Required role: admin (to delete any user), manager (to delete regular users), regular (no permission to delete)
Description: Delete user accounts.


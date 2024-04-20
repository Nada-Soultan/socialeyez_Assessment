# socialeyez_laravel_Assessment
Description :This is a simple task management application built with Laravel. It allows users to create, edit, and delete tasks, as well as mark tasks as completed.
# Installation
To set up the project locally, follow these steps:

- Clone the repository " git clone -b master https://github.com/yourusername/project-name.git](https://github.com/Nada-Soultan/socialeyez_Assessment.git "
- Install dependencies:
cd project-name
composer install
- Set up the environment configuration:
Copy the .env.example file to .env.
Update the database configuration in the .env file with your database credentials
- Generate the application key:
php artisan key:generate
- Migrate the database:
# Usage
- To run the project locally, use the following command:
 "php artisan serve"
- Access the project in your web browser at http://localhost:8000.
# Additional Notes
- This project uses Laravel framework version 10.x.
- i made a app/helpers.php file to handle error and success message for CRUD operations and also interval to determind the time .
-  Blade files for the frontend interface are based on a template to enhance the appearance and user experience.
-  Paginator Modification: Pagination for tasks has been implemented using Laravel's paginator. Additionally, modifications to the paginator configuration have been made in the AppServiceProvider to ensure proper handling of pagination requests.
-  Search Bar: A search functionality by task title has been implemented to allow users to search for specific tasks based on their titles. 


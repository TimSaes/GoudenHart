## About GoudenHart

GoudenHart was a practise exam for my study as a Software Developer.
The application has 2 CRUD's (Create, Read, Update, Delete)
These 2 CRUD's are connected with each other through a One-To-Many Relationship

There are 2 tables. Patients & Recipes.
A patient can have multiple recipes, while a recipe belongs to one patient.

When a patient is deleted, so are the corresponding recipes.
It is possible to create a recipe simultaniously while creating a new patient.

## How to setup the app
- Create a .env file with the .env-example file data and edit the database settings to match your system/method.
  
- Install/update composer and npm packages
```bash
composer install
composer update

npm install
npm update
```

- Migrate and Seed your local database
```bash
php artisan migrate:fresh --seed
```

- Start the application:
```bash
php artisan serve
# and
npm run dev
```
Open http://localhost:8000 in your browser to see the result.

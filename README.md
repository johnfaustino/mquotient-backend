
# Mquotient-admin (cPanel)

This guide provides steps to deploy mquotient-admin to a hosting environment using **cPanel**.

## Prerequisites

Before deploying, ensure you have the following:

- **Laravel application** set up and running locally.
- Access to a **cPanel** hosting environment.
- **Database credentials** (MySQL or other).
- Database is created in the hosting environment.


## Setup
Professional Service is built on the Laravel PHP framework. This makes installation very simple. 
1. Clone this repository onto your server. 
2. Copy the .env.{local} to .env. 
3. Ensure that the APP_URL in .env matches the address of your Project server. 
4. Configure outgoing mail from your Project server. For more details on the mail drivers supported, please refer to the Laravel documentation. Fill out any appropriate connection details in your .env file. 
5. Create a new database. For more details on the databases supported, please refer to the Laravel documentation. Fill out any appropriate connection details in your .env file. 
6. Install dependecies by running composer install --no-interaction --prefer-dist -o and then also run npm install. 
7. Generate a new APP_KEY in your .env by running php artisan key:generate in the terminal. 
8. Run php artisan migrate --seed to prepare your database. 

Note: 
-This admin panel is a work in progress and is just used for email functions. It also stores information that the user filled in the Career Application, Demo Requests and Contact Us

---

### Deploying using cPanel File Manager

1. **Log in to cPanel**.
2. Navigate to **File Manager** under the `Files` section.
3. Open the `public_html` folder (or your custom domain folder).
4. **Zip your Laravel project folder** on your local machine (excluding `vendor` and `node_modules` folders), then upload the zipped file using the **Upload** option in File Manager.
5. Once uploaded, **Extract** the zip file into the `public_html` folder.

## Importing the database (Manual method)

1. Login to your database management application from your local system
2. Export the Database, the .sql file will be downloaded in your local machine
3. Create the Database in your hosting
5. Import the exported .sql file

## Ensure .env is updated accordingly based on the Database details

In cPanel File Manager, open the .env file and update the necessary environment variables, especially for the database:

DB_HOST=localhost
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password



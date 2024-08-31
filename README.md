# Laravel Project with Tailwind CSS

## Installation
1. **Clone the Repository** </br>
git clone https://github.com/IamRimuruTempest/laravel-crud-users.git </br>
cd your-repository

2. **Install PHP Dependencies** </br>
Make sure you have Composer installed. Then run: </br>
composer install

3. **Install NPM Dependencies**  </br>
Make sure you have Node.js and npm installed. Then run: </br>
npm install

4. **Environment Configuration**  </br>
Copy the .env.example file to .env and configure your environment variables </br>
cp .env.example .env </br>
Set up your database and other configuration options in the .env file.

5. **Generate Application Key**  </br>
php artisan key:generate

6. **Run Migrations**  </br>
php artisan migrate

7. **Seed the Database**  </br>
Run the following command to seed the database with initial data: </br>
php artisan db:seed --class=UserSeeder

8. **Build Assets**  </br>
Compile your CSS and JS files using: </br>
npm run dev 

9. **Build Assets**  </br>
php artisan serve




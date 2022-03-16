
## Project Overview 🎉
About the blog.

It is a project in which the logged in user can perform basic operations on the blog content.
A user account can only be created by an administrator, each user is assigned a role with specific permissions.



## Tech/framework used 🔧

| Tech                                                    | Description                              |
| ------------------------------------------------------- | ---------------------------------------- |
| [PHP](https://www.php.net/docs.php)                           | version 7.4   |
| [Laravel](https://laravel.com/docs/8.x/readme)                           | version 8.x   |
| [Vue](https://vuejs.org/guide/introduction.html)                           | version 3.x   |
| [Bootstrap](https://getbootstrap.com/docs/5.0/getting-started/introduction/)                           | version 5.0   |
| [Pusher](X)                           | version 5.0   |
| [Spatie Permission ](https://spatie.be/docs/laravel-permission/v5/introduction)                           | version 5.4   |
| [Yajra datatables](https://datatables.yajrabox.com/starter)                           | version 1.5   |
| [Intervention-Images](https://image.intervention.io/v2)                           | version 2.7   |
| [Sweet-Alert](https://github.com/realrashid/sweet-alert)                           | version 4.1   |
| [CKE Editor](https://ckeditor.com/docs/ckeditor5/latest/builds/guides/integration/installation.html)                           | version 5.0   |


## Screenshots 📺

<p align="center">

![asd2](https://user-images.githubusercontent.com/82052456/157722173-6c2e54df-7039-47c5-82fa-62380fc64d9e.PNG)
</p>

<p align="center">


![asd](https://user-images.githubusercontent.com/82052456/157722359-e7df87ae-599a-4d00-9098-bd9b9434212a.PNG)

</p>


## Installation 💾
Clone the repository

    git clone https://github.com/Peoloper/blog.git

Switch to the repo folder

    cd blog

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Run the database migrations

    php artisan migrate

Run the database seeder

    php artisan db:seed

Run to generate a secret key

    php artisan key:generate

Start the local development server

    php artisan serve


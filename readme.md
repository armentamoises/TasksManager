## Tasks Manager


Tasks Manager is a web app that manages the tasks that the IT Department develops.

Users from other departments and users from the IT Department can request a task, this task will have the following process:

1. The task is created with a 'Request' status. The request cosists in:
	1. Task name.
	2. Task description.
	3. Task project.
	4. Task priority.
2. The requestor can edit the task or delete it if they change their mind, when the requestor sends the request to be approved, the task will have the 'Sent' status.
3. The lead project in the IT Department can 'Approve' the task or 'Reject' it.
4. Once the task is approved, the IT Chied can 'Authorize' the task or 'Reject' it.
5. If the task is authorized, the lead project should 'Assign' a developer, a supervisor  and a due date for the task.
6. When the task is completed the developer can change the task status to 'Completed'.

After the requestor sends their request a Trello Card is created in a Tasks Board whith lists for every status, everytime the task changes its status the card will move into the right list until it is completed, in the same way it will be deleted if the task is rejected.

The different actions to change the task status are regulated with specific role permissions for this module, besides the role permissions to access the different modules in the system. 

The system administrator can manage the tasks types.

Every user can review the task in a PDF report.

-----------------------------------------------

## Instructions

1. `composer install`
2. Set your own `.env` file based on the `.env.example` provided
	1. `php artisan key:generate` to set the `APP_KEY` in the `.env` file
	2. Set Database credentials (`DB_DATABASE`, `DB_USERNAME`, & `DB_PASSWORD`)
	3. Set  `TRELLO` credentials and lists values
	4. Set  `MAIL` values
3. `php artisan migrate`
4. `php artisan db:seed`




-----------------------------------------------



## About this app

I've coded this app to show it as part of my Developer Portfolio.
This app was made with PHP Frameworl Laravel 5.2

These are some of the features in this app:

* MVC
* User’s authentication (login, logout, set password, reset password, verify user, etc)
* User’s roles (access to modules and permissions)
* Error handling 
* Environment variables
* Migrations
* Seeders
* Namespaces
* Languages managing
* Trello API
* Responsive views



![alt tag](https://dl.dropboxusercontent.com/u/32348300/ScreenShots/tasksmanaager.png)

These are some of the assests i've used to buid this app:

* [Bootstrap](http://getbootstrap.com/)
* [JQuery](https://jquery.com/)
* [Trello](https://trello.com/)
* [JQuery Validation](https://jqueryvalidation.org/)
* [Datatables](https://www.datatables.net/)
* [SB Admin 2 Template](https://startbootstrap.com/template-overviews/sb-admin-2/)
* [Bootstrap-Fileupload](https://github.com/jasny/bootstrap-fileinput-exif/blob/master/bootstrap-fileupload.js)
* [Bootstrap-DatePicker](http://www.eyecon.ro/bootstrap-datepicker/)
* [Font Awsome](http://fontawesome.io/)

Composer dependencies

* [FPDF](http://www.fpdf.org/)
* [Guzzle in order to use MailGun Service](https://www.mailgun.com/)
* [Laravel 5.2](https://laravel.com/)

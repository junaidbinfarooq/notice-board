# Notice board

## Installation

First clone this repository, install the dependencies, and setup your .env file.

```
git clone https://github.com/junaidbinfarooq/notice-board.git
cd notice-board
composer install
cp .env.example .env
```

## Database and migrations
Now create the necessary database. The following was tested on MySQL.

```
create database notice_board;
```

And run the initial migrations and seeders.

```
php artisan migrate --seed
```

## Application key.
Generate an API key for the application.

```
php artisan key:generate
```

## Mailer config.
Enter mailer configuration in the .env file. This is used to send emails to an admin when a new story is published.
Mailtrap was used during the development. Please choose your own mailer. Following config options are mandatory:

*MAIL_MAILER
MAIL_HOST
MAIL_PORT
MAIL_USERNAME
MAIL_PASSWORD
MAIL_FROM_ADDRESS*

## Running the server.
Finally , run the server.

`php artisan serve`

## Queued jobs.
The emails are initially queued and then picked up by a queue worker. To run the queue worker, run the following command.

```
php artisan queue:work
```

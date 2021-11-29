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

* MAIL_MAILER: mail|sendmail|smtp
* MAIL_HOST: eg., mailtrap.io|smtp.gmail.com
* MAIL_PORT: eg., 2525|587
* MAIL_USERNAME: Your username
* MAIL_PASSWORD: Your password
* MAIL_FROM_ADDRESS: Your email address that will be used as the sender address

## Running the server.
Finally , run the server.

`php artisan serve`

## Queued jobs.
The emails are initially queued and then picked up by a queue worker. To run the queue worker, run the following command.

```
php artisan queue:work
```

## Server-sent events.
When a new story is published and subsequently approved by an admin, an event is broadcasted to all the users informing them about the event.
The app uses pusher for this purpose while you could use any other broadcasting library.
Please update the following environment variables in the .env file to make use of pusher:
* BROADCAST_DRIVER: Set this to pusher
* PUSHER_APP_ID: Your pusher app id
* PUSHER_APP_KEY: Your pusher app key
* PUSHER_APP_SECRET: Your pusher app secret
* PUSHER_APP_CLUSTER: Your pusher app cluster

You would also need to install the pusher library.

`composer require pusher/pusher-php-server`

On the front-end, you can either use inline scripts or use laravel echo and pusher libraries to listen to server-sent events.
Run the following commands to install those libraries and then head to the laravel [documentation](https://laravel.com/docs/8.x/broadcasting#client-side-installation) to learn how to use them.

`npm install --save-dev laravel-echo pusher-js`

More information about the pusher library can be found [here](https://pusher.com/docs/).

Moreover, the queue works needs to be up and running to process the events as they are queued.

## Login.
The seeder adds a default admin user. You can login using the following credentials.
### Username: admin@example.net
### Password: password

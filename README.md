# Notice board

## Installation

First clone this repository, install the dependencies, and setup your .env file.

```
git clone https://github.com/junaidbinfarooq/notice-board.git
composer install
cp .env.example .env
```

Then create the necessary database.

```
create database notice_board
```

And run the initial migrations and seeders.

```
php artisan migrate --seed
```

Enter mailer configuration in the .env file.
Mailtrap was used during the development. Please choose your own mailer.

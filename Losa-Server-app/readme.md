<p align="center"><img src="https://raw.githubusercontent.com/buildawow/Losa-Mobile-Server-app/master/public/assets/images/buildawow.png?token=AHT5OAXD7WGMZ2H7AXMNNRS45AHDC"></p>

# Losa app

its a Laravel app to handle requests to serve data to a Flutter Mobile app.

## Installation

Use Github to clone the repo 

```bash
git clone https://github.com/buildawow/Losa-Mobile-Server-app.git losa
```

Use the package manager [Composer](https://pip.pypa.io/en/stable/) to install all server app dependecies.

## Usage

```php
composer install
```

Create an .env file from example.env file

```bash
cp .example.env .env
```

Edit .env file with correct data from enviroment and api key.

```bash
nano .env
```
##Add one calendar id to .env file:

```env
GOOGLE_CALENDAR_ID=some_id_from_google_calendar
```

##Create a key for the project:

```php
php artisan key:generate
```

##Create  symbolic link from public folder to storage:

```php
php artisan storage:link
```
## Add service account credentials to storage:
  - Create the file and paste the API key from google console
  - If you dont hace one need to create one [API credentials](https://console.cloud.google.com/apis/credentials?hl=es-419&project=quickstart-1555087144584)

```php
cd storage/app
mkdir google-calendar
cd google-calendar
touch service-account-credentials.json
nano service-account-credentials.json
```

  - Then just paste the credentials in json file and thats all
  
  - Add APP_ID and APP_URL WITH CURRENT ADDRESS
  
```bash
  APP_IP=http://losa.test //YOUR ADDRESS http://192.168.0.10 EXAMPLE
  APP_IP=http://losa.test //YOUR ADDRESS http://192.168.0.10 EXAMPLE
```
 ## Configure Mail

  - Change env file in Mail config

```bash
    MAIL_DRIVER=smtp
    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=465
    MAIL_USERNAME=yourmailwithoutcommas@gmail.com
    MAIL_PASSWORD=yourpasswordwithoutcommas
    MAIL_ENCRYPTION=ssl
    MAIL_FROM_ADDRESS=mail_of_the_app_in_mail_subject
    MAIL_FROM_NAME=name_of_the_app_in_mail_subject
```

  ## MIGRATE THE APP

```php
php artisan migrate:fresh --seed
```

  ## TO ADD MORE PROPERTIES
  
  just add a new property in web admin dashboard and be sure to share the calendar and paste the calendar Id in the add property form.
  (as here)[https://github.com/extrabacon/google-oauth-jwt/issues/8#issuecomment-40858290]

## Contributing

Pull requests need to be disscuss with organization. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

```bash
vendor\bin\phpunit
```

## License
This software is [PRIVATE]
no permission from the creators of the software to use, modify, or share the software. Although a code host such as GitHub may allow you to view and fork the code, this does not imply that you are permitted to use, modify, or share the software for any purpose.

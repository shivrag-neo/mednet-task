
## Installation

### Step 1
You can install the package via git:

```shell
git clone https://github.com/shivragshukla/laravel-vue.git
```

#### Package install

Run the command : 

- The Laravel package will automatically register itself, so you can start using it immediately.

```shell
composer install
```

- The npm package will automatically register itself, so you can start using it immediately.

```shell
npm install
```

#### Key generate

Run the command : 

- The Laravel key generate immediately.

```shell
php artisan key:generate
```

### Step 2 - SetUp database

- Open .env file set DB_DATABASE, DB_USERNAME, DB_PASSWORD and add MIX_APP_URL="${APP_URL}"
- Run the command : 

```shell
composer dump-autoload
```

```shell
php artisan migrate:refresh --seed
```

-The jwt token package will automatically register itself, so you can start using it immediately.

```shell
php artisan jwt:secret
```

## Usage

- Run the command on 1st shell: 

```shell
php artisan serve
```

- Run the command on 2nd shell: 

```shell
npm run watch
```

#### Username & password

- Username : admin@gmail.com
- Password : 123456


## Screenshot

#### Login
![login](https://user-images.githubusercontent.com/30346330/94990107-3c9c2a00-0597-11eb-9c6d-5aae7bad2ba4.png)

#### Registration
![registration](https://user-images.githubusercontent.com/30346330/94990113-4a51af80-0597-11eb-9823-9bbf30b9087d.png)

#### Dashboard
![dashboard](https://user-images.githubusercontent.com/30346330/94990115-4cb40980-0597-11eb-8363-9a54353c3adc.png)

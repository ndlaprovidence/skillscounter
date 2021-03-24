**Logo not already created**

## Description

Skillscounter is a helpful education software who describe evaluation's notation, a PHP application developed by students using Symfony framework (version 5) and Ecole Directe API.

Thanks to [Symfony](https://symfony.com/) and [Ecole Directe](https://www.ecoledirecte.com/)

## Screenshot of an evaluation

![Skillscounter running][image_ref_jxjra3r9]
*non-contractual image* 

### Installation

#### 1) Get all sources files

```dos
git clone https://github.com/ndlaprovidence/skillscounter  
cd Skillscounter
composer install
```


#### 2) Create database

In the commands below, replace **aSecurePassword** with a secure password.

Here are the steps to create the database, either with MySQL or with PostreSQL.

##### Either with MySQL

**Enter this commands in a terminal prompt**:
```sql
sudo mysql
CREATE USER 'skillscounter'@'localhost' IDENTIFIED BY 'aSecurePassword';
CREATE DATABASE skillscounter CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
GRANT ALL PRIVILEGES ON skillscounter.* TO 'skillscounter'@'localhost';
```
**Update config/packages/doctrine.yaml**:
```yaml
doctrine:
    dbal:
        # configure these for your MySQL database server
        driver: 'pdo_mysql'
        server_version: '5.7'
        charset: utf8mb4
        default_table_options:
            charset: utf8mb4
            collate: utf8mb4_unicode_ci

        # configure these for your PostgreSQL database server
        # driver: 'pdo_pgsql'
        # charset: utf8
```
**Uncomment and update the password in this line of .env file**: 
```text
DATABASE_URL=mysql://skillscounter:aSecurePassword@127.0.0.1:3306/skillscounter
```
**Enter this commands in a terminal prompt**:
```yaml
# cd skillscounter
php bin/console doctrine:migrations:latest
```
**If an error occurred "could not find driver", enter this command in a terminal prompt (and re-enter the command above)**:
```dos
sudo apt install php-mysql
```
##### Or with PostgresSQL

**Enter this commands in a terminal prompt**:

```sql
sudo -i -u postgres
createuser --interactive
skillscounter
# -> yes
psql
ALTER USER skillscounter WITH password 'aSecurePassword';
ALTER USER skillscounter SET search_path = public;
\q
exit
```
**Update config/packages/doctrine.yaml**:

```yaml
doctrine:
    dbal:
        # configure these for your MySQL database server
        # driver: 'pdo_mysql'
        # server_version: '5.7'
        # charset: utf8mb4
        # default_table_options:
        #     charset: utf8mb4
        #     collate: utf8mb4_unicode_ci

        # configure these for your PostgreSQL database server
        driver: 'pdo_pgsql'
        charset: utf8
```
**Uncomment and update the password in this line of .env file**:
```text
DATABASE_URL=pgsql://skillscounter:aSecurePassword@127.0.0.1:5432/skillscounter?charset=UTF-8
```
**Enter this commands in a terminal prompt**:
```yaml
# cd joliquiz
php bin/console doctrine:database:create
```
**If an error occurred "could not find driver", enter this command in a terminal prompt (and re-enter the command above)**:

```dos
sudo apt install php-pgsql
```
## 3) Fill database and start built-in server
**Enter this commands in a terminal prompt**:

```yaml
# cd joliquiz
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
php bin/console server:start
```
## 4) With your web browser open url where server is listening on

For example, with your browser open this page: http://127.0.0.1:8000 and GO!

**Main page not created yet**

Now, you can connect on the app with your Ecole Directe's username and password

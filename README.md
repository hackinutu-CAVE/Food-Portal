# Food-Portal

## About
The goal of this project is to create an excessive food listing portal for avoiding food wastage.

People can list the availability of excessive food on the website.

Needed people or organizations can log into the website to get the food for old age homes, orphanages or needy ones

This project was made for [hackinUTU](https://www.hackinutu.com/) hackathon.

## Getting Started

### Prerequisites
* Docker (Installation steps - [Windows](https://docs.docker.com/docker-for-windows/install/), [Ubuntu](https://docs.docker.com/engine/install/ubuntu/))
* Docker-compose ([Installation steps](https://docs.docker.com/compose/install/))

### Installing

Get the project up and running locally in just 3 easy steps.

1. **Clone** the repo with HTTPS, using your local terminal to a preferred location, and **cd** into the project.

```bash
git clone https://github.com/hackinutu-CAVE/Food-Portal.git
```
```
cd Food-Portal
```

2. Run docker-compose
```
docker-compose up -d
```

Website Home page will be at localhost:8080

phpMyAdmin page will be at localhost:5000


3. Visit phpMyAdmin page and create database named 'food-portal'

4. If you are accessing the database through mysql command line interface then use the command :
```
mysql -h 127.0.0.1 -P 3406 -u root -p
```
   and then enter the password 
   
5. Create table markers for donor's details :
```
CREATE TABLE markers (
  mid INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  food_name VARCHAR( 30 ) NOT NULL ,
  donor_name VARCHAR( 50 ) NOT NULL ,
  address VARCHAR( 80 ) NOT NULL ,
  lat FLOAT( 10, 6 ) NOT NULL ,
  lng FLOAT( 10, 6 ) NOT NULL
)

ALTER TABLE `markers` ADD `donor_email` VARCHAR(50) NOT NULL AFTER `donor_name`,
   ADD `date` VARCHAR(20) NOT NULL AFTER `address`,
   ADD `time` VARCHAR(10) NOT NULL AFTER `date`,
   ADD `food_expiry_date` VARCHAR(20) NOT NULL AFTER `time`,
   ADD `food_expiry_time` VARCHAR(10) NOT NULL AFTER `food_expiry_date`,

CREATE TABLE contact(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(20) NOT NULL,
    message VARCHAR(300) NOT NULL
)
```

That's it.

## To solve blank screen error:
```
docker exec -it foodportal bash
```
```
php composer install
```
Exit container using Ctrl + D
```
docker-compose up -d --build
```


## Built With

* [php:7.4.3-apache](https://hub.docker.com/layers/php/library/php/7.4.3-apache/images/sha256-604c8dd36d734deb93193d79daa09ae0bd3ca05ea51deb909ffb218e34fa5cd5?context=explore) - This image contains Debian's Apache httpd in conjunction with PHP (as mod_php) and uses mpm_prefork by default

* [mysql:8.0.19](https://hub.docker.com/layers/mysql/library/mysql/8.0.19/images/sha256-09de7b17af0c17d397e6b69ff841756b80074aed00c1e91d7bc0f3caa5512113?context=explore) - MySQL is a open-source relational database management system (RDBMS)

* [phpmyadmin:5.0.1](https://hub.docker.com/_/phpmyadmin?tab=description) - A web interface for MySQL and MariaDB

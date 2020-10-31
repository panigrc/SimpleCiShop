:warning: :warning: :warning: **This project is work in progress and should not be used in production !** :warning: :warning: :warning:

# SimpleCiShop


The SimpleCiShop is an ecommerce web application based on the famous CodeIgniter framework.

It's being currently refactored to run with PHP >=7.2 and CodeIgniter ^3.1.

The shop was fully functional since I have used it to sell myself products; actually the products you see in the demo site are real, and I used to sell them.

I was not satisfied with the other open source ecommerce systems that were in the market that time - neither am I now - so I decided to build my own simple shopping cart.

There is a lot of stuff to be done.

## Features

* Nested Categories translatable with html description
* Products with image upload (unlimited) and translatable html description
* New price option - like a discount which strikes through the old price
* Product variables - you can set as any variables as you like at any product which are also reusable but not yet very much implemented
* Discount Coupons - The system can generate discount coupons with a certain discount which can be used by the customers at an order to get a discount

## Directory Structure

The directory structure is mainly the CodeIgniter structure. There are a few things that are outside of that.

`public/assets` - Contains js / fonts

`public/images` - Contains the images of the products

`public/theme` - Contains the css and the images of the frontend website (notice that the website is not themeable yet)

`public/uploads` - Uploaded images that are used in the Product details/description

`application/controllers/admin` - The admin (backend) application controllers

`application/controllers/shop` - The shop (frontend) application controllers

## Installation

- Clone the project `git clone https://github.com/panigrc/SimpleCiShop.git`
- Import the [simplecishop.sql](https://github.com/panigrc/SimpleCiShop/blob/master/simplecishop.sql) to your MySQL/MariaDB server
- Change the 'database connectivity settings' in the `application/config/database.php` file according to your needs
- Change into the project directory and run `composer install`
- Your Docroot directory should be the `public` directory. If you have another Docroot configuration i.e. `public_html` you could create a symlink like this:
`ln -s public public_html`.
- Copy the `config.example.php` to `config.php` and edit it according to your setup. 
- Browse to `http://localhost/your/webserver/path/SimpleCiShop/index.php/shop/home`.
- To access the administration visit `http://localhost/your/webserver/path/SimpleCiShop/index.php/admin/catalog`.

## Database structure

See [simplecishop.sql](https://github.com/panigrc/SimpleCiShop/blob/master/simplecishop.sql)

## TODOs

See [Project](https://github.com/panigrc/SimpleCiShop/projects/1)

SimpleCiShop
============

The SimpleCiShop is an ecommerce web application based on the famous CodeIgniter framework.

It's being currently refactored to run with PHP 7.2 and CodeIgniter 3.1.9

The shop was fully functional since I have used it to sell myself products; actually the products you see in the demo site are real and I use to sell them.

I was not satisfied with the other open source ecommerce systems that were in the market that time - neither am I now - so I decided to build my own simple shopping cart.

There is a lot of stuff to be done and a lot of stuff-junk to be removed. But ~~__Everything that has a Beginning..... has an end__~~ apparently not always :smile:.

Structure
---------

There are two directories of controllers for:

* The admin application (backend)
* The shop application (frontend)

### Directory Structure

The directory structure is mainly the CodeIgniter structure. There are a few things that are outside of that.

`/assets` - Contains some javascript plugins like Fckeditor

`/images` - Contains the images of the products

`/theme` - Contains the css and the images of the frontend website (notice that the website is not themeable yet)

`/uploads` - Uploaded images that are used in the Product details/description

`/application/controllers/admin` - The admin (backend) application controllers

`/application/controllers/shop` - The shop (frontend) application controllers

Features
--------

* Nested Categories translatable with html description
* Products with image upload (unlimited) and translatable html description
* New price option - like a discount which strikes through the old price
* Product variables - you can set as any variables as you like at any product which are also reusable but not yet very much implemented
* Ajax cart - an updatable cart using Ajax
* Discount Coupons - The system can generate discount coupons with a certain discount which can be used by the customers at an order to get a discount

Database structure
------------------

See [simplecishop.sql](https://github.com/panigrc/SimpleCiShop/blob/CodeIgniter-3.1.9-dev/simplecishop.sql)

TODOs
-----

See [Project](https://github.com/panigrc/SimpleCiShop/projects/1)
SimpleCiShop
============

The SimpleCiShop is an ecommerce web application based on the famous CodeIgniter framework.

It is build with CodeIgniter version 1.5.3 back at 2006. Since then few changes happened.

The shop was fully functional since I have used it to sell myself products; actually the products you see in the demo site are real and I use to sell them.

I wasn't satisfied with the other open source ecommerce systems that were in the market that time - neither am I now - so I decided to build my own simple shopping cart.

There is a lot of stuff to be done and a lot of stuff-junk to be removed. But __Everything that has a Beginning..... has an end__.

Structure
---------

The eshop is split into 2 sections (CodeIgniter applications)

* The admin application (backend)
* The catalog application (frontend)

### Directory Structure

The directory structure is mainly the CodeIgniter structure. There are a few things that are outside of that.

/_css - I don't remember what it does

/_img - I don't remember what it does

/assets - Contains some javascript plugins like Fckeditor

/images - Contains the images of the products

/javascript - Contains also some javascript libraries (I don't know why I have two directories with javascripts; there has to be a reason)

/theme - Contains the css and the images of the frontend website (notice that the website is not themable yet)

/uploads - I don't remember what it does

/admin.php - Calls the backend

/system/language/ - Contains the language files (for multilanguage support)

/system/application/admin/ - The admin (backend) application

/system/application/catalog/ - The catalog (frontend) application

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

What it needs to be done
------------------------

* Merge the two applications - frontend/backend - into one so we can reuse the various functions of Models and Libraries
* Cleaning and rebuilding the multilanguage system, so anything can be translated into any language.
* Creating a block system so without any interuption of the MVC system we can call and embedd any block we need in the website
* Building a more themable website; all the images/styles and output should be themable.
* Translating the interface and the whole website into english

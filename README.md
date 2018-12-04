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

`/javascript` - Contains also some javascript libraries (I don't know why I have two directories with javascripts; there has to be a reason)

`/theme` - Contains the css and the images of the frontend website (notice that the website is not themable yet)

`/uploads` - I don't remember what it does

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

See simplecishop.sql

TODOs _Sorted by schedule_
-----

- [ ] Separation between data and models. Models should not contain any $_REQUEST input.
- [ ] Cleaning and rebuilding the multilingual system, so anything can be translated into any language.
- [ ] Remove hard coded shipping costs from the language files.
- [ ] Remove hard coded text/words from views.
- [ ] Creating a block system (event listeners).
- [ ] Use a template engine (either Twig or the Embedded one). And clean up views so they don't use any more Controller/Model functions. 
- [ ] Building a more themeable website; all the images/styles and output should be themeable. Thinking about using a UI framework like Twitter Bootstrap.
- [ ] Translating the interface and the whole website into english
- [ ] Build an Affiliate controller; which will redirect to the page intended plus saving the affiliate id to session.
- [ ] Better admin interface.
- [x] Merge the two applications - frontend/backend - into one so we can reuse the various functions of Models and Libraries
- [x] Language setting should move into session and not in every URL.
- [x] Rename all camelCase variables in templates & database to snake_case.
- [x] Build a Language controller, to be able to change and set Language.

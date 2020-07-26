# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [0.15.0] - 2019-10-17

### Added

- Add :warning: notice in `README.md`.
- Add cartBlock. See #25.
- Add `main_redirecting_to_paypal` translation.
- Add categoryBlock.
- Add Emporio Ui Package in `packages/emporio/ui`.
- Autoload "application/blocks" classmap in `composer.json`.
- Add welcomeBlock.
- Add #3 Template block system.

### Changed

- Convert Controllers to use the new Block system. See #24.
- Refactor following methods in `Template_library`:
  - Rename `set` to `setSection`
  - Rename `prepend` to `prependToSection`
  - Rename `apend` to `appendToSection`
- Rename project in `composer.json` from "panigrc/SimpleCiShop" to "panigrc/simplecishop".

### Removed

- Remove Category Shop controller & template. See #26.
- Clean up the templates from comments. See #33.
- Remove "What it needs to be done" section from `README.md` and convert it to github project.
- Remove blocks from controllers as they are injected by the Template_library.

### Fixed

- Fix Installation instructions in `README.md`.
- Use `$this->language_library->get_language()` to get current language in
  - `application/views/shop/container_tpl.php`
  - `application/views/shop/contents/catalog_tpl.php`
  

## [0.14.0] - 2019-09-20

### Added

- Create `Emporio_orm_library`.
- Add Emporio Core Package in `packages/emporio/core`.
- Add "street" field in users migration.
- Add `product_meta` table migration.
- Add missing "created" field in orders migration.

### Changed

- Rename `application/views/shop/container.php` to `application/views/shop/container_tpl.php`
  and update all usages. 
- Activate Composer in `application/config/config.php`.
- Replace everywhere "nicename" fields with "slug" ones.
- Remove slug key as it conflicts with unique constraint in migration
  `20190117125627_create_products_table`.
- Replace "nicename" with "slug" in categories & products migrations.

### Removed

- Remove sqlite example `simplecishop.sqlite.example`.

### Fixed

- Rename table names and field names:
  - Table "category" to "categories"
  - Table "category_text" to "category_texts"
  - Table "coupon" to "coupons"
  - Table "order" to "orders"
  - Field "date_created" to "created"
  - Table "order2product" to "order_products"
  - Table "product" to "products"
  - Table "product_text" to "products_texts"
  - Table "product_image" to "products_images"
  - Table "product2category" to "product_categories"
  - Table "user" to "users"
  - Field "user_code" to "password"
  - Field "user_language" to "language"
  - Field "user_name" to "first_name"
  - Field "user_surname" to "last_name"
  - Field "user_registered" to "registered"
  - Field "user_stars" to "credits"
  - Field "user_email" to "email"
  - Field "user_url" to "url"
  - Field "user_birthdate" to "birthdate"
  - Field "user_address" to "address"
  - Field "user_city" to "city"
  - Field "user_zip" to "zip"
  - Field "user_country" to "country"
  - Field "user_phone" to "phone"

## [0.13.0] - 2019-01-19

### Fixed

- Fix #2 Remove empty lines and PHP close tags in all controllers.

## [0.12.0] - 2019-01-19

### Added

- Exclude `simplecishop.sqlite` from git with `.gitignore`.
- Add latest migration to `aplication/config/migration.php`.
- Exclude `bin` directory from git with `.gitignore`.
- Create sqlite database `simplecishop.sqlite`.
- Add `craftsman/cli` configuration file `.craftsman`.
- Require `craftsman/cli` in Composer.
- Add #4 migrations for all database tables.
- Enable migrations.
- Add installation instructions in README.

### Changed

- Update authentication library to not cause problems as it doesn't being used right now.
- Change `main_name` to `main_firstname` and `main_surname` to `main_lastname`
  in language translations and change all usages.
- Refactor ajax methods of setting status of orders and stock of products,
  in admin and rename them without the ajax part and instead of returning,
  contents they redirect to the order and to products respectively.

### Removed

- Remove create order functionality from admin.
- Remove `overlib.js`.
- Remove the ajax library and the draggable elements from views.
- Remove `AUTO_INCREMENT` directive from the queries in `simplecishop.sql`.

### Fixed

- Fix installation instructions in README.
- Fix authentication library to work with cli.
- Fix #1 Form action URLs in admin form views.
- Fix loading problems of FCKEditor in `Myfckeditor` library.
- Fix view methods in admin controllers by making the last parameter optional (default = null).

## [0.11.0] - 2018-12-25

### Added

- Add method `cart_block` to the Cart Library.
- Add Template library which handles nested views for making it easier to inject
  the views for example in the container view.
- Load Font Awesome in container views of admin and shop.
- Font Awesome v5.6.1 in `assets` directory.

### Changed

- Refactor Catalog (shop) controller in order to use the Template library.
- Autoload the `template_library`.
- Autoload the `user_agent` library.
- Clean up css.
- Replace To Do items in README with a Project in GitHub.
- Replace all icons with their respective font awesome icon. See #7.
- Update README todo.
- Update views to include script.aculo.us from the new path.
- Delete script.aculo.us libraries from `javascripts/` directory and
  the existing script.aculo.us library from `assets/validation/scriptaculous` to
  `assets/scriptaculous` directory. 

### Removed

- Remove Ajax functionality when adding or removing items in/from cart. See #5.
- Remove Logo.
- Remove unused images from `theme/default/images`.
- Remove empty `javascripts/` directory.

### Fixed

- Checkout link in `application/views/shop/cart/cart_tpl.php` view.

## [0.10.0] - 2018-12-09

### Added

- Add translation for missing admin keys. See #8.
- Add #13 Language Controller, which sets the language to the session according to a GET parameter and
  redirects to the referrer.
- VS Code settings to `.gitignore`.

### Changed

- Reformat indentation of admin templates.
- Add missing keys to the languages, so all language files have the same keys.
- Replace hard coded texts in `application/controllers/admin` and `application/views/admin` with language keys.
  See #9.
- Update README todo list.
- Refactor admin controllers:
  - Add visibility to methods
  - Remove unnecessary comments
  - Use array short type `[]`
  - Add docblocks
  - Remove inline fetching of GET parameters with `$this->uri->segment()` and add them to method parameters
- Rename all variables in classes and views to snake case to match the CodeIgniter style guide.
- Rename all table fields to snake case to match the CodeIgniter style guide. See #12.

### Fixed

- Replace everywhere 'main_user_rating' with 'main_user_points'.
- Replace everywhere 'main_shipment' with 'main_shipping'.
- Fix admin routes in the views of `application/views/admin`, because after the application merger,
  the routes to the admin controllers the prefix `/admin` was added.

## [0.9.0] - 2018-08-02

### Added

- Add #11 Language library, which gets/sets the language from/to the session.

### Changed

- Space the arrays in the language files evenly.
- Add method visibility to controllers/models/libraries.
- Change default language to 'greek' in the `application/config/config.php`
  until everything is translated to english.
- Remove the language parameter from Controller methods. Until now the language was passed
  in the Controllers every time. By using the language library (see above), the current language is
  set once in the session.
- Remove the language parameter from URL paths in Views. Until now the language was passed
  in the URL every time. By using the language library (see above), the current language is
  set once in the session. 
- Update README todo list.

### Removed

- Remove Google Analytics script from `application/views/shop/container.php`.

### Fixed

- Replace everywhere 'shippment' with 'shipment'.
- Add missing translations.

## [0.8.0] - 2018-07-25

### Added

- Add `application/config/autocomplete.php` to aid to the PHPStorm autocomplete.

### Changed

- Rename every usage of `$this->{library}` and `$this->{model}` to snake case to match
  the definitions in the `application/config/autoload.php` config file.
- Autoload every library, model, helper which was manually loaded in each class.
- Update README.
- Disable redirecting in `application/libraries/Authentication.php` 
  to the login page because it makes debugging difficult.

### Fixed

- Rename again the `shop/Index.php` to `shop/Home.php` and `admin/Index.php` to `admin/Home.php`,
  because the name `Index` as Controller Name is a reserved word from CodeIgniter.
- Fix shop routes in the views of `application/views/shop`, because after the application merger,
  the routes to the shop controllers the prefix `/shop` was added.

## [0.7.0] - 2018-07-17

### Added

- Add upload configuration in `application/config/upload.php`.

### Changed

- Rename `shop/Home.php` to `shop/Index.php` and replaced all `'catalog'` references in shop controllers views
  with `'shop'`.
- Move error views from `views/admin` to `views` directory.
- Update the README with the details of the new structure.
- Refactor TODOs to PHPDocumentor tags `@todo`.
- Refactor methods in following models to match the
  [CI style guide](https://codeigniter.com/userguide3/general/styleguide.html#class-and-method-naming),
  all references to these methods were updated to:
  - `application/models/Category_model.php`
  - `application/models/Coupon_model.php`
  - `application/models/Meta_model.php`
  - `application/models/News_model.php`
  - `application/models/Order_model.php`
  - `application/models/Product_model.php`
  - `application/models/Search_model.php`
  - `application/models/User_model.php`
- Merge the application Models.
- Merge the two applications `admin` and `catalog` into one. See #10.

### Removed

- Remove unnecessary `admin.php` as now only one application exists.
- Remove duplicate error views from `views/shop` directory.
- Remove already merged models.
- Remove duplicate application files such as inside `config`, `language`, `libraries` and `views`.

## [0.6.0] - 2018-07-15

### Changed

- Refactor English, German and Greek Language Translation in order to match with CodeIgniter v3.1.9 translations.
- Refactor methods `orderby` and `groupby` in `application/admin/models` and `application/catalog/models`
  to `order_by` and `group_by` to match with CodeIgniter v3.1.9 Query Builder methods.
- Add `sess_save_path` in `application/admin/config.php` and `application/catalog/config.php`.
- Remove database password from `application/admin/database.php` and `application/catalog/database.php`.
- Refactor PHP 4 Constructors to `__construct` method in following classes:
  - `application/admin/libraries`
  - `application/admin/controllers`
  - `application/admin/models`
  - `application/catalog/models`
  - `application/catalog/libraries`
  - `application/catalog/controllers`
- **Change the required PHP version in `composer.json` from `>=5.3.7` to `>=7.2`**.
- Update the README with the new minimum required PHP version.
- Change system and application paths in `admin.php` and `index.php` in order to have
  them as symlinks in a subdirectory like `htdocs` or `public_html`

### Deleted

- PHP 4 Style Constructor from `application/catalog/libraries/Ajax.php`.

## [0.5.0] - 2018-07-14

### Changed

- All classes in `application/admin/controllers`, `application/admin/models`, 
  `application/admin/catalog` and `application/catalog/models` start with upper case letter
  to be CodeIgniter Style conform.
- Remove closing PHP tag `?>` from all classes in `application/admin/controllers`, `application/admin/libraries`,
  `application/admin/models`, `application/catalog/controllers`, `application/catalog/libraries` and
  `application/catalog/models`.
- Ignore `.idea/` and `htdocs/` in `.gitignore`.
- README.
- Change base url and database configuration of admin and catalog application to be able to develop locally
  using [devilbox](https://github.com/cytopia/devilbox).
- **Update to CodeIgniter v3.1.9**.
  - Application config updated.
  - Errors moved to views.
  - Missing directories added.
  - `index.php` and `admin.php` adapted.
  - Convert Files to LF format.
- Application directory (`system/application`) moved to root of the project.

### Deleted

- Remove unneeded `_img` and `_css` directories and all their contents.

## [0.4.0] - 2017-02-23

### Added

- MySQL file `/simplecishop.sql`

## [0.3.0] - 2011-10-24

### Added

- `/.gitignore`

### Changed

- Upgrade CodeIgniter to v1.7.2

## [0.2.0] - 2011-08-08

### Added

- Details of the project in the README.

### Changed

- Move the files in the `/theme` directory under `default` subdirectory to support more themes in the future.

## [0.1.0] - 2011-08-04

### Added

- First Commit (3b0cfd8a)
  - CodeIgniter v1.5.3 under `/system`
  - Common style `/_css/style.css`
  - Common images under `/_img`
  - Assets (JavaScript packages)
    - FCKeditor v2.3.2
    - jscalendar v1.51
    - validation v1.5.4.1
  - Shop images under `/images`
  - Javascript libraries under `/javascript`
    - script.aculo.us `builder.js` v1.7.0
    - script.aculo.us `controls.js` v1.7.0
    - script.aculo.us `dragdrop.js` v1.7.0
    - script.aculo.us `effects.js` v1.7.0
    - Prototype JavaScript framework `prototype.js` v1.5.0
    - script.aculo.us `scriptaculous.js` v1.7.0
    - script.aculo.us `slider.js` v1.7.0
    - script.aculo.us `unittest.js` v1.7.0
  - SimpleCiShop Applications under `/system/application`
    - Admin application in `/system/application/admin`
    - Catalog (frontend) application in `/system/application/catalog`
  - Common theme under `/theme`
  - Blog images under `/uploads/Image/products`
  - `/.htaccess`
  - `/admin.php`
  - `/index.php`
  - `/licence.txt`
  - `/README.md`

[unreleased]: https://github.com/panigrc/SimpleCiShop/compare/v0.15.0...HEAD
[0.15.0]: https://github.com/panigrc/SimpleCiShop/compare/v0.14.0...v0.15.0
[0.14.0]: https://github.com/panigrc/SimpleCiShop/compare/v0.13.0...v0.14.0
[0.13.0]: https://github.com/panigrc/SimpleCiShop/compare/v0.12.0...v0.13.0
[0.12.0]: https://github.com/panigrc/SimpleCiShop/compare/v0.11.0...v0.12.0
[0.11.0]: https://github.com/panigrc/SimpleCiShop/compare/v0.10.0...v0.11.0
[0.10.0]: https://github.com/panigrc/SimpleCiShop/compare/v0.9.0...v0.10.0
[0.9.0]: https://github.com/panigrc/SimpleCiShop/compare/v0.8.0...v0.9.0
[0.8.0]: https://github.com/panigrc/SimpleCiShop/compare/v0.7.0...v0.8.0
[0.7.0]: https://github.com/panigrc/SimpleCiShop/compare/v0.6.0...v0.7.0
[0.6.0]: https://github.com/panigrc/SimpleCiShop/compare/v0.5.0...v0.6.0
[0.5.0]: https://github.com/panigrc/SimpleCiShop/compare/v0.4.0...v0.5.0
[0.4.0]: https://github.com/panigrc/SimpleCiShop/compare/v0.3.0...v0.4.0
[0.3.0]: https://github.com/panigrc/SimpleCiShop/compare/v0.2.0...v0.3.0
[0.2.0]: https://github.com/panigrc/SimpleCiShop/compare/v0.1.0...v0.2.0
[0.1.0]: https://github.com/panigrc/SimpleCiShop/releases/tag/v0.1.0

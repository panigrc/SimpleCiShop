# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

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
- Moved error views from `views/admin` to `views` directory.
- Updated the README with the details of the new structure.
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
- Merged the application Models.
- Merged the to applications `admin` and `catalog` into one.

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
- Removed closing PHP tag `?>` from all classes in `application/admin/controllers`, `application/admin/libraries`,
  `application/admin/models`, `application/catalog/controllers`, `application/catalog/libraries` and
  `application/catalog/models`.
- Ignored `.idea/` and `htdocs/` in `.gitignore`.
- README.
- Change base url and database configuration of admin and catalog application to be able to develop locally
  using [devilbox](https://github.com/cytopia/devilbox).
- **Updated to CodeIgniter v3.1.9**.
  - Application config updated.
  - Errors moved to views.
  - Missing directories added.
  - `index.php` and `admin.php` adapted.
  - Converted Files to LF format.
- Application directory (`system/application`) moved to root of the project.

### Deleted

- Removed unneeded `_img` and `_css` directories and all their contents.

## [0.4.0] - 2017-02-23

### Added

- MySQL file `/simplecishop.sql`

## [0.3.0] - 2011-10-24

### Added

- `/.gitignore`

### Changed

- Upgraded CodeIgniter to v1.7.2

## [0.2.0] - 2011-08-08

### Added

- Details of the project in the README.

### Changed

- Moved the files in the `/theme` directory under `default` subdirectory to support more themes in the future.

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

[unreleased]: https://github.com/panigrc/SimpleCiShop/compare/v0.8.0...HEAD
[0.8.0]: https://github.com/panigrc/SimpleCiShop/compare/v0.7.0...v0.8.0
[0.7.0]: https://github.com/panigrc/SimpleCiShop/compare/v0.6.0...v0.7.0
[0.6.0]: https://github.com/panigrc/SimpleCiShop/compare/v0.5.0...v0.6.0
[0.5.0]: https://github.com/panigrc/SimpleCiShop/compare/v0.4.0...v0.5.0
[0.4.0]: https://github.com/panigrc/SimpleCiShop/compare/v0.3.0...v0.4.0
[0.3.0]: https://github.com/panigrc/SimpleCiShop/compare/v0.2.0...v0.3.0
[0.2.0]: https://github.com/panigrc/SimpleCiShop/compare/v0.1.0...v0.2.0
[0.1.0]: https://github.com/panigrc/SimpleCiShop/releases/tag/v0.1.0

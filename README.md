**# Symfony3 Admin Template #**
===============================

A Symfony project created on February 17, 2016, 12:17 pm.

This is a starter Admin template built on latest Symfony3 build (3.0.4 at the time of writing). **This is not a BUNDLE**

This project comes with pre installed Symfony recommended and useful bundles to for rapid web development. This project use [AdminThemeBundle](https://github.com/avanzu/AdminThemeBundle) theme.

# Bundles Installed #

Following bundles are included with the template. Not all of them are used in example pages. **TODO**

* [FOSUserBundle](https://github.com/FriendsOfSymfony/FOSUserBundle) - User Management
* [FOSRestBundle](https://github.com/FriendsOfSymfony/FOSRestBundle) - For bulid meaningful REST API's
* [DoctrineMigrationsBundle](http://symfony.com/doc/current/bundles/DoctrineMigrationsBundle/index.html) - Doctrine database migrations
* [LiipImagineBundle](https://github.com/liip/LiipImagineBundle) - Easy image manupilation
* [JMSSerializerBundle](http://jmsyst.com/bundles/JMSSerializerBundle) - Easily serialize, and deserialize object graphs of any complexity (supports XML, JSON, YAML)
* [KnpMenuBundle](https://github.com/KnpLabs/KnpMenuBundle) - Build object oriented menus
* [StofDoctrineExtensionsBundle](https://github.com/stof/StofDoctrineExtensionsBundle) - Integrate doctrine extensions like **Timestampable**, **Slugabble** and **Translatable** etc
* [VichUploaderBundle](https://github.com/dustin10/VichUploaderBundle) - Handle easy file upload
* [IvoryCKEditorBundle](https://github.com/egeloen/IvoryCKEditorBundle) - The bundle provides a CKEditor integration for your Symfony Project
* [WhiteOctoberBreadcrumbsBundle](https://github.com/whiteoctober/BreadcrumbsBundle) - Easy breadcrumbs generation. However admin template use bultin Event Listeners comes with AvanzuAdminBundle and this breadcrumb bundle to handle generate breadcrumbs
* [AvanzuAdminThemeBundle](https://github.com/avanzu/AdminThemeBundle) - AdminLTE integreation with Symfony


# Requirements #

Minimum [Symfony 3](http://symfony.com/doc/current/reference/requirements.html) requirements plus follows

```sh
Composer
Node JS and npm
Bower
```

# Installation #

Installation is very easy and simple. Please follow the instruction below

Clone a copy of this repository.

```sh
git clone https://github.com/sharfaz/Symfony3-Admin-Template.git
```

2. Create a database **'symfony'** if not already exists.


3. Pull the dependencies using composer.

```sh
go to project folder
$ cd symfony3-admin-template

//this will pull all project required dependencies and installed in vendor folder.
$ composer install
```

Update database schema add user table for authentication. I have user bundle which extends FOSUserBundle functionality.

```sh
$ php bin/console doctrine:schema:update --force

//load the sample user data
$ php bin/console doctrine:fixtures:load // press 'y' when promoted
```

You must have Node, npm and Bower installed to use AdminBundle. Please refer corresponding websites how to install node, npm for your machine depending on OS. Once you installed Node.js install bowser

```sh
$ npm install bower

//if you using windows please update the bower executable path in app/config.yml file under
avanzu_admin_theme:
    bower_bin: C:\Users\{username}\AppData\Roaming\npm\bower.cmd

if you using Linux/MacOSX please comment/remove the line. The default path will be used.
```

Install all required fontend Assets

```sh
#!linux
$ php bin/console avanzu:admin:fetch-vendor
```

Finally install assets as symlink and use Assetic to dump all assets to web folder

```sh
$ php bin/console assets:install --symlink
$ php bin/console assetic:dump
```

Run built in php server to fire up the site

```sh
$ php bin/console server:run
```

Admin username: admin
Password: test

**Happy Coding!!!**



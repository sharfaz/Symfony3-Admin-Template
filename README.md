**# Symfony3 Admin Template #**
===============================

A Symfony project created on February 17, 2016, 12:17 pm.

This is a starter Admin template built on latest Symfony3 build (3.0.4 at the time of writing). **This is not a BUNDLE**

This project comes with pre installed Symfony recommended and useful bundles to for rapid web development. This project use [AdminThemeBundle](https://github.com/avanzu/AdminThemeBundle).

# Installation #

Installation is very easy and simple. Please follow the instruction below

1. Clone a copy of this repository.

```
#!

git clone https://msharfaz@bitbucket.org/msharfaz/symfony3-admin-template.git


```


2. Create a database **'symfony'** if not already exists.


3. Pull the dependencies using composer. (Assume composer already installed)

```
#!
go to project folder
$ cd symfony3-admin-template
$ composer install
//this will pull all project required dependencies

```

4. Update database schema for user authentication. I have user bundle which extends FOSUserBundle functionality. All user related functionality reside inside SalexUserBundle.

```
#!
$ php bin/console doctrine:schema:update --force

//load the sample data
$ php bin/console doctrine:fixtures:load // press 'y' when promoted

```

5. You must have Node, npm and Bower installed to use AdminBundle. Please refer corresponding websites how to install node, npm for your machine depending on OS.

6. Once you installed Node.js install bowser 
```
#!
$ npm install bower

//if you using windows please update the bower executable path in app/config.yml file under
avanzu_admin_theme:
    bower_bin: C:\Users\{username}\AppData\Roaming\npm\bower.cmd

if you using Linux/MacOSX please comment/remove the line. The default path will be used.
```

7.Install all required Assets
```
#!
$ php bin/console avanzu:admin:fetch-vendor
```

8. Finally install assets as symlink and use Assetic to dump all assets to web folder
```
#!
$ php bin/console assets:install --symlink
$ php bin/console assetic:dump

//run built in php server to fire up the site
$ php bin/console server:run

**admin username:** admin
**password:** test

THATS IT!!! 
```
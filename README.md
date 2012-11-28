CtrlSkeleton
=======================

Skeleton application provides a Zend Framework 2 environment providing a de fault module, ready for programming.
several libraries have been set up, configured and integrated to speed up the dev process:
- based on Zend Framework 2
- Doctrine 2 ORM
- ctrllib
- ctrlAuth
- phing
- dbdeploy

Installation
------------

Composer
--------
clone from git and execute composer.phar, this will install all dependencies

    cd /my/project/dir
    git clone git://github.com/ctrl-f5/ctrlSkeleton.git
    cd ctrlSkeleton
    php composer.phar install

Install database
----------------
create and empty database and configure your database connection for the application:

    cd /my/project/dir/config/autoload
    cp local.php.dist local.php

edit the newly created local.php config file with your database credentials.

The database is managed by phing and db deploy.
you can create a build.properties file using the doctrine connection you configured
in the previous step

    cd /my/project/dir/build
    php create-phing-props-from-zf.php

to create a database without sample data execute the following task:

    phing db-reset

the is also a sample data file available, but this requires that
the mysql option `lower_case_table_names=1`

to create a database with sample data execute the following task:

    phing db-reload

if something goes wrong while building the database you can always add the -verbose flag.
phing is currently configured with the following tasks:

    phing -l
    Buildfile: /my/project/dir/build/build.xml
     [property] Loading /my/project/dir/build/build.properties
    Default target:
    -------------------------------------------------------------------------------
     db-reload           drops, creates, migrates and loads sample data

    Main targets:
    -------------------------------------------------------------------------------
     db-create           creates an empty database with the configured name
     db-drop             drops the database completely
     db-load-sampledata  loads sample data
     db-migrate          Database Migrations
     db-reload           drops, creates, migrates and loads sample data
     db-reset            drops, creates and migrates

Doctrine Proxies
------------
The directory for proxy models generated by doctrine must also be writable!
By default this directory is data/orm_proxies

    chmod 777 /my/project/dir/data/orm_proxies

Virtual Host
------------
Afterwards, set up a virtual host to point to the public/ directory of the
project and you should be ready to go!

Create an application
============
The skeleton provides a module called App where you can start programming
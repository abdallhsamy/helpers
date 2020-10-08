Helpers
=======

A Package contains some useful classes to help you develop faster


benefits of using package
------

* you will be able to move migration files to sub directories **ex**: ``database/migration/company/xxxxx_create_company_contacts_table.php``
* use pagination , filter and search without modifing  controller methods or route params . **ex** : ``/api/v1/users/search=Abdallah&age=27&country_id=27&limit=15``
 which  @param ``search`` for search ,
 @param ``age`` for filtering
 @param ``country_id`` for filtering and @param  ``limit`` for pagination

Installation
=====

using Composer
--------

.. code-block:: bash

    $ composer require abdallhsamy/helpers


Service Provider
----------------

Add ``AbdallhSamy\Helpers\Providers\MigrationServiceProvider::class`` to your application service providers file: ``config/app.php``.

.. code-block:: php

    'providers' => [
        /**
         * Third Party Service Providers...
         */
        AbdallhSamy\Helpers\Providers\MigrationServiceProvider::class,
    ]

Config File and Migrations
--------------------------

Publish package config file and migrations with the following command:

.. code-block:: bash

    php artisan vendor:publish --provider="AbbdallhSamy\Helpers\Providerw\HelperServiceProvider"

Then run migrations:

.. code-block:: bash

    php artisan migrate


Traits and Contracts
--------------------

Add ``AbdallhSamy\Helpers\Traits\Models\{ActivityLogTrait, ModelFilters, ModelSearch}`` traits to your model.

See the following example:

.. code-block:: php

    namespace App\Models;

    use Illuminate\Foundation\Auth\User as Authenticatable;
    use AbdallhSamy\Helpers\Traits\Models\{ActivityLogTrait, ModelFilters, ModelSearch};
    class User extends Authenticatable
    {
        use ActivityLogTrait, ModelFilters, ModelSearch;

        protected $filterItems = [];
        protected $searchItems = [];
        
        ...





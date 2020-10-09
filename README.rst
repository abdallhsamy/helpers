Helpers
=======

A Package contains some useful classes to help you develop faster


benefits of using package
------

* you will be able to move migration files to sub directories **ex**: ``database/migration/company/xxxxx_create_company_contacts_table.php``
* use pagination , filter and search without modifing  controller methods or route params . **ex** : ``/api/v1/users/search=Abdallah%20Samy&age=27&country_id=27&limit=15``
 which :
  * @param ``search`` for search ,
  * @param ``age`` for filtering
  * @param ``country_id`` for filtering
  * and @param  ``limit`` for pagination

Migration Directory Example
--------------------------

```
├── migrations
│   ├── Employees
│   │   ├── 2020_07_13_002708_create_xxxxx_table.php
│   ├── General
│   │   ├── 2020_06_25_094724_create_xxxxxx_table.php
│   │   ├── 2020_06_25_154805_create_xxxxxx_table.php
│   ├── Library
│   │   ├── 2020_07_12_131550_create_xxxxxx_table.php
│   │   ├── 2020_07_13_160900_create_xxxxxx_table.php
│   │   ├── 2020_07_13_160903_create_xxxxxx_table.php
│   │   └── 2020_07_13_160904_create_xxxxxx_table.php
│   └── Users
│       ├── 2020_06_14_145802_create_xxxxxx_table.php
│       ├── 2020_06_14_145803_create_xxxxxx_table.php
│       ├── 2020_06_15_110700_create_xxxxxx_table.php
│       └── 2020_08_30_132633_create_xxxxxx_table.php
└── seeds

```

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
        AbdallhSamy\Helpers\Providers\HelperServiceProvider::class,
        AbdallhSamy\Helpers\Providers\MigrationServiceProvider::class,
    ]

Config File and Migrations
--------------------------

Publish package config file and migrations with the following command:

.. code-block:: bash

    php artisan vendor:publish --provider="AbbdallhSamy\Helpers\Providers\HelperServiceProvider"

Then run migrations:

.. code-block:: bash

    php artisan migrate


Traits and Contracts
--------------------

Model
-----

Add ``AbdallhSamy\Helpers\Traits\Models\{ActivityLogTrait, ModelFilters, ModelSearch}`` traits to your model.

See the following model example:

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

Controller
---------


.. code-block:: php

   <?php

    namespace App\Http\Controllers\API\V1;

    use App\Models\User;
    use App\Http\Controllers\Controller;
    use AbdallhSamy\Helpers\{Contracts\EnhancedQueryInterface, Traits\Controllers\EnhancedQuery};

    class UserAPIController extends Controller implements EnhancedQueryInterface
    {
        use EnhancedQuery;

        private $model;

        public function __construct()
        {
            $this->model = User::latest();
        }

        /**
        * must be implemented
        */
        public function collection($users)
        {
            return new VehicleCollection($users);
        }

        /**
        * Display a listing of the resource.
        * @param Request $request
        * mixed
        * @return ResourceCollection
        */
        public function index(Request $request)
        {
            return $this->query($request->all());
        }

    ...



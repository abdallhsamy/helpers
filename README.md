# helpers

## A Package contains some useful classes to help you develop faster


## benefits of using package

* you will be able to move migration files to sub directories **ex**: `database/migration/company/xxxxx_create_company_contacts_table.php`
* use pagination , filter and search without modifing  controller methods or route params . **ex** : `/api/v1/users/search=Abdallah&age=27&country_id=27&limit=15`
 which  @param `search` for search ,
 @param `age` for filtering
 @param `country_id` for filtering
and @param  `limit` for pagination


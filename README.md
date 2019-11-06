### Loot Split Backend

clone project

cd into directory

`composer install`


To run project:

`php bin/console server:run`


Make sure you have `.env` file configured  with database info, see here: https://symfony.com/doc/current/doctrine.html
   
Create the database using Doctrine:  
`php bin/console doctrine:database:create`



Create the db migration:  
`php bin/console make:migration`


Run the migration:
`php bin/console doctrine:migrations:migrate`



Generating new Controller from Entity:  
https://symfony.com/doc/current/bundles/SensioGeneratorBundle/commands/generate_controller.html
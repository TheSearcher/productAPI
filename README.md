# Proof Of Concept Website For We3World

This is a proof-of-concept website for We3World.

It is Laravel driven and use Docker (Sail) as its setup.

The focus of the website is two API endpoints.

1.	Products

2.	Product

The Products endpoint returns a list of all products.

The Product endpoint returns a single product.

## SetUp 

I use laravel sail (docker) to setup the website. 

For the purpose of this setup, it is presumed that the user has docker installed on their local machine.

Once you download the site. All you need to do is run the following code from you terminal i.e the root of the site. 

    php artisan sail:install

then 

    ./vendor/bin/sail up


Alternatively, you should be able to start the container by running: 

    ./bins/start 

## PHP Unit Test 

please add the following to your **.env** file. This will allow a connection to the testing db.


    TEST_DB_HOST="mysql"
    TEST_DB_DATABASE="testing_db"
    TEST_DB_USERNAME="sail"
    TEST_DB_PASSWORD="password"

To run the test for the API you may use this command: 

    php artisan test --filter=ProductControllerTest

Alternatively

    php artisan test


The documents for the API are here: 

    http://localhost/docs


## Migration of Data 

It's important to migrate and seed data.

The two commands to migrate data are

    php artisan migrate

    php artisan db:seed 

Depending on the environment setup on your local machine, it might be easier to run the above commands from within 
your docker container. i.e 

ssh in to the container with this command substitute the name "productapi_laravel.test_1" for the name of your container": 

    docker exec -it productapi_laravel.test_1  bash





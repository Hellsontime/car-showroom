# Car Showroom
Car Showroom Dashboard using Symfony

# Run the application
 - run <code>composer install</code>
 - run <code>npm install</code>
 - run <code>npx encore dev</code>
 - rename <code>.env.example</code> to <code>.env</code>

# Setting up database
 - create database for the application
 - connect database in <code>.env</code> file
 - run <code>php bin/console doctrine:schema:update --force</code>

# Populate database with test data
 - run <code>php bin/console doctrine:fixtures:load</code>

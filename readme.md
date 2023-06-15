# Installlation

* Install and run the project with the command ***docker compose up*** you may need a Linux distribution or WSL for Windows with docker installed.
* Get inside the container with the command docker exec -ti exads sh or connect to the container with your editor and extension plugins of choice.
Docker compose is configured to run the container in the background.

<br>

# Project usage
* This is a ***Symfony Flex*** project check the documentation at https://symfony.com/doc/current/setup/flex.html. 
* many commands can also be ran or added inside the composer file.
* Simply run php bin/console list you will find all the commands there

# Project structure
* The entry point to every custom command is inside src/Command folder, every service is injected with Auto Wiring.
* Every command has two services, the service that has the functions with the operations we need to perform and a service that outputs that result into the console.
* This project also makes use of ***Doctrine***, Dto's and transformers.
# Symfony-project : ConfinementClassroom

## Project presentation :

### Project Kanban :
[Click here](https://github.com/Zerui-WANG/Symfony-project/projects/1) to go to the project Kanban

### Presentation slides :
[Click here](https://github.com/Zerui-WANG/Symfony-project/blob/develop/presentation_slides.pdf) to see the slides

## Requirements :

### SQL file :

### Accounts to connect on the website :

### System : 
- PHP 7.2 (and above)

### App : 
- Symfony
- Bootstrap
- Twig
- ORM Doctrine
- Composer
- GitHub
- wamp/xamp

## Get started
- `symfony server:start -d`
- Open a web development environment such as Wamp
- Do `php bin/console d:f:l`
- Database is filled : the questions in the table question has the same game_id => these questions are the questions template
- In src/service/EventService &  ActionService in create() : 
    - set $templateGameId to the same value than game_id in the table question 

![Alt text](./diagrammeClasse.svg)

images libres de droits et licences:

© Stocklib / Laura Milena Guzman Lopez
-badGrade.jpg
-mediumgrade.jpg
-goodGrade.jpg

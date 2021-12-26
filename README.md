# Curiosity
PHP project to solve NASA rovers explore of a plateau on Mars.


## Installation
For installation composer is needed. Please check [Composer intro](https://getcomposer.org/doc/00-intro.md) for installation instructions.

After installing the composer, at first this repository should be cloned/downloaded. Then a shell/CMD should be opened at the root of the project. Bellow command should be executed in the shell/CMD.
```shell
composer install
```

That's it.

## Usage
This is a command line project. To use it, you should run below command on the root of the project:
```shell
php ./index.php
```

The program will wait for input instruction. The first line should include the upper-right coordinate of plateau. After this, the rover position and explore instructions for each rover should be entered, on two separated lines.
Finally, when all rovers' data entered, an empty line should be given to the program, by simply pressing enter when line is empty. The program will try to explore the plateau using the rovers data and output the final position
of each rover, in order of input.

## Running tests
After installation, the tests can be run by using below command:
```shell
php vendor/bin/codecept run --steps
```

## Deploy using Docker
For ease of use, as a standalone program, a docker file is added to project, that can be used ro create a container, and call it anywhere on the system. To create the docker image, please run below command in a shell/cmd.
```shell
docker build --tag curiosity .
```

After successful command run, the curiosity can be used by using below command:
```shell
docker run -it curiosity
```
After this, the program will wait for instructions as explained in **Usage** section.

## Implementation
Based on the requirements, the following decisions were made during the analysis and implementation phase.

### Using different design patterns

#### Factory (method) pattern
Because of the need to parse input and create entity objects from provided values, Factory creation methods used, which create objects from concrete classes and return them as objects.

#### Command pattern
Command pattern helps to solve recurring design problems and design flexible and reusable object-oriented entities and actions.
By using command pattern we can: Define separate (command) objects that encapsulate aa action, and delegates an entity to a command object instead of implementing a particular action directly.

### Adding Uint Test
An extensive Unit test suite is added the project, to makes sure that the program will work based on requirements, and during the future development.
The test framework that used to implement tests is Codeception, because it is modern, and wrap all unit test needed utilities, and also easy to use and easy to maintain.
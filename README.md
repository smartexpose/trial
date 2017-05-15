SmartExpose / AllMyHomes

# Backend Developer Trial Task

This task aims to test the basic knowledge for creating RESTful APIs in Cake3.
The instructions bellow describe the needed set up, task to be implemented and expected results.

## Set up

In this section you can see what are the necessary steps to run this trial task.
If you have a problem setting up this project, contact the developer responsible for supervising your application.

 1. Check the system requirements:
    * Apache server with PHP 5.6+ and Intl extension enabled
    * MySql server 15.0+
 2. Clone this repository into a accessible folder (e.g. htdocs)
 3. Run `composer install`
 4. Create a database using the file `DB.sql` in this folder
 5. Update data sources in the file `config/app.php` connecting to your mysql server, if necessary

## Task

### Implementation

Create three controllers Genres, Authors and Books, that provide RESTful endpoints for:

#### *GET* /genres.json
Returns all genres available. The response format should be:
```json
[
  {
    "id": "int",
    "name": "string"
  }
]
```

#### *GET* /authors.json
Returns all authors whom first or second name match the query param `name`.
The response format should be:
 ```json
[
  {
    "id": "int",
    "first_name": "string",
    "second_name": "string"
  }
]
 ```

#### *GET* /genres/:genre_id/books.json
Returns all books for given genre. 
Each book should contain its author as well the genre information:
 ```json
[
  {
    "id": "int",
    "title": "string",
    "pages": "int",
    "genre": {
       "id": "int",
       "name": "string"
    },
    "author": {
       "id": "int",
       "first_name": "string",
       "second_name": "string"
    }
  }
]
 ```

#### *GET* /authors/:author_id/books.json
Returns all books for given author. 
The response format is the same as getting books per genre:
 ```json
[
  {
    "id": "int",
    "title": "string",
    "pages": "int",
    "genre": {
       "id": "int",
       "name": "string"
    },
    "author": {
       "id": "int",
       "first_name": "string",
       "second_name": "string"
    }
  }
]
 ```

#### *POST* /books.json
Creates a new book and return its ID.
The request body should be:
 ```json
{
   "genre_id": "int",
   "author_id": "int",
   "title": "string",
   "pages": "int"
}
 ```
The response should contain the id of the newly created book:
 ```json
{
   "id": "int"
}
 ```

#### *PUT* /books/:id.json
Updates a book.
The request body should be:
 ```json
{
   "genre_id": "int",
   "author_id": "int",
   "title": "string",
   "pages": "int"
}
 ```

### *DELETE /books/:id.json*
Removes a book.
      
This repository already contains tests with expected response bodies and codes.
At the end of the implementation, all the tests should run.

> **Warning**:
> If you use `bake` to create the models and tables,
> don't forget to skip the fixtures and tests, otherwise they will be overwritten

### Nice to have

While running the tests, check how good is the code coverage:
```sh
./vendor/bin/phpunit --coverage-text
```
If the coverage for the Genres, Authors and Books controllers is not 100%, 
write tests to cover the missing lines.

### Sending your solution

To send your solution, create a new branch with your `name.surname`,
commit your solution into it and push it to this repository.

Done that, send an email to the developer responsible for supervising your application.


## References

 * [REST APIs with CakePHP](https://book.cakephp.org/3.0/en/development/rest.html)
 * [Cake3 ORM](https://book.cakephp.org/3.0/en/orm.html)

## Evaluation

For the evaluation of this trial task, those aspects are considered:

 * **Implementation follows specifications**: routes comply with REST standard
  and responses have expected data (tests are green)
      ```
      ./vendor/bin/phpunit
      ```
 * **Code quality**: the code is simple, clean and follow CakePHP Standards 
 (code sniffer does not find errors)
      ```
      ./vendor/bin/phpcs -p --extensions=php --standard=vendor/cakephp/cakephp-codesniffer/CakePHP ./src
      ```
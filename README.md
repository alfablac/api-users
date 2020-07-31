# api-users
php api

## How to use:

Install using composer and create a db schema using doctrine

```bash
composer install
php bin/console doctrine:schema:create
```

Run server using

```bash
php -S localhost:8080 -t public/
```

### User create/update
POST /users

PUT /users/{id}

Body:
```json
{ "name":"Example", 
  "email":"example@example.com", 
  "telephones": [
      {"number":"123456"}, 
      {"number":"654321"}
    ] 
} 
```

### List users or invididual users
GET /users

GET /users/{id}


### Delete invididual users
DELETE /users/{id}


``
Log into php container : docker exec -it php-app bash
And run : php artisan migrate:fresh
The run: php artisan db:seed
``

``
This will populated some test data.
``

````
Endpoints:
1. session/user/{userId}
userId is 1 because we create one user in the seed
This endpoint return calculated score per session for a user
2. session/user/{userId}/per-category
same but grouped by category ... more or less what FE need for the graph
3. session/user/{userId}/session/{identifier}
date of last user session interaction
````
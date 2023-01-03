<p align="center"><a href="https://echochain.com" target="_blank"></a></p><img class="sc-83wl6d-1 fjvLyT custom-css-style-navigation-logo-image" data-cy="navigation-section-logo-image" alt="Ecochain" src="https://careers.recruiteecdn.com/image/upload/q_auto,f_auto,w_400,c_limit/production/images/Qeo/jrnGi0wxgcjV.png">

## Technologies

- PHP 7.4
- Laravel
- Mysql

Below are the steps you need to successfully set up and run the application.
- Clone the app from the repository and cd into the root directory of the app
- composer install

```
 cp .env.example .env
```
- Update database credentials to match in your env file
- Run `php artisan migrate` to migrate database tables
- Run `php artisan store:pokemon` to store csv into database
- Run `php artisan serve`
- For Filter and sortable `http://127.0.0.1:8000/pokemon?name=Bulbasaur&paginate=1`
- This API endpoint is searchable, filterable and paginatable
    - Search: name
        - e.g. `/pokemon?name=sand`
        - Should return the names containing the given characters
    - Filter: HP, Attack & Defense
        - e.g. `/pokemon?hp[gte]=100&defense[lte]=200`
    - Pagination: e.g. `/pokemon?paginate=1`
- Search, filters and pagination can be combined
    - e.g. `/pokemon?name=charm&hp[gte]=100&paginate=2`

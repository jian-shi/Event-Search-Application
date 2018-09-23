Intro
1. The web app is using Laravel, Bootstrap as framework
2. Laravel utilizes Composer to manage its dependencies. 
3. Edit .env to connect to Database
4. Views are in resources/views
5. Controllers are in Http/Controllers
6. Models are in /app

Features
1. Landing page shows no events
2. Empty search will return all events (not including expired ones)
3. Search for several keywords like ‘A serving’ will also return ‘A perfect serving’
4. Select Multiple Location and Category function can be added if change <select name='location'> to <select name='location[]’> (but we are not allowed to change unchanged.php)
5. Location and Category dropdown are populated from DB (using Laravel api and JavaScript fetch)

TODOs
1. Event results include imgs (currently using placeholder)
2. Sort function (sort by date, sort by location …)
3. Keep old input after search
4. Use ReactJS for frontend
5. Only use laravel as API

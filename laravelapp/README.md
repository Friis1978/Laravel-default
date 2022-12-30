<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laravel default project

This project follows the tutorial from Dary: [Laravel tutorial series](https://www.youtube.com/playlist?list=PLFHz2csJcgk_mM2jEf7t8P678O_jz83on).

Commands: 

- Listing routes: php artisan route:list

### Debugbar:
[Laravel debugbar](https://youtu.be/DCoYynZ45Ws)

- Install the debugbar: composer require barryvdh/laravel-deburbar --dev
- Add the debugbar to the providers: /config/app.php providers [Barryvdh\Debugbar\ServiceProviders::class]

- Console log print out: 
Debugbar::info('Info in debugbar');
Debugbar::error('Error in debugbar');

- Use Timeline, to track rendering time:
Debugbar::startMeasure('Name', 'Message');

- Track exceptions:
try {
    throw new Exception('Try Message!');
} catch (Exception $e) {
    Debugbar::addException($e);
}

### Controller
[Controllers for beginners](https://youtu.be/Aoqj5nuwBQI)

1. Create a new controller: php artisan make:controller PostsController
2. new controller has been added in: app/Http/Controllers/PostsController.php

3. Add a function to index in PostsController.php: 
public function index()
{
 return 'This is the index method';
}

4. Add routes in /routes/web.php
```Route::get('/blog', [PostsController::class,'index']);```

5. Auto create all resources: php artisan make:controller PostsController --resource
### DB:

- Migrate database: php artisan migrate
- Reset database: php artisan migrate:reset
- Seed database: php artisan migrate --seed


## All artisan commands

Usage:
  command [options] [arguments]

Options:
  -h, --help            Display help for the given command. When no command is given display help for the list command
  -q, --quiet           Do not output any message
  -V, --version         Display this application version
      --ansi|--no-ansi  Force (or disable --no-ansi) ANSI output
  -n, --no-interaction  Do not ask any interactive question
      --env[=ENV]       The environment the command should run under
  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Available commands:
  about                  Display basic information about your application
  clear-compiled         Remove the compiled class file
  completion             Dump the shell completion script
  db                     Start a new database CLI session
  docs                   Access the Laravel documentation
  down                   Put the application into maintenance / demo mode
  env                    Display the current framework environment
  help                   Display help for a command
  inspire                Display an inspiring quote
  list                   List commands
  migrate                Run the database migrations
  optimize               Cache the framework bootstrap files
  serve                  Serve the application on the PHP development server
  test                   Run the application tests
  tinker                 Interact with your application
  up                     Bring the application out of maintenance mode
 auth
  auth:clear-resets      Flush expired password reset tokens
 cache
  cache:clear            Flush the application cache
  cache:forget           Remove an item from the cache
  cache:table            Create a migration for the cache database table
 config
  config:cache           Create a cache file for faster configuration loading
  config:clear           Remove the configuration cache file
 db
  db:monitor             Monitor the number of connections on the specified database
  db:seed                Seed the database with records
  db:show                Display information about the given database
  db:table               Display information about the given database table
  db:wipe                Drop all tables, views, and types
 debugbar
  debugbar:clear         Clear the Debugbar Storage
 env
  env:decrypt            Decrypt an environment file
  env:encrypt            Encrypt an environment file
 event
  event:cache            Discover and cache the application's events and listeners
  event:clear            Clear all cached events and listeners
  event:generate         Generate the missing events and listeners based on registration
  event:list             List the application's events and listeners
 key
  key:generate           Set the application key
 make
  make:cast              Create a new custom Eloquent cast class
  make:channel           Create a new channel class
  make:command           Create a new Artisan command
  make:component         Create a new view component class
  make:controller        Create a new controller class
  make:event             Create a new event class
  make:exception         Create a new custom exception class
  make:factory           Create a new model factory
  make:job               Create a new job class
  make:listener          Create a new event listener class
  make:mail              Create a new email class
  make:middleware        Create a new middleware class
  make:migration         Create a new migration file
  make:model             Create a new Eloquent model class
  make:notification      Create a new notification class
  make:observer          Create a new observer class
  make:policy            Create a new policy class
  make:provider          Create a new service provider class
  make:request           Create a new form request class
  make:resource          Create a new resource
  make:rule              Create a new validation rule
  make:scope             Create a new scope class
  make:seeder            Create a new seeder class
  make:test              Create a new test class
 migrate
  migrate:fresh          Drop all tables and re-run all migrations
  migrate:install        Create the migration repository
  migrate:refresh        Reset and re-run all migrations
  migrate:reset          Rollback all database migrations
  migrate:rollback       Rollback the last database migration
  migrate:status         Show the status of each migration
 model
  model:prune            Prune models that are no longer needed
  model:show             Show information about an Eloquent model
 notifications
  notifications:table    Create a migration for the notifications table
 optimize
  optimize:clear         Remove the cached bootstrap files
 package
  package:discover       Rebuild the cached package manifest
 queue
  queue:batches-table    Create a migration for the batches database table
  queue:clear            Delete all of the jobs from the specified queue
  queue:failed           List all of the failed queue jobs
  queue:failed-table     Create a migration for the failed queue jobs database table
  queue:flush            Flush all of the failed queue jobs
  queue:forget           Delete a failed queue job
  queue:listen           Listen to a given queue
  queue:monitor          Monitor the size of the specified queues
  queue:prune-batches    Prune stale entries from the batches database
  queue:prune-failed     Prune stale entries from the failed jobs table
  queue:restart          Restart queue worker daemons after their current job
  queue:retry            Retry a failed queue job
  queue:retry-batch      Retry the failed jobs for a batch
  queue:table            Create a migration for the queue jobs database table
  queue:work             Start processing jobs on the queue as a daemon
 route
  route:cache            Create a route cache file for faster route registration
  route:clear            Remove the route cache file
  route:list             List all registered routes
 sail
  sail:install           Install Laravel Sail's default Docker Compose file
  sail:publish           Publish the Laravel Sail Docker files
 sanctum
  sanctum:prune-expired  Prune tokens expired for more than specified number of hours.
 schedule
  schedule:clear-cache   Delete the cached mutex files created by scheduler
  schedule:list          List all scheduled tasks
  schedule:run           Run the scheduled commands
  schedule:test          Run a scheduled command
  schedule:work          Start the schedule worker
 schema
  schema:dump            Dump the given database schema
 session
  session:table          Create a migration for the session database table
 storage
  storage:link           Create the symbolic links configured for the application
 stub
  stub:publish           Publish all stubs that are available for customization
 vendor
  vendor:publish         Publish any publishable assets from vendor packages
 view
  view:cache             Compile all of the application's Blade templates
  view:clear             Clear all compiled view files

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

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
```Debugbar::info('Info in debugbar');```
```Debugbar::error('Error in debugbar');```

- Use Timeline, to track rendering time:
```Debugbar::startMeasure('Name', 'Message');```

- Track exceptions:
```
try {
    throw new Exception('Try Message!');
} catch (Exception $e) {
    Debugbar::addException($e);
}
```

### Controller
[Controllers for beginners](https://youtu.be/Aoqj5nuwBQI)

1. Create a new controller: php artisan make:controller PostsController
2. new controller has been added in: app/Http/Controllers/PostsController.php

3. Add a function to index in PostsController.php: 
```public function index()
{
 return 'This is the index method';
}
```

4. Add routes in /routes/web.php
```Route::get('/blog', [PostsController::class,'index']);```

5. Auto create all resources: ```php artisan make:controller PostsController --resource```
6. Check all refined routes: ```php artisan route:list```


### Routing parameters
[Routes with expressions](https://youtu.be/PiTnHWbvbPM)
```
Route::get('/blog',[PostsController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}',[PostsController::class, 'show'])->name('blog.show');

// With RegExpressions
Route::get('/blog/{id}',[PostsController::class, 'show'])->where('id', '[0-9]+');
Route::get('/blog/{name}',[PostsController::class, 'show'])->where('name', '[A-Za-z]+');
Route::get('/blog/{id}/{name}',[PostsController::class, 'show'])->where([
    'id'=>'[0-9]+',
    'name'=>'[A-Za-z]+',
]);

//With Helper methods
Route::get('/blog/{id}/{name}',[PostsController::class, 'show'])
    ->whereNumber('id')
    ->whereAlpha('name');
```
### Route prefixes
[Route with prefixed](https://youtu.be/JZQEl2gKctQ)
```
Route::prefix('/blog')->group(function () {
    Route::get('/',[PostsController::class, 'index'])->name('blog.index');
    Route::get('/{id}',[PostsController::class, 'show'])->name('blog.show');
    Route::get('/create',[PostsController::class, 'create'])->name('blog.create');
    Route::post('/',[PostsController::class, 'store'])->name('blog.store');
    Route::get('/edit/{id}',[PostsController::class, 'edit'])->name('blog.edit');
    Route::patch('/{id}',[PostsController::class, 'update'])->name('blog.update');
    Route::delete('/{id}',[PostsController::class, 'destroy'])->name('blog.destroy');
});
```
### DB:
[Laravel Database](https://youtu.be/4dId4tpEYII)

1. Database setup: /config/database.php
2. Check connection: 
```
php artisan tinker
DB::connection()->getPdo();
exit;
```
### DB migrations:
[Laravel Database migrations](https://youtu.be/wX-MsYST3kI)

1. Migrations: /database/migrations
2. Create new migration prefilled: ```php artisan make:migration create_posts_table --create=posts```
3. Add a new table:
```
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->string('title')->unique();
        $table->text('excerpt')->nullable();
        $table->text('body');
        $table->integer('min_to_read')->default(1);
        $table->string('image_path');
        $table->boolean('is_published');
        $table->timestamps();
    });
```
3. Migrate the new table: ```php artisan migrate```
4. Check status of database tables: ```php artisan migrate:status```
5. Roll back all: ```php artisan migrate:reset```
6. Roll back all & migrate: ```php artisan migrate:refresh```

### DB seeds:
[Laravel Database seeds](https://youtu.be/UN42ad3KXqQ)

1. Make a new seeder: ```php artisan make:seeder PostsTableSeeder```
2. New seeder created: /database/seeders
3. Make a model: ```php artisan make:model Post```
4. Add fake data in the model to autogenerate data in: /database/seeders/PostsTableSeeder.php
```
public function run()
    {
        $posts = [
            [
                'title' => 'Post One',
                'excerpt' => 'Summary of post one',
                'body' => 'Body of post one',
                'image_path' => 'Empty',
                'is_published' => false,
                'min_to_read' => 2,
            ],
            [
                'title' => 'Post Two',
                'excerpt' => 'Summary of post two',
                'body' => 'Body of post two',
                'image_path' => 'Empty',
                'is_published' => false,
                'min_to_read' => 3,
            ]
        ];

        foreach($posts as $key => $value) {
            Post::create($value);
        }
    }
```
5. Run the seeds from: /database/seeders/DatabaseSeeder.php
```
public function run()
    {
        $this->call(PostsTableSeeder::class);
    }
```
6. Clear database: ```php artisan migrate:reset```
7. Run migration with the seeds: ```php artisan migrate --seed```
8. Run only seeds data: ```php artisan db:seed```

### DB factory data:
[Laravel Database factories](https://youtu.be/Opy6yBDTkhM)

1. Make a new factory to posts: ```php artisan make:factory PostFactory```
2. Factory path: /database/factories/PostFactory.php
3. Define keyvalue pairs:
```
public function definition()
    {
        return [
            'title' => $this->faker->unique()->sentence(),
            'excerpt' => $this->faker->realText($maxNbChars = 50),
            'body' => $this->faker->text(),
            'image_path' => $this->faker->imageUrl(640, 480),
            'is_published' => 1,
            'min_to_read' => $this->faker->numberBetween(1, 10)
        ];
    }

```
3. Add the factory method in DatabaseSeeder.php: ```Post::factory(100)->create();```
4. Run the seed command: ```php artisan db:seed```

### Query builder
```
   // Select by id
   $posts = DB::select('SELECT * FROM posts WHERE id = :id', ['id' => 1]);

    // Insert new post
    $posts = DB::insert('INSERT INTO posts 
        (title, excerpt, body, image_path, is_published, min_to_read) 
        VALUES(?, ?, ?, ?, ?, ?)', ['Test2', 'test', 'test', 'test', true, 1]);

    // Update post
    $posts = DB::update('UPDATE posts set body = ? where id = ?', ['Body 3', 101]);

    // Delete posts
    $posts = DB::delete('DELETE FROM posts where id = ?', [101]);

    // Changing operations
    $posts = DB::table('posts')
        //->distinct() // Selecting unique values
        //->whereNotNull('excerpt')
        //->whereNull('excerpt')
        //->whereIn('min_to_read', [2, 6, 8])
        //->whereNotBetween('min_to_read', [2,6])
        //->whereBetween('min_to_read', [2,6])
        //->where('is_published', true)
        //->where('id', '>', 50)
        //->orderBy('id','desc') // asc by default
        //->select('min_to_read')
        //->skip(10) // skip the first 10 values
        //->take(5) // take 5 after
        //->inRandomOrder()
        ->get();

    $posts = DB::table('posts')
        ->where('id', 10)
        ->first();
        //     ->find(100);

    // Return specific post
    $posts = DB::table('posts')
        ->where('id', 100)
        ->value('body');

    // Count columns
    $posts = DB::table('posts')
        ->where('id', '>', 50)
         ->count();

    // Max value
    $posts = DB::table('posts')
        ->max('min_to_read');

    // Min value
    $posts = DB::table('posts')
       ->min('min_to_read');

    // AVg value
    $posts = DB::table('posts')
       ->avg('min_to_read');
```

## All artisan commands

```
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

```
# laravel-multi-memcached

Use multiple Memcached servers in your Laravel project directly from your .env file.

## Installation
Install the package in your project
```bash
$ composer require fsavina/laravel-multi-memcached
```

## Usage
In your `config/cache.php` file, change to Memcached server configuration calling the provided helper function `laravel_memcached_servers`:
```php
'memcached' => [
  'driver' => 'memcached',
  'persistent_id' => env('MEMCACHED_PERSISTENT_ID'),
  [...]
  'servers' => laravel_memcached_servers ()
]
```

## Configuration
In your `.env` file add the following variables:
```env
#comma-separated list of Memcached servers
MEMCACHED_HOST=my.first.memcached.server.com@100,my.second.memcached.server.com:11222@90

#optional - default Memcached port
MEMCACHED_PORT=11211
```

For every provided server you can specify:
*   the *port*: use the standard format `:11211`, following the host name
*   the *weight*: use the format `@90` following the host name and the port (if present)

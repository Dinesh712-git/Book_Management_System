<?php return array (
  'app' => 
  array (
    'name' => 'Laravel',
    'env' => 'local',
    'debug' => true,
    'url' => 'http://localhost',
    'asset_url' => '/',
    'timezone' => 'UTC',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'faker_locale' => 'en_US',
    'key' => 'base64:nhZWTIzZp8snrBLVPhTbnILXvqR2UMKiPo8jAcf3Fmw=',
    'cipher' => 'AES-256-CBC',
    'maintenance' => 
    array (
      'driver' => 'file',
    ),
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      15 => 'Illuminate\\Queue\\QueueServiceProvider',
      16 => 'Illuminate\\Redis\\RedisServiceProvider',
      17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'App\\Providers\\AppServiceProvider',
      23 => 'App\\Providers\\AuthServiceProvider',
      24 => 'App\\Providers\\EventServiceProvider',
      25 => 'App\\Providers\\RouteServiceProvider',
      26 => 'Barryvdh\\DomPDF\\ServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Arr' => 'Illuminate\\Support\\Arr',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'Date' => 'Illuminate\\Support\\Facades\\Date',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Http' => 'Illuminate\\Support\\Facades\\Http',
      'Js' => 'Illuminate\\Support\\Js',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Number' => 'Illuminate\\Support\\Number',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Process' => 'Illuminate\\Support\\Facades\\Process',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'RateLimiter' => 'Illuminate\\Support\\Facades\\RateLimiter',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'Str' => 'Illuminate\\Support\\Str',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Vite' => 'Illuminate\\Support\\Facades\\Vite',
      'PDF' => 'Barryvdh\\DomPDF\\Facade',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'sanctum' => 
      array (
        'driver' => 'sanctum',
        'provider' => NULL,
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\User',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_reset_tokens',
        'expire' => 60,
        'throttle' => 60,
      ),
    ),
    'password_timeout' => 10800,
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '',
        'secret' => '',
        'app_id' => '',
        'options' => 
        array (
          'host' => 'api-mt1.pusher.com',
          'port' => '443',
          'scheme' => 'https',
          'encrypted' => true,
          'useTLS' => true,
        ),
        'client_options' => 
        array (
        ),
      ),
      'ably' => 
      array (
        'driver' => 'ably',
        'key' => NULL,
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'file',
    'stores' => 
    array (
      'apc' => 
      array (
        'driver' => 'apc',
      ),
      'array' => 
      array (
        'driver' => 'array',
        'serialize' => false,
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
        'lock_connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => 'F:\\JOB_Project\\BOOK-MANAGEMENT-SYSTEM\\storage\\framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'cache',
        'lock_connection' => 'default',
      ),
      'dynamodb' => 
      array (
        'driver' => 'dynamodb',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'table' => 'cache',
        'endpoint' => NULL,
      ),
      'octane' => 
      array (
        'driver' => 'octane',
      ),
    ),
    'prefix' => 'laravel_cache_',
  ),
  'cors' => 
  array (
    'paths' => 
    array (
      0 => 'api/*',
      1 => 'sanctum/csrf-cookie',
    ),
    'allowed_methods' => 
    array (
      0 => '*',
    ),
    'allowed_origins' => 
    array (
      0 => '*',
    ),
    'allowed_origins_patterns' => 
    array (
    ),
    'allowed_headers' => 
    array (
      0 => '*',
    ),
    'exposed_headers' => 
    array (
    ),
    'max_age' => 0,
    'supports_credentials' => false,
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'url' => NULL,
        'database' => 'bms',
        'prefix' => '',
        'foreign_key_constraints' => true,
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'bms',
        'username' => 'root',
        'password' => '',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'bms',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
        'search_path' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'bms',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'client' => 'phpredis',
      'options' => 
      array (
        'cluster' => 'redis',
        'prefix' => 'laravel_database_',
      ),
      'default' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '0',
      ),
      'cache' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '1',
      ),
    ),
  ),
  'dompdf' => 
  array (
    'show_warnings' => false,
    'public_path' => NULL,
    'convert_entities' => true,
    'options' => 
    array (
      'font_dir' => 'F:\\JOB_Project\\BOOK-MANAGEMENT-SYSTEM\\storage\\fonts',
      'font_cache' => 'F:\\JOB_Project\\BOOK-MANAGEMENT-SYSTEM\\storage\\fonts',
      'temp_dir' => 'C:\\Users\\user\\AppData\\Local\\Temp',
      'chroot' => 'F:\\JOB_Project\\BOOK-MANAGEMENT-SYSTEM',
      'allowed_protocols' => 
      array (
        'file://' => 
        array (
          'rules' => 
          array (
          ),
        ),
        'http://' => 
        array (
          'rules' => 
          array (
          ),
        ),
        'https://' => 
        array (
          'rules' => 
          array (
          ),
        ),
      ),
      'log_output_file' => NULL,
      'enable_font_subsetting' => false,
      'pdf_backend' => 'CPDF',
      'default_media_type' => 'screen',
      'default_paper_size' => 'a4',
      'default_paper_orientation' => 'portrait',
      'default_font' => 'serif',
      'dpi' => 96,
      'enable_php' => false,
      'enable_javascript' => true,
      'enable_remote' => true,
      'font_height_ratio' => 1.1,
      'enable_html5_parser' => true,
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => 'F:\\JOB_Project\\BOOK-MANAGEMENT-SYSTEM\\storage\\app',
        'throw' => false,
      ),
      'image' => 
      array (
        'driver' => 'local',
        'root' => 'F:\\JOB_Project\\BOOK-MANAGEMENT-SYSTEM\\public\\uploads/images',
      ),
      'attachment' => 
      array (
        'driver' => 'local',
        'root' => 'F:\\JOB_Project\\BOOK-MANAGEMENT-SYSTEM\\public\\uploads/attachment',
      ),
      'video' => 
      array (
        'driver' => 'local',
        'root' => 'F:\\JOB_Project\\BOOK-MANAGEMENT-SYSTEM\\public\\uploads/video',
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => 'F:\\JOB_Project\\BOOK-MANAGEMENT-SYSTEM\\storage\\app/public',
        'url' => 'http://localhost/storage',
        'visibility' => 'public',
        'throw' => false,
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'bucket' => '',
        'url' => NULL,
        'endpoint' => NULL,
        'use_path_style_endpoint' => false,
        'throw' => false,
      ),
    ),
    'links' => 
    array (
      'F:\\JOB_Project\\BOOK-MANAGEMENT-SYSTEM\\public\\storage' => 'F:\\JOB_Project\\BOOK-MANAGEMENT-SYSTEM\\storage\\app/public',
    ),
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => 10,
    ),
    'argon' => 
    array (
      'memory' => 65536,
      'threads' => 1,
      'time' => 4,
    ),
  ),
  'logging' => 
  array (
    'default' => 'stack',
    'deprecations' => 
    array (
      'channel' => NULL,
      'trace' => false,
    ),
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'single',
        ),
        'ignore_exceptions' => false,
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => 'F:\\JOB_Project\\BOOK-MANAGEMENT-SYSTEM\\storage\\logs/laravel.log',
        'level' => 'debug',
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => 'F:\\JOB_Project\\BOOK-MANAGEMENT-SYSTEM\\storage\\logs/laravel.log',
        'level' => 'debug',
        'days' => 14,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'debug',
      ),
      'papertrail' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\SyslogUdpHandler',
        'handler_with' => 
        array (
          'host' => NULL,
          'port' => NULL,
          'connectionString' => 'tls://:',
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'formatter' => NULL,
        'with' => 
        array (
          'stream' => 'php://stderr',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
      ),
      'null' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\NullHandler',
      ),
      'emergency' => 
      array (
        'path' => 'F:\\JOB_Project\\BOOK-MANAGEMENT-SYSTEM\\storage\\logs/laravel.log',
      ),
    ),
  ),
  'mail' => 
  array (
    'default' => 'smtp',
    'mailers' => 
    array (
      'smtp' => 
      array (
        'transport' => 'smtp',
        'host' => 'mailpit',
        'port' => '1025',
        'encryption' => NULL,
        'username' => NULL,
        'password' => NULL,
        'timeout' => NULL,
        'local_domain' => NULL,
      ),
      'ses' => 
      array (
        'transport' => 'ses',
      ),
      'mailgun' => 
      array (
        'transport' => 'mailgun',
      ),
      'postmark' => 
      array (
        'transport' => 'postmark',
      ),
      'sendmail' => 
      array (
        'transport' => 'sendmail',
        'path' => '/usr/sbin/sendmail -bs -i',
      ),
      'log' => 
      array (
        'transport' => 'log',
        'channel' => NULL,
      ),
      'array' => 
      array (
        'transport' => 'array',
      ),
      'failover' => 
      array (
        'transport' => 'failover',
        'mailers' => 
        array (
          0 => 'smtp',
          1 => 'log',
        ),
      ),
    ),
    'from' => 
    array (
      'address' => 'hello@example.com',
      'name' => 'Laravel',
    ),
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => 'F:\\JOB_Project\\BOOK-MANAGEMENT-SYSTEM\\resources\\views/vendor/mail',
      ),
    ),
  ),
  'queue' => 
  array (
    'default' => 'sync',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
        'after_commit' => false,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => 0,
        'after_commit' => false,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => '',
        'secret' => '',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'default',
        'suffix' => NULL,
        'region' => 'us-east-1',
        'after_commit' => false,
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
        'after_commit' => false,
      ),
    ),
    'failed' => 
    array (
      'driver' => 'database-uuids',
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'sanctum' => 
  array (
    'stateful' => 
    array (
      0 => 'localhost',
      1 => 'localhost:3000',
      2 => '127.0.0.1',
      3 => '127.0.0.1:8000',
      4 => '::1',
      5 => 'localhost',
    ),
    'guard' => 
    array (
      0 => 'web',
    ),
    'expiration' => NULL,
    'token_prefix' => '',
    'middleware' => 
    array (
      'verify_csrf_token' => 'App\\Http\\Middleware\\VerifyCsrfToken',
      'encrypt_cookies' => 'App\\Http\\Middleware\\EncryptCookies',
    ),
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => NULL,
      'endpoint' => 'api.mailgun.net',
      'scheme' => 'https',
    ),
    'postmark' => 
    array (
      'token' => NULL,
    ),
    'ses' => 
    array (
      'key' => '',
      'secret' => '',
      'region' => 'us-east-1',
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => '120',
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => 'F:\\JOB_Project\\BOOK-MANAGEMENT-SYSTEM\\storage\\framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'laravel_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => NULL,
    'http_only' => true,
    'same_site' => 'lax',
  ),
  'site-specific' => 
  array (
    'google-font-css' => 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback',
    'all-min-css' => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css',
    'icon-min-css' => 'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
    'all-min-css2' => '/assets/back-end/default/plugins/fontawesome-free/css/all.min.css',
    'tempusdominus-bootstrap-min-css' => '/assets/back-end/default/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
    'icheck-bootstrap-min-css' => '/assets/back-end/default/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
    'jqvmap-min-css' => '/assets/back-end/default/plugins/jqvmap/jqvmap.min.css',
    'adminlte-min-css' => '/assets/back-end/default/dist/css/adminlte.min.css',
    'OverlayScrollbars-min-css' => '/assets/back-end/default/plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
    'daterangepicker-min-css' => '/assets/back-end/default/plugins/daterangepicker/daterangepicker.css',
    'summernote-min-css' => '/assets/back-end/default/plugins/summernote/summernote-bs4.min.css',
    'sweetalert-css' => '/assets/back-end/default/plugins/sweetalert2/sweetalert2.min.css',
    'toastr-css' => '/assets/back-end/default/plugins/toastr/toastr.min.css',
    'select2-css' => '/assets/back-end/default/plugins/select2/css/select2.min.css',
    'select2-bootstrap4-css' => '/assets/back-end/default/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css',
    'datatable-bootstrap-min-css' => '/assets/back-end/default/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
    'responsive-bootstrap-min-css' => '/assets/back-end/default/plugins/datatables-responsive/css/responsive.bootstrap4.min.css',
    'buttons-bootstrap-min-css' => '/assets/back-end/default/plugins/datatables-buttons/css/buttons.bootstrap4.min.css',
    'datatable-select-min-css' => 'https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css',
    'cropper-min-css' => 'https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.0.0-rc.1/cropper.min.css',
    'codemirror-min-css' => 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/codemirror.min.css',
    'custom-css' => '/assets/back-end/custom/css/custom.css?v=5',
    'dropify-css' => '/assets/back-end/custom/css/dropify.css',
    'jquery-min-js' => '/assets/back-end/default/plugins/jquery/jquery.min.js',
    'jquery-ui-min-js' => '/assets/back-end/default/plugins/jquery-ui/jquery-ui.min.js',
    'bootstrap-bundle-min-js' => '/assets/back-end/default/plugins/bootstrap/js/bootstrap.bundle.min.js',
    'Chart-min-js' => '/assets/back-end/default/plugins/chart.js/Chart.min.js',
    'sparkline-min-js' => '/assets/back-end/default/plugins/sparklines/sparkline.js',
    'jquery-vmap-min-js' => '/assets/back-end/default/plugins/jqvmap/jquery.vmap.min.js',
    'jquery-vmap-usa-min-js' => '/assets/back-end/default/plugins/jqvmap/maps/jquery.vmap.usa.js',
    'jquery-knob-min-js' => '/assets/back-end/default/plugins/jquery-knob/jquery.knob.min.js',
    'moment-min-js' => '/assets/back-end/default/plugins/moment/moment.min.js',
    'daterangepicker-min-js' => '/assets/back-end/default/plugins/daterangepicker/daterangepicker.js',
    'tempusdominus-bootstrap-min-js' => '/assets/back-end/default/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
    'summernote-min-js' => '/assets/back-end/default/plugins/summernote/summernote-bs4.min.js',
    'jquery-overlayScrollbars-min-js' => '/assets/back-end/default/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
    'adminlte-min-js' => '/assets/back-end/default/dist/js/adminlte.js',
    'dashboard-min-js' => '/assets/back-end/default/dist/js/pages/dashboard.js',
    'sweetalert2-js' => '/assets/back-end/default/plugins/sweetalert2/sweetalert2.min.js',
    'toastr-js' => '/assets/back-end/default/plugins/toastr/toastr.min.js',
    'select2-js' => '/assets/back-end/default/plugins/select2/js/select2.full.min.js',
    'tooltip-core' => 'https://cdn.jsdelivr.net/npm/@floating-ui/core@1.6.0',
    'tooltip-dom' => 'https://cdn.jsdelivr.net/npm/@floating-ui/dom@1.6.3',
    'jquery-validate-js' => 'https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js',
    'additional-methods-js' => 'https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js',
    'codemirror-min-js' => 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/codemirror.min.js',
    'codemirror-htmlmixed-js' => 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/mode/htmlmixed/htmlmixed.min.js',
    'form-validation-init-js' => '/assets/back-end/custom/js/form-validation-init.js?v=5',
    'dropify-init-js' => '/assets/back-end/custom/js/dropify.js',
    'jquery-datatable-min-js' => '/assets/back-end/default/plugins/datatables/jquery.dataTables.min.js',
    'datatable-bootstrap-min-js' => '/assets/back-end/default/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
    'datatable-responsive-min-js' => '/assets/back-end/default/plugins/datatables-responsive/js/dataTables.responsive.min.js',
    'responsive-bootstrap-min-js' => '/assets/back-end/default/plugins/datatables-responsive/js/responsive.bootstrap4.min.js',
    'datatable-buttons-min-js' => '/assets/back-end/default/plugins/datatables-buttons/js/dataTables.buttons.min.js',
    'buttons-bootstrap-min-js' => '/assets/back-end/default/plugins/datatables-buttons/js/buttons.bootstrap4.min.js',
    'jszip-min-js' => '/assets/back-end/default/plugins/jszip/.min.js',
    'pdfmake-min-js' => '/assets/back-end/default/plugins/pdfmake/pdfmake.min.js',
    'vfs_fonts-min-js' => '/assets/back-end/default/plugins/pdfmake/vfs_fonts.js',
    'buttons-html5-min-js' => '/assets/back-end/default/plugins/datatables-buttons/js/buttons.html5.min.js',
    'buttons-print-min-js' => '/assets/back-end/default/plugins/datatables-buttons/js/buttons.print.min.js',
    'buttons-colvis-min-js' => '/assets/back-end/default/plugins/datatables-buttons/js/buttons.colVis.min.js',
    'datatable-select-min-js' => 'https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js',
    'user-roll-init-js' => '/assets/back-end/custom/js/user-roll-init.js?v=5',
    'edit-user-roll-init-js' => '/assets/back-end/custom/js/edit-user-roll-init.js?v=5',
    'user-init-js' => '/assets/back-end/custom/js/user-init.js?v=5',
    'vehical-type-init-js' => '/assets/back-end/custom/js/vehical-type-init.js?v=5',
    'vehical-init-js' => '/assets/back-end/custom/js/vehical-init.js?v=5',
    'cropper-min-init-js' => 'https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.0.0-rc.1/cropper.min.js',
    'create-driver-init-js' => '/assets/back-end/custom/js/create-driver-init.js?v=5',
    'room-type-init-js' => '/assets/back-end/custom/js/room-type-init.js?v=5',
    'basis-init-js' => '/assets/back-end/custom/js/basis-init.js?v=5',
    'room-category-init-js' => '/assets/back-end/custom/js/room-category-init.js?v=5',
    'create-hotel-init-js' => '/assets/back-end/custom/js/create-hotel-init.js?v=5',
    'update-hotel-init-js' => '/assets/back-end/custom/js/update-hotel-init.js?v=5',
    'hotel-cities-init-js' => '/assets/back-end/custom/js/hotel-cities-init.js?v=5',
    'hotels-init-js' => '/assets/back-end/custom/js/hotels-init.js?v=5',
    'country-init-js' => '/assets/back-end/custom/js/country-init.js?v=5',
    'nationality-init-js' => '/assets/back-end/custom/js/nationality-init.js?v=5',
    'guide-init-js' => '/assets/back-end/custom/js/guide-init.js?v=5',
    'guide-register-init-js' => '/assets/back-end/custom/js/guide-register-init.js?v=5',
    'agent-init-js' => '/assets/back-end/custom/js/agent-init.js?v=5',
    'tour-list-init-js' => '/assets/back-end/custom/js/tour-list-init.js?v=5',
    'tour-schedule-init-js' => '/assets/back-end/custom/js/tour-schedule-init.js?v=5',
    'tour-schedule-for-hotel-init-js' => '/assets/back-end/custom/js/tour-schedule-for-hotel-init.js?v=5',
    'assign-franchise-init-js' => '/assets/back-end/custom/js/assign-franchise-init.js?v=5',
    'assign-franchise-from-transport-init-js' => '/assets/back-end/custom/js/assign-franchise-from-transport-init.js?v=5',
    'transport-tour-list-init-js' => '/assets/back-end/custom/js/transport-tour-list-init.js?v=5',
    'hotel-tour-list-init-js' => '/assets/back-end/custom/js/hotel-tour-list-init.js?v=5',
    'site-settings-init-js' => '/assets/back-end/custom/js/site-settings-init.js?v=5',
    'edit-driver-init-js' => '/assets/back-end/custom/js/edit-driver-init.js?v=5',
    'edit-tour-init-js' => '/assets/back-end/custom/js/edit-tour-init.js?v=5',
    'member-init-js' => '/assets/back-end/custom/js/member-init.js?v=5',
    'getReturn-init-js' => '/assets/back-end/custom/js/getReturn-init.js?v=5',
    'book-category-init-js' => '/assets/back-end/custom/js/book-category-init.js?v=5',
    'book-init-js' => '/assets/back-end/custom/js/book-init.js?v=5',
    'live-path' => '',
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => 'F:\\JOB_Project\\BOOK-MANAGEMENT-SYSTEM\\resources\\views',
    ),
    'compiled' => 'F:\\JOB_Project\\BOOK-MANAGEMENT-SYSTEM\\storage\\framework\\views',
  ),
  'flare' => 
  array (
    'key' => NULL,
    'flare_middleware' => 
    array (
      0 => 'Spatie\\FlareClient\\FlareMiddleware\\RemoveRequestIp',
      1 => 'Spatie\\FlareClient\\FlareMiddleware\\AddGitInformation',
      2 => 'Spatie\\LaravelIgnition\\FlareMiddleware\\AddNotifierName',
      3 => 'Spatie\\LaravelIgnition\\FlareMiddleware\\AddEnvironmentInformation',
      4 => 'Spatie\\LaravelIgnition\\FlareMiddleware\\AddExceptionInformation',
      5 => 'Spatie\\LaravelIgnition\\FlareMiddleware\\AddDumps',
      'Spatie\\LaravelIgnition\\FlareMiddleware\\AddLogs' => 
      array (
        'maximum_number_of_collected_logs' => 200,
      ),
      'Spatie\\LaravelIgnition\\FlareMiddleware\\AddQueries' => 
      array (
        'maximum_number_of_collected_queries' => 200,
        'report_query_bindings' => true,
      ),
      'Spatie\\LaravelIgnition\\FlareMiddleware\\AddJobs' => 
      array (
        'max_chained_job_reporting_depth' => 5,
      ),
      'Spatie\\FlareClient\\FlareMiddleware\\CensorRequestBodyFields' => 
      array (
        'censor_fields' => 
        array (
          0 => 'password',
          1 => 'password_confirmation',
        ),
      ),
      'Spatie\\FlareClient\\FlareMiddleware\\CensorRequestHeaders' => 
      array (
        'headers' => 
        array (
          0 => 'API-KEY',
          1 => 'Authorization',
          2 => 'Cookie',
          3 => 'Set-Cookie',
          4 => 'X-CSRF-TOKEN',
          5 => 'X-XSRF-TOKEN',
        ),
      ),
    ),
    'send_logs_as_events' => true,
  ),
  'ignition' => 
  array (
    'editor' => 'phpstorm',
    'theme' => 'auto',
    'enable_share_button' => true,
    'register_commands' => false,
    'solution_providers' => 
    array (
      0 => 'Spatie\\Ignition\\Solutions\\SolutionProviders\\BadMethodCallSolutionProvider',
      1 => 'Spatie\\Ignition\\Solutions\\SolutionProviders\\MergeConflictSolutionProvider',
      2 => 'Spatie\\Ignition\\Solutions\\SolutionProviders\\UndefinedPropertySolutionProvider',
      3 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\IncorrectValetDbCredentialsSolutionProvider',
      4 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingAppKeySolutionProvider',
      5 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\DefaultDbNameSolutionProvider',
      6 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\TableNotFoundSolutionProvider',
      7 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingImportSolutionProvider',
      8 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\InvalidRouteActionSolutionProvider',
      9 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\ViewNotFoundSolutionProvider',
      10 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\RunningLaravelDuskInProductionProvider',
      11 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingColumnSolutionProvider',
      12 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\UnknownValidationSolutionProvider',
      13 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingMixManifestSolutionProvider',
      14 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingViteManifestSolutionProvider',
      15 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingLivewireComponentSolutionProvider',
      16 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\UndefinedViewVariableSolutionProvider',
      17 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\GenericLaravelExceptionSolutionProvider',
      18 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\OpenAiSolutionProvider',
      19 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\SailNetworkSolutionProvider',
    ),
    'ignored_solution_providers' => 
    array (
    ),
    'enable_runnable_solutions' => NULL,
    'remote_sites_path' => 'F:\\JOB_Project\\BOOK-MANAGEMENT-SYSTEM',
    'local_sites_path' => '',
    'housekeeping_endpoint_prefix' => '_ignition',
    'settings_file_path' => '',
    'recorders' => 
    array (
      0 => 'Spatie\\LaravelIgnition\\Recorders\\DumpRecorder\\DumpRecorder',
      1 => 'Spatie\\LaravelIgnition\\Recorders\\JobRecorder\\JobRecorder',
      2 => 'Spatie\\LaravelIgnition\\Recorders\\LogRecorder\\LogRecorder',
      3 => 'Spatie\\LaravelIgnition\\Recorders\\QueryRecorder\\QueryRecorder',
    ),
    'open_ai_key' => NULL,
    'with_stack_frame_arguments' => true,
    'argument_reducers' => 
    array (
      0 => 'Spatie\\Backtrace\\Arguments\\Reducers\\BaseTypeArgumentReducer',
      1 => 'Spatie\\Backtrace\\Arguments\\Reducers\\ArrayArgumentReducer',
      2 => 'Spatie\\Backtrace\\Arguments\\Reducers\\StdClassArgumentReducer',
      3 => 'Spatie\\Backtrace\\Arguments\\Reducers\\EnumArgumentReducer',
      4 => 'Spatie\\Backtrace\\Arguments\\Reducers\\ClosureArgumentReducer',
      5 => 'Spatie\\Backtrace\\Arguments\\Reducers\\DateTimeArgumentReducer',
      6 => 'Spatie\\Backtrace\\Arguments\\Reducers\\DateTimeZoneArgumentReducer',
      7 => 'Spatie\\Backtrace\\Arguments\\Reducers\\SymphonyRequestArgumentReducer',
      8 => 'Spatie\\LaravelIgnition\\ArgumentReducers\\ModelArgumentReducer',
      9 => 'Spatie\\LaravelIgnition\\ArgumentReducers\\CollectionArgumentReducer',
      10 => 'Spatie\\Backtrace\\Arguments\\Reducers\\StringableArgumentReducer',
    ),
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'alias' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
  ),
);

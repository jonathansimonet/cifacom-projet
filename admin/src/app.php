<?php

class queryData {
    public $start;
    public $recordsTotal;
    public $recordsFiltered;
    public $data;

    function queryData() {
    }
}

use Silex\Application;
use Silex\Provider;

//
// Application setup
//

$app = new Application();
$app->register(new Provider\DoctrineServiceProvider());
$app->register(new Provider\SecurityServiceProvider());
$app->register(new Provider\RememberMeServiceProvider());
$app->register(new Provider\SessionServiceProvider());
$app->register(new Provider\ServiceControllerServiceProvider());
$app->register(new Silex\Provider\FormServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'translator.messages' => array(),
));
$app->register(new Silex\Provider\ValidatorServiceProvider());
$app->register(new Provider\UrlGeneratorServiceProvider());
$app->register(new Provider\TwigServiceProvider());
$app->register(new Provider\SwiftmailerServiceProvider());

// Register the SimpleUser service provider.
$simpleUserProvider = new SimpleUser\UserServiceProvider();
$app->register($simpleUserProvider);

//
// Controllers
//

$app->mount('/user', $simpleUserProvider);


//
// Routes
//
require_once __DIR__.'/../web/controllers/modules/index.php';
require_once __DIR__.'/../web/controllers/projets/index.php';
require_once __DIR__.'/../web/controllers/students/index.php';

$app->match('/', function () use ($app) {
    return $app['twig']->render('ag_dashboard.html.twig', array());
})
    ->bind('dashboard');

//
// Configuration
//
// Normally I'd put this stuff in config/prod.php and include it from index.php,
// but for the sake of demonstration it's easier to see it all here in one file.
//

$app['twig.path'] = array(__DIR__.'/../templates');
$app['twig.options'] = array('cache' => __DIR__.'/../var/cache/twig');

$app['security.firewalls'] = array(

    // Ensure that the login page is accessible to all
    'login' => array(
        'pattern' => '^/user/login$',
    ),
    'secured_area' => array(
        'pattern' => '^.*$',
        'anonymous' => false,
        'remember_me' => array(),
        'form' => array(
            'login_path' => '/user/login',
            'check_path' => '/user/login_check',
        ),
        'logout' => array(
            'logout_path' => '/user/logout',
        ),
        'users' => $app->share(function($app) { return $app['user.manager']; }),
    ),
);

$app['user.options'] = array(
    'templates' => array(
        'login' => 'login.html.twig',
        'forgot-password' => '/users/forgot-password.html.twig',
        'register' => '/users/create.html.twig',
        'view' => '/users/view.html.twig',
        'edit' => '/users/edit.html.twig',
        'list' => '/users/list.html.twig',
    ),
    'mailer' => array('enabled' => false),
    'editCustomFields' => array('twitterUsername' => 'Twitter username'),
    'userClass' => '\Demo\User',
);

// Example of defining a custom password strength validator.
// Must return an error string on failure, or null on success.
$app['user.passwordStrengthValidator'] = $app->protect(function(SimpleUser\User $user, $password) {
    if (strlen($password) < 8) {
        return 'Votre mot de passe doit contenir au moins 8 caractères.';
    }
    if (strtolower($password) == strtolower($user->getName())) {
        return 'Votre mot de passe ne peut pas être le même que votre nom.';
    }
});

// Note that this db config is here for example only.
// It actually gets overwritten by configuration in config/local.php,
// which I don't commit to version control.
$app['db.options'] = array(
    'driver'   => 'pdo_mysql',
    'host' => 'localhost',
    'dbname' => 'mydbname',
    'user' => 'mydbuser',
    'password' => 'mydbpassword',
);

$app['asset_path'] = 'http://'. $_SERVER['HTTP_HOST']. '/silex-simpleuser/admin/web/resources';

// Local environment configuration that doesn't get committed to version control.
require __DIR__ . '/../config/local.php';

$app['usr_search_names_foreigner_key'] = array();

return $app;

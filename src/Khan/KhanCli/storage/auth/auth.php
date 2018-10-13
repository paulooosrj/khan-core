
    Router::get('/login', function ($req, $res) {
        $res->render('login.html');
    });

    Router::get('/register', function ($req, $res) {
        $res->render('register.html');
    });

    Router::group('/painel', function ($route) {

        $route::get('/', function ($req, $res) {
            $res->render('painel.html', [
                "nome" => $_SESSION['name'],
                "img" => str_replace('public/', '', $_SESSION['icone']),
            ]);
        })->middleware('Middlewares\CheckLogin');

        $route::get('/logout', 'Controllers\AuthController->logout')
            ->middleware('Middlewares\CheckLogin');

    });

    Router::post('/auth/register', 'Controllers\AuthController->register');

    Router::post('/auth/login', 'Controllers\AuthController->login');



	Router::get('/chat', function($req, $res){
		$res->render('chat.html', []);
	});
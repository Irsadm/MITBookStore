<?php 

namespace MBS\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class HomeController extends BaseController
{

	public function index(Request $request, Response $response)
	{
		return $this->view->render($response, 'front-end/home.twig');
	}
}
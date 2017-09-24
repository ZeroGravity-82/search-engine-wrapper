<?php

namespace App\Controllers;

use App\Domain\SearchEngine\EngineSearchFactory;

/**
 * Class WelcomeControoler
 * @package App\Controllers
 */
class SearchController extends Controller
{
    public function index()
    {
        $config = require(APP_PATH . '/../config/engines.php');
        $this->view->assign('config', $config);
        $this->view->render('start.php');
    }

    public function search()
    {
        $name = $_REQUEST['engine'];
        $config = require(APP_PATH . '/../config/engines.php');
        $searchEngine = EngineSearchFactory::create($name, $config);

        $query = $_REQUEST['query'];
        if(empty($query)) {                             // Empty search queries are not allowed, but better way
            $this->view->assign('config', $config);     // is to handle this with JavaScript.
            $this->view->render('start.php');
            return;
        }

        $results = $searchEngine->find($query);
        $this->view->assign('engineFullName', $config['engines'][$name]['full_name']);
        $this->view->assign('query', $query);
        $this->view->assign('results', $results);
        $this->view->render('results.php');
    }
}

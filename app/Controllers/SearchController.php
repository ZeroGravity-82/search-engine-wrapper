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
        $engine = $_REQUEST['engine'];
        $config = require(APP_PATH . '/../config/engines.php');
        $searchEngine = EngineSearchFactory::create($engine, $config);

        $query = $_REQUEST['query'];
        $results = $searchEngine->find($query);

        $this->view->assign('results', $results);
        $this->view->render('results.php');
    }
}

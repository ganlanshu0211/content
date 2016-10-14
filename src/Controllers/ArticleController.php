<?php
/**
 * This file is part of Notadd.
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2016, iBenchu.org
 * @datetime 2016-10-08 17:26
 */
namespace Notadd\Content\Controllers;
use Notadd\Content\Managers\ArticleManager;
use Notadd\Foundation\Routing\Abstracts\Controller;
/**
 * Class ArticleController
 * @package Notadd\Content\Controllers
 */
class ArticleController extends Controller {
    /**
     * @param \Notadd\Content\Managers\ArticleManager $manager
     * @return \Illuminate\Contracts\View\View
     */
    public function index(ArticleManager $manager) {
        return $this->view('');
    }
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id) {
        return $this->view('');
    }
}
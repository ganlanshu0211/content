<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, notadd.com
 * @datetime 2017-05-31 20:42
 */
namespace Notadd\Content\Listeners;

use Notadd\Content\Entities\Article;
use Notadd\Content\Entities\ArticleCategory;
use Notadd\Content\Entities\ArticleDraft;
use Notadd\Content\Entities\Page;
use Notadd\Content\Entities\PageCategory;
use Notadd\Foundation\Flow\Abstracts\FlowRegister as AbstractFlowRegister;

/**
 * Class FlowRegister.
 */
class FlowRegister extends AbstractFlowRegister
{
    /**
     * @var array
     */
    protected $definitions = [
    ];

    /**
     * Register flow or flows.
     */
    public function handle()
    {
        $this->flow->register(Article::class);
        $this->flow->register(ArticleCategory::class);
        $this->flow->register(ArticleDraft::class);
        $this->flow->register(Page::class);
        $this->flow->register(PageCategory::class);
    }
}

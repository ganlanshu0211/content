<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2016, iBenchu.org
 * @datetime 2016-11-25 15:18
 */
namespace Notadd\Content\Handlers\Article\Type;

use Illuminate\Container\Container;
use Notadd\Content\Models\ArticleType;
use Notadd\Foundation\Passport\Abstracts\SetHandler;

/**
 * Class ArticleTypeEditHandler.
 */
class EditHandler extends SetHandler
{
    /**
     * ArticleTypeEditorHandler constructor.
     *
     * @param \Notadd\Content\Models\ArticleType $articleType
     * @param \Illuminate\Container\Container    $container
     */
    public function __construct(
        ArticleType $articleType,
        Container $container
    ) {
        parent::__construct($container);
        $this->model = $articleType;
    }

    /**
     * Http code.
     *
     * @return int
     */
    public function code()
    {
        return 200;
    }

    /**
     * Errors for handler.
     *
     * @return array
     */
    public function errors()
    {
        return [
            $this->translator->trans('content::article_type.update.fail'),
        ];
    }

    /**
     * Execute Handler.
     *
     * @return bool
     */
    public function execute()
    {
        $articleType = $this->model->newQuery()->find($this->request->input('id'));
        if ($articleType === null) {
            return false;
        }
        $articleType->update($this->request->all());

        return true;
    }

    /**
     * Messages for handler.
     *
     * @return array
     */
    public function messages()
    {
        return [
            $this->translator->trans('content::article_type.update.success'),
        ];
    }
}

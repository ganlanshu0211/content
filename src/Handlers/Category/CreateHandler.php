<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2016, iBenchu.org
 * @datetime 2016-10-08 17:27
 */
namespace Notadd\Content\Handlers\Category;

use Illuminate\Container\Container;
use Illuminate\Http\Request;
use Illuminate\Translation\Translator;
use Notadd\Content\Models\Category;
use Notadd\Foundation\Passport\Abstracts\SetHandler;

/**
 * Class CategoryHandler.
 */
class CreateHandler extends SetHandler
{
    /**
     * @var int
     */
    protected $id;

    /**
     * CategoryCreatorHandler constructor.
     *
     * @param \Notadd\Content\Models\Category    $category
     * @param \Illuminate\Container\Container    $container
     * @param \Illuminate\Http\Request           $request
     * @param \Illuminate\Translation\Translator $translator
     */
    public function __construct(
        Category $category,
        Container $container,
        Request $request,
        Translator $translator
    ) {
        parent::__construct($container, $request, $translator);
        $this->model = $category;
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
     * Data for handler.
     *
     * @return array
     */
    public function data()
    {
        return $this->model->newQuery()->get();
    }

    /**
     * Errors for handler.
     *
     * @return array
     */
    public function errors()
    {
        return [
            $this->translator->trans('content::category.create.fail'),
        ];
    }

    /**
     * Execute Handler.
     *
     * @return bool
     */
    public function execute()
    {
        $this->id = $this->model->create([
            'title' => $this->request->input('name'),
            'alias' => $this->request->input('alias'),
            'description' => $this->request->input('description'),
            'type' => $this->request->input('type') ?: 'normal',
            'background_color' => $this->request->input('background_color'),
            'seo_title' => $this->request->input('seo_title'),
            'seo_keyword' => $this->request->input('seo_keyword'),
            'seo_description' => $this->request->input('seo_description'),
            'background_image' => $this->request->input('background_image'),
            'top_image' => $this->request->input('top_image'),
            'pagination' => $this->request->input('pagination'),
            'enabled' => $this->request->input('enabled'),
        ]);

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
            $this->translator->trans('content::category.create.success'),
        ];
    }
}
<?php

namespace Isifnet\PieAdmin\Http\Controllers;

use Isifnet\PieAdmin\Admin;
use Isifnet\PieAdmin\Contracts\LazyRenderable;
use Isifnet\PieAdmin\Support\Helper;
use Illuminate\Http\Request;

class RenderableController
{
    public function handle(Request $request)
    {
        $this->initTranslation($request);

        $renderable = $this->newRenderable($request);

        if (method_exists($renderable, 'passesAuthorization') && ! $renderable->passesAuthorization()) {
            return $renderable->failedAuthorization();
        }

        $this->addScript();

        $this->forgetDefaultAssets();

        return $this->render($renderable);
    }

    protected function render(LazyRenderable $renderable)
    {
        $asset = Admin::asset();

        return Helper::render($renderable->render())
            .Admin::html()
            .$asset->jsToHtml()
            .$asset->cssToHtml()
            .$asset->scriptToHtml()
            .$asset->styleToHtml();
    }

    protected function initTranslation(Request $request)
    {
        if ($path = $request->get('_trans_')) {
            Admin::translation($path);
        }
    }

    protected function newRenderable(Request $request): LazyRenderable
    {
        $class = $request->get('renderable');

        $class = str_replace('_', '\\', $class);

        $renderable = new $class();

        $renderable->payload($request->all());

        if (method_exists($renderable, 'requireAssets')) {
            $renderable->requireAssets();
        }

        return $renderable;
    }

    protected function addScript()
    {
        // 等待JS脚本加载完成
        Admin::script('Dcat.wait()', true);
    }

    protected function forgetDefaultAssets()
    {
        Admin::baseJs([], false);
        Admin::baseCss([], false);
        Admin::fonts([]);
    }
}

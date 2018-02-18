<?php
declare(strict_types = 1);

namespace App\Http\Controllers\Frontend\Shop;

use App\Exceptions\News\DoesNotExistException;
use App\Handlers\Frontend\Shop\News\LoadHandler;
use App\Handlers\Frontend\Shop\News\VisitHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Shop\News\LoadRequest;
use App\Services\DateTime\Formatting\Formatter;
use App\Services\Infrastructure\Response\JsonResponse;
use App\Services\Infrastructure\Response\Status;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NewsController extends Controller
{
    public function render(Request $request, VisitHandler $handler, Formatter $formatter)
    {
        try {
            $news = $handler->handle((int)$request->route('id'));

            return view('frontend.shop.news', [
                'news' => $news,
                'formatter' => $formatter
            ]);
        } catch (DoesNotExistException $e) {
            throw new NotFoundHttpException();
        }
    }

    public function load(LoadRequest $request, LoadHandler $handler)
    {
        $items = $handler->load((int) $request->get('portion'));

        return new JsonResponse(Status::SUCCESS, ['items' => $items]);
    }
}

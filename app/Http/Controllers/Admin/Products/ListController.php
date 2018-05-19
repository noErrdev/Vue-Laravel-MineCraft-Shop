<?php
declare(strict_types = 1);

namespace App\Http\Controllers\Admin\Products;

use App\Exceptions\Product\ProductNotFoundException;
use App\Handlers\Admin\Products\DeleteHandler;
use App\Handlers\Admin\Products\ListHandler;
use App\Http\Controllers\Controller;
use function App\permission_middleware;
use App\Services\Auth\Permissions;
use App\Services\Notification\Notifications\Error;
use App\Services\Notification\Notifications\Info;
use App\Services\Response\JsonResponse;
use App\Services\Response\Status;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ListController extends Controller
{
    public function __construct()
    {
        $this->middleware(permission_middleware(Permissions::ADMIN_PRODUCTS_CRUD_ACCESS));
    }

    public function pagination(Request $request, ListHandler $handler): JsonResponse
    {
        $orderBy = $request->get('order_by');
        $descending = (bool)$request->get('descending');
        $search = $request->get('search');
        $perPage = (int)$request->get('per_page');

        $dto = $handler->handle($orderBy, $descending, $search, $perPage);

        return new JsonResponse(Status::SUCCESS, [
            'paginator' => $dto->getPaginator(),
            'products' => $dto->getProducts()
        ]);
    }

    public function delete(Request $request, DeleteHandler $handler): JsonResponse
    {
        try {
            $handler->handle((int)$request->get('product'));

            return (new JsonResponse(Status::SUCCESS))
                ->addNotification(new Info(__('msg.admin.products.delete.success')));
        } catch (ProductNotFoundException $e) {
            return (new JsonResponse('product_not_found'))
                ->setHttpStatus(Response::HTTP_NOT_FOUND)
                ->addNotification(new Error(__('msg.admin.products.delete.not_found')));
        }
    }
}

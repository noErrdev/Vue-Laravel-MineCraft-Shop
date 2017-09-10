<?php
declare(strict_types = 1);

namespace App\Http\Controllers\Admin\News;

use App\DataTransferObjects\Admin\News as DTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SaveEditedNewsRequest;
use App\Repositories\NewsRepository;
use App\Services\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class EditController
 *
 * @author D3lph1 <d3lph1.contact@gmail.com>
 * @package App\Http\Controllers\Admin\News
 */
class EditController extends Controller
{
    /**
     * Render the edit news page.
     */
    public function render(Request $request, NewsRepository $newsRepository): View
    {
        $id = (int)$request->route('id');
        $news = $newsRepository->find($id);

        if (!$news) {
            $this->app->abort(404);
        }

        $data = [
            'currentServer' => $request->get('currentServer'),
            'news' => $news
        ];

        return view('admin.news.edit', $data);
    }

    /**
     * Handle the edit news request.
     */
    public function save(SaveEditedNewsRequest $request, News $news): RedirectResponse
    {
        $dto = new DTO(
            $request->get('news_title'),
            $request->get('news_content')
        );
        $dto->setId((int)$request->route('id'));

        if ($news->update($dto)) {
            $this->msg->success(__('messages.admin.news.edit.success'));

            return response()->redirectToRoute('admin.news.list', ['server' => $request->get('currentServer')->id]);
        }
        $this->msg->danger(__('messages.admin.news.edit.fail'));

        return back();
    }

    /**
     * Remove given news.
     */
    public function remove(Request $request, News $news): RedirectResponse
    {
        $id = (int)$request->route('id');
        if ($news->delete($id)) {
            $this->msg->info(__('messages.admin.news.remove.success'));
        } else {
            $this->msg->danger(__('messages.admin.news.remove.fail'));
        }

        return response()->redirectToRoute('admin.news.list', ['server' => $request->get('currentServer')->id]);
    }
}

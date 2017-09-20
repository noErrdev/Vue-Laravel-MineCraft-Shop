<?php

namespace App\Composers;

use App\Contracts\ComposerContract;
use App\DataTransferObjects\MonitoringPlayers;
use App\Models\Server\ServerInterface;
use App\Repositories\News\NewsRepositoryInterface;
use App\Services\Monitoring\MonitoringInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class ShopLayoutComposer
 * Serves to transfer shared data to a layout.shop template that will be available
 * on each child page of this template.
 *
 * @author D3lph1 <d3lph1.contact@gmail.com>
 *
 * @package App\Composers
 */
class ShopLayoutComposer implements ComposerContract
{
    /**
     * @var Request
     */
    private $request;

    /**
     * Data about current server
     *
     * @var ServerInterface
     */
    private $currentServer;

    /**
     * Data about all enabled servers.
     *
     * @var ServerInterface[]
     */
    private $servers;

    /**
     * @var NewsRepositoryInterface
     */
    private $newsRepository;

    /**
     * @var MonitoringInterface
     */
    private $monitoring;

    public function __construct(Request $request, NewsRepositoryInterface $newsRepository, MonitoringInterface $monitoring)
    {
        $this->request = $request;
        $this->currentServer = $request->get('currentServer');
        $this->servers = $request->get('servers');
        $this->newsRepository = $newsRepository;
        $this->monitoring = $monitoring;
    }

    /**
     * {@inheritdoc}
     */
    public function compose(View $view): void
    {
        $view->with($this->getData());
    }

    /**
     * Obtain information for subsequent composing.
     */
    private function getData(): array
    {
        if (s_get('news.enabled')) {
            $news = $this->news();
            $newsCount = $this->newsCount();
        } else {
            $news = false;
            $newsCount = 0;
        }

        return [
            'isAuth' => is_auth(),
            'isAdmin' => is_admin(),
            'username' => is_auth() ? \Sentinel::getUser()->getUsername() : null,
            'balance' => is_auth() ? \Sentinel::getUser()->getBalance() : null,
            'currency' => s_get('shop.currency_html', 'руб.'),
            'currentServer' => $this->currentServer,
            'character' =>
                s_get('profile.character.skin.enabled', 0) or s_get('profile.character.cloak.enabled', 0),

            'canEnter' => access_mode_any() and !is_auth(),
            'servers' => $this->servers,
            'catalogUrl' => route('catalog', [
                'currentServer' => $this->currentServer
            ]),
            'cartUrl' => route('cart', [
                'server' => $this->currentServer->id
            ]),
            'signinUrl' => route('signin'),
            'logoutUrl' => route('logout'),
            'shopName' => s_get('shop.name', 'L - Shop'),
            'news' => $news,
            'newsCount' => $newsCount,
            'monitoring' => $this->monitoring()
        ];
    }

    /**
     * Get first portion of news list.
     */
    private function news(): iterable
    {
        return $this->newsRepository->getFirstPortion(['title', 'content', 'user_id', 'created_at']);
    }

    /**
     * Get all news count.
     */
    private function newsCount(): int
    {
        return $this->newsRepository->count();
    }

    /**
     * Obtain data for monitoring servers.
     *
     * @return MonitoringPlayers[]
     */
    private function monitoring(): array
    {
        if (s_get('monitoring.enabled')) {
            $servers = $this->request->get('servers');
            $monitoring = [];

            /** @var ServerInterface $server */
            foreach ($servers as $server) {
                if ($server->isMonitoringEnabled()) {
                    $monitoring[] = $this->monitoring->getPlayers($server->getId());
                }
            }

            return $monitoring;
        }

        return [];
    }
}

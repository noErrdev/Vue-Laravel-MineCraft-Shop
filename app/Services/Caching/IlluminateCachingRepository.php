<?php
declare(strict_types = 1);

namespace App\Services\Caching;

use Illuminate\Cache\CacheManager;
use Illuminate\Contracts\Cache\Repository;

class IlluminateCachingRepository implements CachingRepository
{
    /**
     * @var CacheManager
     */
    private $cache;

    public function __construct(CacheManager $cache)
    {
        $this->cache = $cache;
    }

    /**
     * @inheritDoc
     */
    public function get(string $key, $default)
    {
        return $this->cache->get($key, $default);
    }

    /**
     * @inheritDoc
     */
    public function has(string $key): bool
    {
        return $this->cache->has($key);
    }

    /**
     * @inheritDoc
     */
    public function add(string $key, $value, $ttl = null): bool
    {
        return $this->cache->add($key, $value, $ttl);
    }

    /**
     * @inheritDoc
     */
    public function set(string $key, $value, $ttl = null): bool
    {
        return $this->cache->set($key, $value, $ttl);
    }

    /**
     * @inheritDoc
     */
    public function delete(string $key): bool
    {
        return $this->cache->delete($key);
    }
}

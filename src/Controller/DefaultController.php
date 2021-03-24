<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class DefaultController extends AbstractController
{
    public function index(CacheInterface $cache)
    {
        $response = $cache->get('cache_key' . time(), function (ItemInterface $item) {
            sleep(5);
            return "OK";
        });
        return new Response($response);
    }
}

<?php

namespace App\Logic\Cache;

use App\Logic\Render\PageRender;
use App\Post;
use Illuminate\Support\Facades\Cache;

class CacheRepository
{
    protected $render;
    public function __construct(PageRender $pageRender)
    {
        $this->render = $pageRender;
    }
    public function storePage($type)
    {
        switch ($type) {
            case 'homepage':
                $this->storeHomePage();
                break;
            case 'about':
                $this->storeAboutPage();
                break;
            case 'contact':
                $this->storeContactPage();
                break;
            case 'posts':
                $this->storePosts();
                break;
            case 'all':
                $this->storeHomePage();
                $this->storePosts();
                $this->storeAboutPage();
                
        }
    }
    // private function storePosts()
    // {
    //     $posts = Post::where('status', '=', 'published')->get();
    //     foreach ($posts as $post) {
    //         $this->putInCache( $post->slug, $this->render->getPost($post), 'post' );
    //     }
    // }

    private function storeHomePage()
    {
        $this->putInCache('homepage', $this->render->getHomePage(), 'homepage');
    }

    private function storeAboutPage()
    {
        $this->putInCache('about', $this->render->getAboutPage(), 'about');
    }

    private function storeContactPage()
    {
        $this->putInCache('contact', $this->render->getContactPage(), 'contact');
    }

    private function storePosts()
    {
        $posts = Post::orderBy('created_at', 'DESC')->has('media')->where('status_id', 2);

        foreach ($posts as $post) {
            $this->putInCache('post', $this->render->getPost($post->id), 'post');
        }
    }

    private function putInCache($key, $content, $tag)
    {
        \Cache::tags($tag)->put($key, $content, 43200);
    }
}
<?php

namespace App\Services\PageContent;

use App\Models\BlogPost;

class KnowledgeHubPageContentService
{
    /**
     * Get page content.
     *
     * @return string[]
     */
    public function getContent(): array
    {

        return [
            'title' => 'Knowledge Hub',
            'recentPosts' => $this->recentPosts(),
        ];
    }


    protected function recentPosts() {
        return BlogPost::select('post_title', 'slug', 'post_date')->limit(3)->orderByDesc('post_date')->get();
    }

    protected function allPosts(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return BlogPost::with('author', 'category')->orderByDesc('post_date')->paginate(5);
    }

}

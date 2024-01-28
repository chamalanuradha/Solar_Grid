<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Services\InquiryService;
use App\Services\PageContent\EngineeringServicePageContentService;
use App\Services\PageContent\HomePageContentService;
use App\Services\PageContent\KnowledgeHubPageContentService;
use App\Services\PageContent\NetworkProtectionPageContentService;
use App\Services\PageContent\TestingPageContentService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    protected $resources = [];

    /**
     * Load index page as Home.
     *
     * @param HomePageContentService $contentService
     * @return Application|Factory|View
     */
    public function index(HomePageContentService $contentService)
    {
        $this->resources = $contentService->getContent();
        $this->resources['recentPosts'] = BlogPost::with('category', 'author')->where('status', 1)->limit(3)->orderByDesc('post_date')->get();
        return view('pages.index')->with($this->resources);
    }


    /**
     * Load engineering services page.
     *
     * @param EngineeringServicePageContentService $contentService
     * @return Application|Factory|View
     */
    public function engineeringServices(EngineeringServicePageContentService $contentService)
    {
        return view('pages.engineering-services')->with($contentService->getContent());
    }


    /**
     * Load network protection page.
     *
     * @param NetworkProtectionPageContentService $contentService
     * @return Application|Factory|View
     */
    public function networkProtection(NetworkProtectionPageContentService $contentService)
    {
        return view('pages.network-protection')->with($contentService->getContent());
    }


    /**
     * Load testing page.
     *
     * @param TestingPageContentService $contentService
     * @return Application|Factory|View
     */
    public function testingPage(TestingPageContentService $contentService)
    {
        return view('pages.testing-page')->with($contentService->getContent());
    }


    /**
     * Load knowledge hub page.
     *
     */
    public function knowledgeHub(Request $request)
    {
        $data = $request->all();
        $this->resources['title'] = 'Knowledge Hub';
        $this->resources['recentPosts'] = BlogPost::select('post_title', 'slug', 'post_date')->where('status', 1)->limit(3)->orderByDesc('post_date')->get();
        $this->resources['allPosts'] = BlogPost::with('author', 'category')->where('status', 1)->orderByDesc('post_date')->paginate(5);

        $this->resources['data'] = $data;
        return view('pages.knowledge-hub')->with($this->resources);
    }


    /**
     * Load hub post.
     *
     */
    public function knowledgeHubPostInfo(Request $request)
    {
        $obj = BlogPost::with('author', 'category')->where('status', 1)->where('slug', $request->slug)->first();
        if ($obj != null){
            $obj->images_array = $this->removeEmptyObjectsFromArray($obj->images_array);
            $this->resources['obj'] = $obj;
            $this->resources['recentPosts'] = BlogPost::select('post_title', 'slug', 'post_date')->where('status', 1)->limit(3)->orderByDesc('post_date')->get();
            return view('pages.post-details')->with($this->resources);
        }else{
            return view('errors.404');
        }
    }

    /**
     * Load make inquiry page with filters.
     *
     * @param Request $request
     * @param InquiryService $inquiryService
     * @return Application|Factory|View
     */
    public function makeInquiry(Request $request, InquiryService $inquiryService)
    {
        $resource = [];
        $resource['categoriesArr'] = $inquiryService->getInquiryCategories();
//        $resource['categoriesArr'] = [];

        return view('pages.make-inquiry')->with($resource);
    }


    /**
     * Remove empty objects from array.
     *
     * @param $array
     * @return array
     */
    protected function removeEmptyObjectsFromArray($array): array
    {
        return array_filter($array, function ($value) {
            return !empty($value);
        });
    }
}

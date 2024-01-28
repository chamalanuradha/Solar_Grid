<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\PostCategory;
use App\Models\User;
use App\Services\ActivityLogService;
use App\Services\UtilService;
use App\Traits\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BlogPostsController extends Controller
{
    use Messages;
    protected $resources = [];

    protected $activityLogService;
    protected $utilService;

    public function __construct(
        ActivityLogService $activityLogService,
        UtilService $utilService
    )
    {
        $this->activityLogService = $activityLogService;
        $this->utilService = $utilService;
        $this->resources['roleArr'] = UtilService::getAllUserRoles();
        $this->resources['page_title'] = 'Manage blog posts';
    }

    public function allView(Request $request)
    {
        try{
            $data = $request->all();
            $this->resources['allArr'] = BlogPost::orderBy('id', 'desc')->paginate(10);

            $this->resources['data'] = $data;
            return view('admin.blog-post.list')->with($this->resources);
        }catch (\Exception $e){
            $this->resources['common_msg'] = $this->dangerWithMessage($e->getMessage());
            return redirect()->back()->with($this->resources);
        }
    }

    public function addView(Request $request)
    {
        try{
            $this->resources['categoriesArr'] = PostCategory::orderBy('name')->get();
            return view('admin.blog-post.add')->with($this->resources);
        }catch (\Exception $e){
            $this->resources['common_msg'] = $this->dangerWithMessage($e->getMessage());
            return redirect()->back()->with($this->resources);
        }
    }

    public function infoView(Request $request)
    {
        try{
            $obj = BlogPost::find($request->id);
            if ($obj != null){
                $obj->images_array = $this->utilService->removeEmptyObjectsFromArray($obj->images_array);
                $this->resources['obj'] = $obj;
                $this->resources['categoriesArr'] = PostCategory::orderBy('name')->get();
                return view('admin.blog-post.update')->with($this->resources);
            }else{
                return view('errors.404');
            }
        }catch (\Exception $e){
            $this->resources['common_msg'] = $this->dangerWithMessage($e->getMessage());
            return redirect()->back()->with($this->resources);
        }
    }

    public function add(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'category' => ['required'],
                'slug' => ['required', 'max:255', 'unique:blog_posts'],
                'title_on_tab' => ['nullable','max:20'],
                'meta_keywords' => ['nullable', 'max:200'],
                'meta_description' => ['nullable', 'max:200'],
                'post_title' => ['required', 'string', 'max:250'],
                'section_one_text' => ['nullable', 'string', 'max:65000'],
//                'section_two_text' => ['nullable', 'string', 'max:65000'],
                'cover_image_alt' => ['nullable', 'string', 'max:100'],
                'main_video_url' => ['nullable', 'string', 'max:250'],
                'main_quote' => ['nullable', 'string', 'max:250'],
                'main_quote_description' => ['nullable', 'string', 'max:1000'],
                'sub_section_one_title' => ['nullable', 'string', 'max:250'],
                'sub_section_one_text' => ['nullable', 'string', 'max:65000'],
                'sub_section_two_title' => ['nullable', 'string', 'max:250'],
                'sub_section_two_text' => ['nullable', 'string', 'max:65000'],
                'status' => ['required']
            ], $this->messages());

            if (!$validator->fails()) {

                DB::beginTransaction();
                $obj = new BlogPost();
                $obj->category_id = $request->category;
                $obj->slug = $request->slug;
                $obj->title_on_tab = $request->title_on_tab;
                $obj->meta_keywords = $request->meta_keywords;
                $obj->meta_description = $request->meta_description;
                $obj->post_title = $request->post_title;
                $obj->section_one_text = $request->section_one_text;
//                $obj->section_two_text = $request->section_two_text;
                $obj->cover_image_alt = $request->cover_image_alt;
                $obj->main_video_url = $request->main_video_url;
                $obj->main_quote = $request->main_quote;
                $obj->main_quote_description = $request->main_quote_description;
                $obj->sub_section_one_title = $request->sub_section_one_title;
                $obj->sub_section_one_text = $request->sub_section_one_text;
                $obj->sub_section_two_title = $request->sub_section_two_title;
                $obj->sub_section_two_text = $request->sub_section_two_text;
                $obj->status = $request->status;

                if ($request->file('cover_image')) {
                    $obj->cover_image = $this->utilService->uploadFile($request->file('cover_image'), 'images/blog/cover');
                }
                if ($request->file('main_video_thumbnail')) {
                    $obj->main_video_thumbnail = $this->utilService->uploadFile($request->file('main_video_thumbnail'), 'images/blog/video_thumbnails');
                }

                if ($imagesArr = $request->file('images_array')) {
                    foreach ($imagesArr as $image) {
                        $imagesArr[] = $this->utilService->uploadFile($image, 'images/blog/sub_images');
                    }
                    $obj->images_array = $this->utilService->removeEmptyObjectsFromArray($imagesArr);
                }

                $obj->post_date = date('Y-m-d');
                $obj->user_id = Auth::user()->id;
                $obj->save();

                $this->activityLogService->addLog('BLOG_POST_ADD', $obj);
                DB::commit();

                $this->resources['common_msg'] = $this->successWithMessage('Post added successfully!');
                return redirect()->back()->with($this->resources);
            }else{
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }
        }catch (\Exception $e){
            DB::rollBack();
            $this->resources['common_msg'] = $this->dangerWithMessage($e->getMessage());
            return redirect()->back()->with($this->resources);
        }
    }

    public function update(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'category' => ['required'],
                'slug' => ['required', 'max:255'],
                'title_on_tab' => ['nullable','max:20'],
                'meta_keywords' => ['nullable', 'max:200'],
                'meta_description' => ['nullable', 'max:200'],
                'post_title' => ['required', 'string', 'max:250'],
                'section_one_text' => ['nullable', 'string', 'max:65000'],
//                'section_two_text' => ['nullable', 'string', 'max:65000'],
                'cover_image_alt' => ['nullable', 'string', 'max:100'],
                'main_video_url' => ['nullable', 'string', 'max:250'],
                'main_quote' => ['nullable', 'string', 'max:250'],
                'main_quote_description' => ['nullable', 'string', 'max:1000'],
                'sub_section_one_title' => ['nullable', 'string', 'max:250'],
                'sub_section_one_text' => ['nullable', 'string', 'max:65000'],
                'sub_section_two_title' => ['nullable', 'string', 'max:250'],
                'sub_section_two_text' => ['nullable', 'string', 'max:65000'],
                'status' => ['required']
            ], $this->messages());

            if (!$validator->fails()) {

                DB::beginTransaction();
                $obj = BlogPost::find($request->id);
                $obj->category_id = $request->category;
                $obj->slug = $request->slug;
                $obj->title_on_tab = $request->title_on_tab;
                $obj->meta_keywords = $request->meta_keywords;
                $obj->meta_description = $request->meta_description;
                $obj->post_title = $request->post_title;
                $obj->section_one_text = $request->section_one_text;
//                $obj->section_two_text = $request->section_two_text;
                $obj->cover_image_alt = $request->cover_image_alt;
                $obj->main_video_url = $request->main_video_url;
                $obj->main_quote = $request->main_quote;
                $obj->main_quote_description = $request->main_quote_description;
                $obj->sub_section_one_title = $request->sub_section_one_title;
                $obj->sub_section_one_text = $request->sub_section_one_text;
                $obj->sub_section_two_title = $request->sub_section_two_title;
                $obj->sub_section_two_text = $request->sub_section_two_text;
                $obj->status = $request->status;

                if ($request->file('cover_image')) {
                    $obj->cover_image = $this->utilService->uploadFile($request->file('cover_image'), 'images/blog/cover');
                }
                if ($request->file('main_video_thumbnail')) {
                    $obj->main_video_thumbnail = $this->utilService->uploadFile($request->file('main_video_thumbnail'), 'images/blog/video_thumbnails');
                }

                if ($imagesArr = $request->file('images_array')) {
                    foreach ($imagesArr as $image) {
                        $imagesArr[] = $this->utilService->uploadFile($image, 'images/blog/sub_images');
                    }
                    $obj->images_array = $this->utilService->removeEmptyObjectsFromArray($imagesArr);
                }

                $obj->post_date = date('Y-m-d');
                $obj->user_id = Auth::user()->id;
                $obj->save();

                $this->activityLogService->addLog('BLOG_POST_UPDATE', $obj);
                DB::commit();

                $this->resources['common_msg'] = $this->successWithMessage('Post updated successfully!');
                return redirect()->back()->with($this->resources);
            }else{
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }
        }catch (\Exception $e){
            $this->resources['common_msg'] = $this->dangerWithMessage($e->getMessage());
            return redirect()->back()->with($this->resources);
        }
    }

    public function delete(Request $request)
    {
        try{
            BlogPost::find($request->id)->delete();
            $this->resources['common_msg'] = $this->successWithMessage('Post deleted successfully!');
            return redirect()->back()->with($this->resources);
        }catch (\Exception $e){
            $this->resources['common_msg'] = $this->dangerWithMessage($e->getMessage());
            return redirect()->back()->with($this->resources);
        }
    }


    protected function messages()
    {
        return [
//            'first_name.required' => 'Please enter first name.',
//            'last_name.required' => 'Please enter last name.',
//            'first_name.max' => 'First name may not be greater than 100 characters.',
//            'last_name.max' => 'Last name may not be greater than 100 characters.',
//            'email.unique' => 'This email is already connected to an account.'
        ];
    }
}

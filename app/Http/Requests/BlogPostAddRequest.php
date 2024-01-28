<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => ['required'],
            'slug' => ['required', 'max:255', 'unique:bolg_posts'],
            'title_on_tab' => ['required', 'max:20'],
            'meta_keywords' => ['nullable', 'max:200'],
            'meta_description' => ['nullable', 'max:200'],

            'post_title' => ['required', 'string', 'max:250'],
            'section_one_text' => ['nullable', 'string', 'max:65000'],
            'section_two_text' => ['nullable', 'string', 'max:65000'],

            'main_video_url' => ['nullable', 'string', 'max:250'],
            'main_quote' => ['nullable', 'string', 'max:250'],
            'main_quote_description' => ['nullable', 'string', 'max:1000'],
            'sub_section_one_title' => ['nullable', 'string', 'max:250'],
            'sub_section_one_text' => ['nullable', 'string', 'max:65000'],
            'sub_section_two_title' => ['nullable', 'string', 'max:250'],
            'sub_section_two_text' => ['nullable', 'string', 'max:65000'],

            'status' => ['required']
        ];
    }
}

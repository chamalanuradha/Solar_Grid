<?php

namespace App\Services;

use App\Models\InquiryCategory;

class InquiryService
{
    public function getInquiryCategories()
    {
        return InquiryCategory::all();
    }



}

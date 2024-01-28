<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\InquiryCategory;
use App\Services\ActivityLogService;
use App\Services\InquiryService;
use App\Services\SendGridAPIService;
use App\Services\UtilService;
use App\Traits\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class InquiryController extends Controller
{
    use Messages;

    protected $resources = [];
    protected $inquiryService;
    protected $activityLogService;
    protected $utilService;
    protected $sendGridAPIService;

    public function __construct(
        InquiryService $inquiryService,
        ActivityLogService $activityLogService,
        UtilService $utilService,
        SendGridAPIService $sendGridAPIService
    ) {
        $this->inquiryService = $inquiryService;
        $this->activityLogService = $activityLogService;
        $this->utilService = $utilService;
        $this->sendGridAPIService = $sendGridAPIService;
    }


    public function addInquiry(Request $request)
    {
        try {
            $rules = [
//                'name' => ['required', 'string', 'max:100'],
                'category' => ['required'],
                'message' => ['required', 'string', 'max:65000'],
                'g-recaptcha-response' => ['required', 'captcha']
            ];

//            if ($request['is_underage'] == '1') {
//                $rules['guardian'] = ['required'];
//            }

            $validator = Validator::make($request->all(), $rules, $this->messages());

            if (!$validator->fails()) {

                $inquiry = new Inquiry();
                $inquiry->user_id = (isset(Auth::user()->id)) ? Auth::user()->id : null;
                $inquiry->name = Auth::user()->first_name.' '.Auth::user()->last_name;
                $inquiry->category_id = $request->category;
                $inquiry->pv_system_size = $request->pv_system_size;
                $inquiry->inverter_combination = $request->inverter_combination;
                $inquiry->is_indoor = $request->is_indoor;
                $inquiry->color = $request->color;
                $inquiry->maximum_space_available = $request->maximum_space_available;
                $inquiry->dnsp = $request->dnsp;
                $inquiry->is_in_house = $request->is_in_house;
                $inquiry->test_date = $request->test_date;
                $inquiry->site_contact = $request->site_contact;
                $inquiry->site_address = $request->site_address;
                $inquiry->message = $request->message;

                if ($request->file('sld_file')) {
                    $inquiry->sld_file = $this->utilService->uploadFile($request->file('sld_file'), 'inquiries/sld');
                }

                if ($imagesArr = $request->file('other_document')) {
                    foreach ($imagesArr as $image) {
                        $imagesArr[] = $this->utilService->uploadFile($image, 'inquiries/other');
                    }
                }

                $inquiry->other_document = (isset($imagesArr)) ? $this->utilService->removeEmptyObjectsFromArray($imagesArr) : null;

                $inquiry->save();

//                $this->sendEmail($request->category, $inquiry);

                $this->resources['common_msg'] = $this->successWithMessage('Inquiry added successfully!');
                return redirect()->back()->with($this->resources);
            }else{
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }
        } catch (\Exception $e) {
            $this->resources['common_msg'] = $this->dangerWithMessage($e->getMessage());
            return redirect()->back()->with($this->resources);
        }
    }


    protected function sendEmail($categoryId, $inquiryObj)
    {
        $category = InquiryCategory::find($categoryId);

        $inquiryObj->other_document = (isset($inquiryObj->other_document)) ? $this->utilService->removeEmptyObjectsFromArray($inquiryObj->other_document) : [];
        $this->resources['obj'] = $inquiryObj;

        $htmlString = View::make('mail.inquiry-email-blade', $this->resources)->render();

        $data = [
            'to_email' => 'tharindu@webmotech.com',
            'to_name' => 'Tharindu C',
            'subject' => 'Inquiry - '.$category['name'],
            'body' => $htmlString,
        ];

        $this->sendGridAPIService->sendSingleEmail($data);
    }


    public function testEmail(Request $request)
    {
        try {
            $data = [
                'to_email' => 'tharindu@webmotech.com',
                'to_name' => 'Tharindu C',
                'subject' => 'Test A',
                'body' => 'Test Description',
            ];

            $result = $this->sendGridAPIService->sendSingleEmail($data);
            dd($result);

        } catch (\Exception $e) {
            dd($e);
        }
    }


    public function testEmailBlade(Request $request)
    {
        try {
            $obj = Inquiry::find(1);
            $obj->other_document = (isset($obj->other_document)) ? $this->utilService->removeEmptyObjectsFromArray($obj->other_document) : [];
            $this->resources['obj'] = $obj;

            $htmlString = View::make('test.inquiry-email-blade', $this->resources)->render();

            dd($htmlString);


        } catch (\Exception $e) {
            dd($e);
        }
    }


    /**
     * Modified validation messages.
     *
     * @return string[]
     */
    protected function messages(): array
    {
        return [
            'name.required' => 'Please enter your name.',
            'category.required' => 'Please select your requirement from drop down.',
            'message.max' => 'Message may not be greater than 65000 characters.',
        ];
    }

}

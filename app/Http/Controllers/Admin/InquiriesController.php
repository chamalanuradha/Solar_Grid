<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\InquiryCategory;
use App\Services\ActivityLogService;
use App\Services\UtilService;
use App\Traits\Messages;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InquiriesController extends Controller
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
        $this->resources['page_title'] = 'Manage inquiries';
    }

    public function allView(Request $request)
    {
        try{
            $data = $request->all();

//            dd(isset($data['status']) && $data['status'] == 0, isset($data['status']), $data['status']);

            $this->resources['allCategories'] = InquiryCategory::orderBy('name')->get();
            $this->resources['allStatus'] = ['PENDING', 'RESPONDED', 'VIEWED'];

            $allArr = Inquiry::query();

            if (isset($data['category']) && $data['category'] != 0) {
                $allArr = $allArr->where('category_id', $data['category']);
            }
            if (isset($data['status']) && $data['status'] != 0) {
                $allArr = $allArr->where('status', $data['status']);
                dd($allArr->get());
            }

            $allArr = $allArr->orderByDesc('id')->paginate(10);

            $this->resources['allArr'] = $allArr;
            $this->resources['data'] = $data;
            return view('admin.inquiry.list')->with($this->resources);
        }catch (\Exception $e){
            $this->resources['common_msg'] = $this->dangerWithMessage($e->getMessage());
            return redirect()->back()->with($this->resources);
        }
    }


    public function infoView(Request $request)
    {
        try{
            $obj = Inquiry::find($request->id);
            if ($obj != null){
                $obj->other_document = (isset($obj->other_document)) ? $this->utilService->removeEmptyObjectsFromArray($obj->other_document) : [];
                $this->resources['obj'] = $obj;
                $this->resources['allStatus'] = ['PENDING', 'RESPONDED', 'VIEWED'];
                return view('admin.inquiry.update')->with($this->resources);
            }else{
                return view('errors.404');
            }
        }catch (\Exception $e){
            $this->resources['common_msg'] = $this->dangerWithMessage($e->getMessage());
            return redirect()->back()->with($this->resources);
        }
    }

    public function update(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'status' => ['required']
            ], $this->messages());

            if (!$validator->fails()) {

                $user = Inquiry::find($request->id);
                $user->status = $request->status;
                $user->save();

                $this->resources['common_msg'] = $this->successWithMessage('Inquiry status updated successfully!');
                return redirect()->back()->with($this->resources);
            }else{
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }
        }catch (\Exception $e){
            $this->resources['common_msg'] = $this->dangerWithMessage($e->getMessage());
            return redirect()->back()->with($this->resources);
        }
    }

    public function delete(Request $request): RedirectResponse
    {
        try{
            Inquiry::find($request->id)->delete();
            $this->resources['common_msg'] = $this->successWithMessage('Inquiry deleted successfully!');
            return redirect()->back()->with($this->resources);
        }catch (\Exception $e){
            $this->resources['common_msg'] = $this->dangerWithMessage($e->getMessage());
            return redirect()->back()->with($this->resources);
        }
    }



    protected function messages(): array
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

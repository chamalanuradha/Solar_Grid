<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Traits\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    use Messages;
    protected $resources = [];

    public function __construct()
    {
        $this->resources['page_title'] = 'Dashboard';
    }

    public function index()
    {
        try{
            return view('customer.dashboard')->with($this->resources);
        }catch (\Exception $e){
            $this->resources['common_msg'] = $this->dangerWithMessage($e->getMessage());
            return redirect()->back()->with($this->resources);
        }
    }



    public function viewInquiriesAll(Request $request)
    {
        try{
            $this->resources['data'] = $request->all();
            $this->resources['allArr'] = Inquiry::with('category')->where('user_id', Auth::user()->id)
                ->orderByDesc('id')->paginate(10);

            return view('customer.inquiries')->with($this->resources);
        }catch (\Exception $e){
            $this->resources['common_msg'] = $this->dangerWithMessage($e->getMessage());
            return redirect()->back()->with($this->resources);
        }
    }


}

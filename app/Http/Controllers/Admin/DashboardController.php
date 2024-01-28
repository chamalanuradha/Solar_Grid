<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\Messages;

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
            return view('admin.dashboard')->with($this->resources);
        }catch (\Exception $e){
            $this->resources['common_msg'] = $this->dangerWithMessage($e->getMessage());
            return redirect()->back()->with($this->resources);
        }
    }


}

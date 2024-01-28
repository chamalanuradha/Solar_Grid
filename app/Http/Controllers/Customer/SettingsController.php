<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    use Messages;
    protected $resources = [];

    public function __construct()
    {
        $this->resources['page_title'] = 'Profile';
    }

    public function viewSettings()
    {
        try{
            $this->resources['obj'] = User::find(Auth::user()->id);
            $this->resources['page_title'] = 'Settings';
            return view('customer.settings')->with($this->resources);
        }catch (\Exception $e){
            $this->resources['common_msg'] = $this->dangerWithMessage($e->getMessage());
            return redirect()->back()->with($this->resources);
        }
    }

    public function updateSettings(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'first_name' => ['required', 'string', 'max:100'],
                'last_name' => ['required', 'string', 'max:100'],
            ], $this->messages());

            if (!$validator->fails()) {
                $user = User::find(Auth::user()->id);
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->save();

                $this->resources['common_msg'] = $this->successWithMessage('Settings updated!');
                return redirect()->back()->with($this->resources);
            } else {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }
        } catch (\Exception $e) {
            $this->resources['common_msg'] = $this->danger;
            return redirect()->back()->with($this->resources);
        }
    }

    public function changePassword(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'password' => ['required', 'string', 'min:8', 'confirmed']
            ], $this->messages());

            if (!$validator->fails()) {
                $user = User::find(Auth::user()->id);
                $user->password = Hash::make($request->password);
                $user->save();

                $this->resources['common_msg'] = $this->successWithMessage('Password updated!');
                return redirect()->back()->with($this->resources);
            } else {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }
        } catch (\Exception $e) {
            $this->resources['common_msg'] = $this->danger;
            return redirect()->back()->with($this->resources);
        }
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Please enter first name.',
            'last_name.required' => 'Please enter last name.',
            'first_name.max' => 'First name may not be greater than 100 characters.',
            'last_name.max' => 'Last name may not be greater than 100 characters.',
            'email.unique' => 'This email is already connected to an user account.'
        ];
    }
}

<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller{

    public function __construct()
    {
       $this->middleware('guest');
    }

    public function changePassword(Request $request){

        $findUser = User::where('id',$request->id);
        $request->validate(['password'=>['confirmed','min:6','max:6','required']]);

    }

}

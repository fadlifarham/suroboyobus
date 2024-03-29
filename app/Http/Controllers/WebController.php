<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\ModelBankSampah;
use App\ModelUser;
use App\ModelBus;
use App\ModelTopUp;

class WebController extends Controller
{
    public function index(){
     	if(!Session::get('login')) {
    	return view('login/formlogin');

    	} else {
            $data = ModelBankSampah::all();
            $jml_bus = ModelBus::all();
            $jml_sampah = ModelBankSampah::all();
            $user = ModelUser::all();
            $permintaan = ModelTopUp::where('status', 'Diproses')->get();
            return view('welcome',compact('data','jml_bus','jml_sampah','user', 'permintaan'));
    	}
    }
}

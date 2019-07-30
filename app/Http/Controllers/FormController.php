<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
class FormController extends Controller
{
    //

    public function index(){
       return view('ajax-form');
    }

    public function store(Request $request){

      $this->validate($request , [
        'name'      => 'required|max:20',
        'email'     => 'required|email|unique:contacts',
        'mobile_number' => 'required|unique:contacts'
        ] );


        $data     = $request->all();
        $check    = Contact::create($data);

        $arr = array(
          'msg'    => 'Something goes to wrong. Please try again lator',
          'status' => false
        );

        if($check){
        $arr = array(
          'msg'    => 'Successfully submit form using ajax',
          'status' => true);
        }
        return Response()->json($arr);



    }
}

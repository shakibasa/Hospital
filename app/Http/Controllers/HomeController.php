<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Doctor;

use App\Models\Appointment;

class HomeController extends Controller
{
    public function redirect(){
        if(Auth::id()){
            if(Auth::user()->usertype=='0'){
                $doctor = doctor::all();
                return view('user.home', compact('doctor'));
            }
            else{
                return view('admin.home');
            }

        }
        else{
            return redirect()->back();
        }
    }

    public function index(){

        if(auth::id()){
            return redirect('home');
        }
        else{
            $doctor = doctor::all();
            return view('user.home', compact('doctor'));
        }
    }


    public function appointment(request $request){
        $data = new appointment;

        $data->Name=$request->Name;
        $data->Email=$request->Email;
        $data->DoB=$request->Date;
        $data->Number=$request->Number;
        $data->Doctor_Name=$request->Doctor_Name;
        $data->Message=$request->message;
        $data->Status='In Progress';
        if(Auth::id()){
        $data->user_id=Auth::user()->id;
        }    
    
         $data->save();
         return redirect()->back()->with('message', 'Appointment Successfully. We will contract you as soon as possible.');
        
     }

     public function myappointment(){

        $userid=Auth::user()->id;
        $appoint=appointment::where('user_id',$userid)->get();

        if(Auth::id()){
        return view('user.my_appointment', compact('appoint'));
        }

        else{
            return redirect()->back();
        }
    }


    public function cancel_appoint($id){
        $data = appointment::find($id);
        $data->delete();
        return redirect()->back();
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Doctor;

use App\Models\Appointment;

use Notification;

use App\Notifications\mailnotification;



class AdminController extends Controller
{
    
    public function addview(){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
                return view('admin.add_doctor');

            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }
       
    }

    public function upload(request $request){
        $doctor = new doctor;
        $doctor->doctor_name=$request->doctor_name;
        $doctor->number=$request->number;
        $doctor->speciality=$request->speciality;
        $doctor->room=$request->room;
 
        $image=$request->file;
        if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('doctorimage',$imagename);
        $doctor->image=$imagename;
        }
 
         $doctor->save();
         return redirect()->back()->with('message', 'Doctor Added Successfully');
     }

     public function showappointment(){

        if(Auth::id()){
            if(Auth::user()->usertype==1){
               
                $data=appointment::all();
                return view('admin.showappointment', compact('data'));

            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }
       

     }

     public function approved_appoint($id){
        $data = appointment::find($id);
        $data->status='Approved';
        $data->save();
        return redirect()->back();
    }

    public function cancel_appoint($id){
        $data = appointment::find($id);
        $data->status='Cancel';
        $data->save();
        return redirect()->back();
    }

    public function showdoctor(){

        $data = doctor::all();
        return view('admin.showdoctor', compact('data'));
       
    }

    public function delete($id){
        $data = doctor::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function search(request $request){
        $search = $request->search;
        $data = doctor::where('doctor_name','Like','%'.$search.'%')->orWhere('speciality','Like','%'.$search.'%')->get();
        return view('admin.showdoctor', compact('data'));
    }
    
    
    public function update_view($id){
        $data = doctor::find($id);
        return view('admin.updatepage', compact('data'));
    }

    public function update(request $request, $id){
        $data = doctor::find($id);
       
        $data->doctor_name=$request->doctor_name;
        $data->number=$request->number;
        $data->speciality=$request->speciality;
        $data->room=$request->room;
       

        $image=$request->file;
        if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('doctorimage',$imagename);
        $data->image=$imagename;
        }
 
         $data->save();
       return redirect()->back();
        

    }

    public function emailview($id){
        $data = appointment::find($id);
        return view('admin.email_view', compact('data'));
    }


    public function sendemail(request $request, $id){

        $data = appointment::find($id);
        $details=[

            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'endpart' => $request->endpart

        ];

        Notification::send($data, new mailnotification($details));
        return redirect()->back()->with('message', 'Send Email Successfully');

    }

}

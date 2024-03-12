<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Prof;
use App\Models\MessageProf;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\facades\DB;
class MessageProfController extends Controller
{
    public function FormMessage(){
        $Prof = Prof::pluck('Nom');
        return view('etudiant.FormProf',compact('Prof'));
    }

    public function SendMessage(Request $request){
       $request->validate([
        'Prof',
        'message'
       ]);

       
       $prof = Prof::where('Nom',$request->Prof)->value('id_prof');
       
       $Message = MessageProf::create([
           'Message'=>$request->message,
           'Prof'=>$prof,
           'Etudiant'=>Auth::user()->id
       ]);
         
       if($Message){
           $MessageSucces = 'Message sent successfully';
           return view('etudiant.FormProf',compact('MessageSucces'));
       }else{
           $MessageFail ='try again';
           return view('etudiant.FormProf',compact('MessageFail'));
       }
           
      
    }
}

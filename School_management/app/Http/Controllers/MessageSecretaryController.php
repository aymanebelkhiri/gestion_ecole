<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MessageSecretary;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageSecretaryController extends Controller
{
    public function FormMessage(){
        return view('etudiant.FormSecrtary');
    }

    public function SendMessage(Request $request){
       $request->validate([
        'message'
       ]);

       $Message = MessageSecretary::create([
           'Message'=>$request->message,
           'Etudiant'=>Auth::user()->id
       ]);
         
       if($Message){
           $MessageSucces = 'Message sent successfully';
           return view('etudiant.FormSecrtary',compact('MessageSucces'));
       }else{
           $MessageFail ='try again';
           return view('etudiant.FormSecrtary',compact('MessageFail'));
       }
    }
      
    public function getMessages(){
        $messages = DB::table('message_to_secrtary')
            ->join('etudiants', 'etudiants.id_etudiant', '=', 'message_to_secrtary.Etudiant')
            ->select('etudiants.Nom as Etudiant','message_to_secrtary.id_message','message_to_secrtary.Message', 'message_to_secrtary.created_at')
            ->get();
        return view('admin.messages.index', compact('messages'));
    }
    

}

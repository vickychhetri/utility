<?php

namespace App\Http\Controllers;

use App\Models\CVBankMailer;
use Illuminate\Http\Request;
use Mail;
class CVBankMailerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=CVBankMailer::all();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'category' => 'required|max:255',
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'subject' => 'required|max:255',
            'message' => 'required',
        ]);
     
 
        $data = [
            "category"=>$request->category,
            "name"=>$request->name,
            "email"=>$request->email,
            "subject"=>$request->subject,
            "message"=>$request->message,
        ];

        $user['to']=$request->email;
        $user['subject']=$request->subject;

        Mail::send('mail',$data,function($messages) use ($user){
            $messages->to($user['to']);
            $messages->subject($user['subject']);
        });

        if(count(Mail::failures()) > 0){
            return 'NULL';
        }
 

        $obj = new CVBankMailer;
        $obj->category=$request->category;
        $obj->name=$request->name;
        $obj->email=$request->email;
        $obj->subject=$request->subject;
        $obj->message=$request->message;
        $obj->save();

        return "1";

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CVBankMailer  $cVBankMailer
     * @return \Illuminate\Http\Response
     */
    public function show(CVBankMailer $cVBankMailer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CVBankMailer  $cVBankMailer
     * @return \Illuminate\Http\Response
     */
    public function edit(CVBankMailer $cVBankMailer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CVBankMailer  $cVBankMailer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CVBankMailer $cVBankMailer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CVBankMailer  $cVBankMailer
     * @return \Illuminate\Http\Response
     */
    public function destroy(CVBankMailer $cVBankMailer)
    {
        //
    }
}

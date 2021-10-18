<?php

namespace App\Http\Controllers;
use App\Message;
use App\Apartment;
use Auth;


use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $data = $request->all();
       
        $request->validate([
            'sender_id' => 'required',
            'text' => 'required',
            'sender_name' => 'required',
            'email' => 'required',
        ]);

        $message = new Message;
        
        $message->text = $data['text'];  
        $message->sender_name = $data['sender_name'];  
        $message->email = $data['email'];  
        $message->apartment_id= $data['sender_id'];
        $message->save();

        return redirect()->back()->with('status', 'messaggio inviato correttamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
       
        // return view('apartment.message', compact('apartment'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {

        // $message->delete();
        // return redirect()->route('apartment.message');
    }
}
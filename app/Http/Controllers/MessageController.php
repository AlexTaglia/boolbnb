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
    public function index($id)
    {
        $apartment = Apartment::find($id);
        return view('apartment.message', compact('apartment'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $apartment = Apartment::all();
        $message = Message::all();
        return view('apartment.message.create', compact('message', 'apartment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Apartment $apartment)
    {   
        $apartment = Apartment::all();

        // dd($request);
        $request->validate([
            'text' => 'required',
            'sender_name' => 'required',
            'email' => 'required',
        ]);

        $data = $request->all();
        $message = new Message;
        
        $message->text = $data['text'];  
        $message->sender_name = $data['sender_name'];  
        $message->email = $data['email'];  
        $message->apartment_id= Auth::id();
        $message->save();

        return view('apartment.message', compact('message'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $apartment = Apartment::all();
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
        $apartment = Apartment::all();
        return view('apartment.message', compact('apartment'));
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
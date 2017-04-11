<?php

namespace phonebook\Http\Controllers;

use Illuminate\Http\Request;
use phonebook\Contacts;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contacts::all();
        return response()->json($contacts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()){
            $contact          = new Contacts();
            $contact->name    = $request->input('name');
            $contact->phone   = $request->input('phone');
            $contact->email   = $request->input('email');
            $contact->website = $request->input('website');
            $contact->save();
            return response()->json(['success' => true, 'message' => 'Contacto guardado']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contacts = Contacts::find($id);
        return response()->json($contacts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacto = Contacts::find($id);
        return response()->json($contacto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            $contacto = Contacts::find($request->id);
            $contact->name    = $request->input('name');
            $contact->phone   = $request->input('phone');
            $contact->email   = $request->input('email');
            $contact->website = $request->input('website');
            $contact->save();
            return response()->json(['success' => true, 'message' => 'Contacto actualizado']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contacto = Contacts::find($id);
        $contacto->delete();
        return response()->json(['message' => 'Contacto eliminado']);
    }
}

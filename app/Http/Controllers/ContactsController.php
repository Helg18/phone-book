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
        if ($request->isMethod('post')){
            $contact          = new Contacts();
            $contact->contact = $request->name;
            $contact->phone   = $request->phone;
            $contact->email   = $request->email;
            $contact->website = $request->website;
            $contact->save();
            //dd($contact);
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
        if ($request->isMethod('PUT')) {
            $contacto = Contacts::find($id);
            $contacto->contact = $request->name;
            $contacto->phone   = $request->phone;
            $contacto->email   = $request->email;
            $contacto->website = $request->website;
            $contacto->save();
            //dd($contacto);
            return response()->json(['success' => true, 'message' => 'Contacto actualizado']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->isMethod('DELETE')) {
            $contacto = Contacts::find($id);
            $contacto->delete();
            return response()->json(['message' => 'Contacto eliminado']);
        }
    }
}

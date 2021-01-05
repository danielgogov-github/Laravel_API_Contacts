<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Models\Contact;

class ContactsController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $all_contacts = Contact::orderByDesc('id')->get();
        return response()->json($all_contacts);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $contact = Contact::findOrFail($id);
        return response()->json($contact);
    }    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        try {
            $contact = Contact::create($request->all());
            return response()->json($contact, 201);
        } catch (HttpException $exception) {
            throw new HttpException(400, $exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $contact = Contact::findOrFail($id);
        try {
            $contact->update($request->all());
            return response()->json($contact, 201);
        } catch (HttpException $exception) {
            throw new HttpException(400, $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return response()->json(null, 204);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Phone;
use Gate;
class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('home',['phones'=> \App\Phone::where('user_id',\Auth::id())->latest()->get()]);
        return view('home',['phones'=> \Auth::user()->phones()->latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('create-phone');
        return view('phones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ======= Validation =======
        $validatedData = $request->validate([
            'phone' => ['required','unique:phones','regex:/^(010|011|012|015)/','numeric','digits:11'],
        ],[
            'phone.regex' => 'Phone should start with 010 or 011 or 012 or 015'
        ]);
        // ========= Add =========
        // $phone = new Phone;
        // $phone->phone = $request->phone;
        // $phone->user_id = \Auth::id();
        // $phone->save();
        // return redirect()->route('home');

        \Auth::user()->phones()->save(new Phone($request->all()));
        // \Auth::user()->contacts()->save(new Phone($request->all()));
        return redirect()->route('home')->with('success', 'Phone has been added successfully..');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('phones.show',['phone'=> Phone::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('edit-phone');
        return view('phones.edit',['phone'=> Phone::find($id)]);
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
        // ======= Validation ==========
        $validatedData = $request->validate([
            'phone' => ['required','unique:phones','regex:/^(010|011|012|015)/','numeric','digits:11'],
        ],[
            'phone.regex' => 'Phone should start with 010 or 011 or 012 or 015'
        ]);
        // ========= Update ============
        // $phone = Phone::find($id);
        // $phone->phone = $request->phone;
        // $phone->user_id = \Auth::id();
        // $phone->save();
        // return redirect()->route('home');

        Phone::findOrFail($id)->update($request->all());
        return redirect()->route('home')->with('success', 'Phone has been updated successfully..');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // ========= Delete ============
        // $phone = Phone::find($id);
        // $phone->delete();
        // return redirect()->route('home');
        Gate::authorize('delete-phone');
        Phone::find($id)->forceDelete();
        return redirect()->route('home');
    }

//     public function destroyAll()
//     {
//         Phone::truncate();
//         return redirect()->route('home');
//     }
}

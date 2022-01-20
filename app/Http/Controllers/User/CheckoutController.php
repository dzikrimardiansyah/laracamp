<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Checkouts;
use Illuminate\Http\Request;
use App\Models\Camps;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Camps $camps)
    {
    
        return view('checkout.create',[
            'camps' =>$camps
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Camps $camps)
    {
        //mapping request data
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['camp_id'] = $camps->id;

        //update user data

        $user = Auth::user();
        $user->email = $data['email'];
        $user->name = $data ['name'];
        $user->occupation = $data['occupation'];
        $user->save();

        //create checkout
        $checkouts = Checkouts::create($data);

        return redirect(route('checkout.success'));


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checkouts  $checkouts
     * @return \Illuminate\Http\Response
     */
    public function show(Checkouts $checkouts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checkouts  $checkouts
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkouts $checkouts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checkouts  $checkouts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkouts $checkouts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkouts  $checkouts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkouts $checkouts)
    {
        //
    }

    public function success()
    {
        return view('checkout.success');
    }
}

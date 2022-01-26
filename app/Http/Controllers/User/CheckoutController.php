<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Models\Camp;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\Checkout\Store;
use Illuminate\Support\Facades\Mail;
use App\Mail\Checkout\AfterCheckout;

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
    public function create(Camp $camp, Request $request)
    {
    //    return $camp;
            if ($camp->isRegistered) {
                $request->session()->flash('error',"You already registered on {$camp->title} camps.");
                return redirect(route('user.dashboard'));
            }

        return view('checkout.create',[
            'camps' =>$camp
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request, Camp $camp)
    {
        // return $request->all();
        //mapping request data
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['camp_id'] = $camp->id;

        //update user data

        $user = Auth::user();
        $user->email = $data['email'];
        $user->name = $data ['name'];
        $user->occupation = $data['occupation'];
        $user->save();

        //create checkout
        $checkouts = Checkout::create($data);

        //sending email
        Mail::to(Auth::user())->send(new AfterCheckout($checkouts));

        return redirect(route('checkout.success'));


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checkout  $checkouts
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkouts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checkouts  $checkouts
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkouts)
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
    public function update(Request $request, Checkout $checkouts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkouts  $checkouts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkouts)
    {
        //
    }

    public function success()
    {
        return view('checkout.success');
    }

}

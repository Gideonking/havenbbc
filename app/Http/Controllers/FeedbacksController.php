<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Feedback;

class FeedbacksController extends Controller
{
    //$token = '';
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
           $token = '6Lfl1VMUAAAAAE2Bh9aCPWO6ntPiI5WHlDkZpjLI';
    $client = new Client();

        $req =  ['form_params' => [
                'secret' =>   $token,
                'response' => $request->input('g-recaptcha-response'),
                'remoteip' => request()->ip()
        ],
    ];
        $res = $client->request('POST','https://www.google.com/recaptcha/api/siteverify',$req);
   

        $result = json_decode($res->getBody());
        $success = $result->success;
        // dd($req);
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
       // dd($result);
        if($success === false){
           return redirect('/contact')->with('error', 'CAPTCHA verification failed')->with('pageName', 'Contact Us');
         }
$feedbacks = new Feedback;
$feedbacks->name = $request->name;
$feedbacks->email = $request->email;
$feedbacks->message = $request->message;
$feedbacks->save();
         return redirect('/contact')->with('success', "We've received your message!")->with('pageName', 'Contact Us');
        
    }
    /*function($attribute, $value, $fail) {
                if ($value === 'false') {
                    return $fail('CAPTCHA verification failed.');
                }
                }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

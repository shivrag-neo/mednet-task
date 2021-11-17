<?php

namespace App\Http\Controllers;

use App\Submission;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Rules\Hostname;
use App\Rules\MacAddress;
use App\Http\Resources\SubmissionCollection;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$submissions = SubmissionCollection::collection(Submission::all());
        $submissions = new SubmissionCollection(Submission::all());
        return response()->json(
            [
                'status' => 'success',
                'submissions' => $submissions->toArray()
            ], 200);
    }

   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation
        $data = $request->validate([
            'sapid'     => ["required", "numeric", "digits_between:1,18", "unique:submissions"],
            'loopback'  => ["required", "ipv4", "unique:submissions"],
            'hostname'  => ["required", "max:14", new Hostname, "unique:submissions"],
            'mac_address' => ["required", "max:17", new MacAddress, "unique:submissions"],
        ]);

        try {
            Submission::create($data);
            return ['status'=>'success'];
        } catch (ModelNotFoundException $e) {
            return ['status'=>'error'];
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
        $submission = new SubmissionCollection(Submission::find($id));
        return response()->json(
            [
                'status' => 'success',
                'submission' => $submission
                //'submission' => $submission->toArray()
            ], 200);
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
        //Validation
        $data = $request->validate([
            'sapid'     => ["required", "numeric", "digits_between:1,18", "unique:submissions,sapid," .$id],
            'loopback'  => ["required", "ipv4", "unique:submissions,loopback,".$id],
            'hostname'  => ["required", "max:14", new Hostname, "unique:submissions,hostname,".$id],
            'mac_address' => ["required", "max:17", new MacAddress, "unique:submissions,mac_address,".$id],
        ]);

        try {
            Submission::find($id)->update($data);
            return ['status'=>'success'];
        } catch (ModelNotFoundException $e) {
            return ['status'=>'error'];
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
        try {
            Submission::find($id)->delete();
            return ['status'=>'success'];
        } catch (ModelNotFoundException $e) {
            return ['status'=>'error'];
        }
    }
}

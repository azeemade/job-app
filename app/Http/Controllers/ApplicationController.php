<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
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
        $resume = $this->uploadResume($request);

        $application = Application::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'coverletter' => $request->coverletter,
            'last_experience_job_title' => $request->last_experience_job_title,
            'last_experience_job_company' => $request->last_experience_job_company,
            'last_experience_job_summary' => $request->last_experience_job_summary,
            'job_id' => $request->job_id,
            'resume' => $resume
        ]);

        return response()->json([
            'status' => (bool) $application,
            'data'   => $application,
            'message' => $application ? 'Application Submitted Successfully!' : 'Error Submitting Application'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
    }

    public function uploadResume(Request $request)
    {
        if ($request->hasFile('resume')) {
            $name = $request->job_1d . "_" . time() . "_" . $request->file('resume')->getClientOriginalName();
            //->move(public_path('images'), $name);
            //$path = Storage::disk('public')->put("resumes", $request->file('resume'));
            $path = $request->file('resume')->storeAs(
                'resumes',
                $name
            );
        }
        return $path;
    }
}

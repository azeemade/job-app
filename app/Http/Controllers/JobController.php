<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Job::all(), 200);
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
        $job = Job::create([
            'job_title' => $request->job_title,
            'job_description' => $request->job_description,
            'company_name' => $request->company_name,
            'company_location' => $request->company_location,
            'job_requirements' => $request->job_requirements,
            'job_types' => $request->job_types,
            'work_conditions' => $request->work_conditions,
            'job_categories' => $request->job_categories,
            'job_salary' => $request->job_salary,
            'business_id' => auth()->user()->id,
        ]);

        return response()->json([
            'status' => (bool) $job,
            'data'   => $job,
            'message' => $job ? 'New Job Created!' : 'Error Creating Job'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return response()->json($job, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        $status = $job->update(
            $request->only([
                'job_title',
                'job_description',
                'company_name',
                'company_location',
                'job_requirements',
                'job_types',
                'work_conditions',
                'job_categories',
                'job_salary',
            ])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Job Updated!' : 'Error Updating Job'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $status = $job->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Job Deleted!' : 'Error Deleting Job'
        ]);
    }

    public function search(Request $request, $job)
    {
        //$search = $request->get('job');

        $result = Job::where('job_title', 'LIKE', "%{$job}%")
            ->orWhere('job_description', 'LIKE', "%{$job}%")
            ->get();

        return response()->json([
            'status' => (bool) $result,
            'data' => $result,
            'message' => $result ? 'Job search is available' : 'Job search is unavailable'
        ]);
    }
}

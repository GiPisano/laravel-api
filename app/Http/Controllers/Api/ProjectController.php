<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $projects = Project::select(['id', 'user_id', 'type_id', 'title', 'description', 'image'])
            ->orderBy('id', 'DESC')
            ->with(['type:id,label,color', 'technologies:id,label,color'])
            ->paginate(12);

        foreach ($projects as $project) {
            $project->image = !empty($project->image) ? asset('storage/' . $project->image) : null;
        };

        return response()->json($projects);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $project = Project::select(['id', 'user_id', 'type_id', 'title', 'description', 'image'])
            ->where('id', $id)
            ->with(['type:id,label,color', 'technologies:id,label,color'])
            ->first();

        $project->image = !empty($project->image) ? asset('storage/' . $project->image) : null;
        return response()->json($project);
    }
}

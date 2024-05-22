<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.projects.index', ['projects' => Project::orderByDesc('id')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $valData = $request->validated();
        $slug = Str::slug($request->title, '-');
        $val_data['slug'] = $slug;

        if ($request->has('cover_image')) {
            $img_path = Storage::put('uploads', $val_data['cover_image']);
            $val_data['cover_image'] = $img_path;
        }
        Project::create($valData);

        return to_route('admin.projects.index')->with('message', "You created a new project, congratulations");;
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $valData = $request->validated();
        $slug = Str::slug($request->title, '-');
        $val_data['slug'] = $slug;

        if ($request->has('cover_image')) {
            if ($project->cover_image) {
                Storage::delete($project->cover_image);
            }
            $img_path = Storage::put('uploads', $val_data['cover_image']);
            $val_data['cover_image'] = $img_path;
        }

        $project->update($val_data);
        return to_route('admin.projects.index')->with('message', "Project $project->title updated, congratulations");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return to_route('admin.projects.index');
    }
}

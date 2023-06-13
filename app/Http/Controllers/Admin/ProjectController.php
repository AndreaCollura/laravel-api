<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Type;
use App\Models\Category;
use illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->is_admin) {
            $projects = Project::paginate(9);
        } else {
            $projects = Project::where('user_id', $user->id)->paginate(9);
        }
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {

        $types = Type::all();
        $categories = Category::all();
        return view('admin.projects.create', compact('categories', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     *
     */
    public function store(StoreProjectRequest $request)
    {
        $form_data = $request->validated();
        $slug = Str::slug($form_data['title'], '-');
        $form_data['slug'] = $slug;
        $form_data['user_id'] = Auth::id();
        $project = Project::create($form_data);
        if ($request->has('categories')) {

            $project->categories()->attach($request->categories);
        }


        /*  if ($request->has('cover_image')) {
            if($project->cover_image ){
                Storage::delete($project->cover_image);
            }
            $image_path = Storage::put('images', $request->cover_image);  ***for preview img***
            $form_data['cover_image'] = $image_path;


        }  */
        return redirect()->route('admin.projects.show', $project->slug)->with('message', "Project {$project->slug} successfully created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     *
     */
    public function show(Project $project)
    {
        if (!Auth::user()->is_admin && $project->user_id !== Auth::id()) {
            abort(403);
        }
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     *
     */
    public function edit(Project $project)
    {
        if (!Auth::user()->is_admin && $project->user_id !== Auth::id()) {
            abort(403);
        }
        $types = Type::all();
        $categories = Category::all();
        return view('admin.projects.edit', compact('project', 'types', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     *
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $form_data = $request->validated();
        $slug = Str::slug($request->title, '-');
        $form_data['slug'] = $slug;
        $project->update($form_data);
        if ($request->has('categories')) {
            $project->categories()->sync($request->categories);
        } else {
            $project->categories()->sync([]);
        }

        /*  if ($request->has('cover_image')) {
            if($project->cover_image ){
                Storage::delete($project->cover_image);
            }
            $image_path = Storage::put('images', $request->cover_image);  ***for preview img***
            $form_data['cover_image'] = $image_path;


        }  */

        return redirect()->route('admin.projects.show', $project->slug)->with('message', "Project {$project->slug} successfully edited");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     *
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', "$project->title deleted successfully!");
    }
}


/* $form_data = $request->validated();
        $slug = Str::slug($form_data['title'], '-');
        $form_data['slug'] = $slug;
        $form_data['user_id'] = Auth::id();

         if ($request->has('categories')) {
            $image_path = Storage::put('images', $request->cover_image);  ***for preview img***
            $form_data['cover_image'] = $image_path;


        }
        $project = Project::create($form_data);
        $project->categories()->attach($request->categories);
        return redirect()->route('admin.projects.show', $project->slug)->with('message', "Project {$project->slug} successfully created");
    } */

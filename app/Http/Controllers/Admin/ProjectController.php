<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Symfony\Component\Mime\Part\Multipart\FormDataPart;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin/index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin/create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *  
     */
    public function store(Request $request)
    {
        $this->validation($request);
        $formData = $request->all();

        $project = new Project();

        $project->name = $formData['name'];
        $project->description = $formData['description'];
        $project->github_link = $formData['github_link'];
        $project->slug = Str::slug($formData['name'], '-');
        $project->type_id = $formData['type_id'];

        $project->save();

        if (array_key_exists('technologies', $formData)) {
            $project->technologies()->attach($formData['technologies']);
        };

        return  redirect()->route('admin.projects.show', $project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $types = Type::all();

        return view('admin/show', compact('project', 'types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin/edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->validation($request);

        $formData = $request->all();
        $project->update($formData);
        $project->save();

        if (array_key_exists('technologies', $formData)) {
            $project->technologies()->sync($formData['technologies']);
        } else {
            $project->technologies()->detach();
        };

        return redirect()->route('admin.projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }

    private function validation($request)
    {
        $formData = $request->all();
        $validator = Validator::make($formData, [
            'name' => 'required|max:100',
            'description' => 'required|max:255',
            'github_link' => 'required|max:255',
            'type_id' => 'nullable|exists:types,id'
        ], [
            'name.required' => 'Devi inserire il titolo',
            'description.required' => 'Inserisci una breve descrizione',
            'github_link.required' => "E' necessario allegare il link di github",
            'type_id.exists' => "E' necessario inserire la tipologia"
        ])->validate();

        return $validator;
    }
}

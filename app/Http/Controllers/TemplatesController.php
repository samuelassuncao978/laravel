<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\Template;

class TemplatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Template $templates)
    {
        return view("pages.templates.index")->with("templates", $templates->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view("pages.templates.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "notification" => "required",
        ]);
        $template = (new Template())->create($validated);

        return redirect("templates/" . $template->id)->with("message", "Successfully created template!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Template $template)
    {
        return view("pages.templates.show")->with("template", $template);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function editor(Request $request, Template $template)
    {
        return view("pages.templates.editor")->with("template", $template);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Template $template)
    {
        return view("pages.templates.edit")->with("template", $template);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Template $template)
    {
        $validated = $request->validate([
            "template" => "required",
        ]);
        $template->update($validated);
        return redirect("templates/" . $template->id)->with("message", "Successfully updated template!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Template $template)
    {
        $template->delete();
        return redirect("templates")->with("message", "Successfully deleted template!");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blueprint;
use App\Tag;

class BlueprintController extends Controller
{
    /**
    * GET /
    */
    public function index(Request $request)
    {
        $blueprints = Blueprint::orderBy('title')->with('tags')->get();
        $tags = Tag::orderBy('name')->get();

        return view('blueprints.index')->with([
            'blueprints' => $blueprints,
            'tags' => $tags,
        ]);
    }

    /*
    * POST /blueprint
    */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'tag' => 'required',
        ]);

        $blueprint = new Blueprint();
        $blueprint->title = $request->input('title');
        $blueprint->map_legend = false;

        $blueprint->save();

        $blueprint->tags()->sync($request->input('tag'));

        return redirect()->action(
            'BlueprintController@show', ['id' => $blueprint->id]
        );
    }

    /*
    * GET /blueprint/{id}/
    */
    public function show($id)
    {
        $blueprint = Blueprint::find($id);

        if (!$blueprint) {
            return redirect('/')->with('alert', 'Blueprint not found.');
        }

        $features = $blueprint->features->sortByDesc('priority');

        return view('blueprints.show')->with([
            'blueprint' => $blueprint,
            'features' => $features,
        ]);
    }

    /*
    * GET /blueprint/{id}/edit
    */
    public function edit($id)
    {
        $blueprint = Blueprint::find($id);

        if (!$blueprint) {
            return redirect('/')->with('alert', 'Blueprint not found.');
        }

        $tags = Tag::orderBy('name')->get();

        return view('blueprints.edit')->with([
            'blueprint' => $blueprint,
            'tags' => $tags,
        ]);
    }

    /*
    * PUT /blueprint/{id}
    */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'tag' => 'required',
        ]);
        
        $blueprint = Blueprint::find($id);
        $blueprint->title = $request->input('title');
        $blueprint->tags()->sync($request->input('tag'));
        $blueprint->save();

        return redirect('/')->with('alert', 'Your changes were saved.');
    }

    /*
    * GET /blueprint/{id}/delete
    */
    public function delete($id)
    {
        $blueprint = Blueprint::find($id);

        if (!$blueprint) {
            return redirect('/')->with('alert', 'Blueprint not found.');
        }

        return view('blueprints.delete')->with([
            'blueprint' => $blueprint,
            'previousUrl' => url()->previous() == url()->current() ? '/' : url()->previous(),
        ]);
    }

    /*
    * DELETE /blueprint/{id}
    */
    public function destroy($id)
    {
        $blueprint = Blueprint::find($id);

        if (!$blueprint) {
            return redirect('/')->with('alert', 'Blueprint not found');
        }

        $blueprint->tags()->detach();

        $blueprint->delete();

        return redirect('/')->with('alert', $blueprint->title.' was removed.');
    }

    /*
    * PUT /blueprint/{id}/legend
    */
    public function legend(Request $request, $id)
    {
        $blueprint = Blueprint::find($id);
        $blueprint->map_legend = !$blueprint->map_legend;

        $blueprint->save();

        return redirect()->action(
            'BlueprintController@show', ['id' => $blueprint->id]
        );
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blueprint;

class BlueprintController extends Controller
{
    /**
    * GET /
    */
    public function index(Request $request)
    {
        $blueprints = Blueprint::orderBy('title')->get();

        return view('blueprints.index')->with([
            'blueprints' => $blueprints,
        ]);
    }

    /*
    * POST /blueprint/
    */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
        ]);

        $blueprint = new Blueprint();
        $blueprint->title = $request->input('title');
        $blueprint->map_legend = false;
        $blueprint->save();

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

        if (!$blueprint)
        {
            return redirect('/')->with('alert', 'Blueprint not found.');
        }

        return view('blueprints.show')->with([
            'blueprint' => $blueprint,
        ]);
    }
}

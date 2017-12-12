<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blueprint;
use App\Feature;

class FeatureController extends Controller
{
    /*
    * POST /feature
    */
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'value' => 'required|numeric',
            'complexity' => 'required|numeric',
        ]);

        $feature = new Feature();
        $feature->title = $request->input('title');
        $feature->value = $request->input('value');
        $feature->complexity = $request->input('complexity');
        $feature->blueprint_id = $id;
        $feature->save();

        return redirect()->action(
            'BlueprintController@show', ['id' => $id]
        );
    }

    /*
    * GET /feature/{id}/edit
    */
    public function edit($id)
    {
        $feature = Feature::find($id);

        if (!$feature)
        {
            return redirect('/')->with('alert', 'Feature not found.');
        }

        return view('features.edit')->with([
            'feature' => $feature,
        ]);
    }

    /*
    * PUT /feature/{id}
    */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'value' => 'required|numeric',
            'complexity' => 'required|numeric',
        ]);
        $feature = Feature::find($id);
        $feature->title = $request->input('title');
        $feature->value = $request->input('value');
        $feature->complexity = $request->input('complexity');
        $feature->save();
        return redirect()->action(
            'BlueprintController@show', ['id' => $feature->blueprint->id]
        )->with('alert', 'Your changes were saved.');
    }

    /*
    * GET /feature/{id}/delete
    */
    public function delete($id)
    {
        $feature = Feature::find($id);

        if (!$feature)
        {
            return redirect('/')->with('alert', 'Feature not found.');
        }

        return view('features.delete')->with([
            'feature' => $feature,
            'previousUrl' => url()->previous() == url()->current() ? '/' : url()->previous(),
        ]);
    }

    /*
    * DELETE /feature/{id}
    */
    public function destroy($id)
    {
        $feature = Feature::find($id);
        $blueprintId = $feature->blueprint->id;

        if (!$feature) {
            return redirect('/')->with('alert', 'Feature not found');
        }
        $feature->delete();
        return redirect()->action(
            'BlueprintController@show', ['id' => $blueprintId]
        )->with('alert', $feature->title.' was removed.');
    }
}

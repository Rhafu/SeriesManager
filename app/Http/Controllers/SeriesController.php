<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
  public function index(Request $request)
  {
    $series = Series::all();
    $successMessage = session('message.success');
    return view('series.index')->with('series', $series)->with('successMessage', $successMessage);
  }

  public function create()
  {
    return view('series.create');
  }

  public function edit(Series $series)
  {
    return view('series.edit')->with('series', $series);
  }

  public function store(SeriesFormRequest $request)
  {
    $series = Series::create($request->all());
    return redirect('/series')->with('message.success', "Series '$series->name' was save with success!");
  }

  public function destroy(Series $series, Request $request)
  {
    $series->delete();
    return redirect('/series')->with('message.success', "Series '$series->name' was remove with success!");
  }

  public function update(Series $series, SeriesFormRequest $request)
  {
    $oldName = $series->name;
    $series->fill($request->all());
    $series->save();
    return redirect('/series')->with('message.success', "Series was update from '$oldName' to '$series->name' successfully!");
  }
}
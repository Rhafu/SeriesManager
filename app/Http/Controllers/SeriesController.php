<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
  public function index(Request $request)
  {
    $series = Serie::all();
    $successMessage = session('message.success');
    return view('series.index')->with('series', $series)->with('successMessage', $successMessage);
  }

  public function create()
  {
    return view('series.create');
  }

  public function edit(Serie $series)
  {
    return view('series.edit')->with('series', $series);
  }

  public function store(Request $request)
  {
    $series = Serie::create($request->all());
    return redirect('/series')->with('message.success', "Series '$series->nome' was save with success!");
  }

  public function destroy(Serie $series, Request $request)
  {
    $series->delete();
    return redirect('/series')->with('message.success', "Series '$series->nome' was remove with success!");
  }

  public function update(Serie $series, Request $request)
  {
    $newName = $request->input('nome');
    $oldName = $series->nome;
    $series->update(['nome' => $newName]);
    return redirect('/series')->with('message.success', "Series was update from '$oldName' to '$newName' successfully!");
  }
}
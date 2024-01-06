<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
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

    $seasons = [];
    for($i = 1; $i <= $request->seasonsQuantity; $i++){
      $seasons[] = [
        'number' => $i,
        'series_id' => $series->id
      ];
    }
    Season::insert($seasons);

    $episodes = [];
    foreach($series->seasons as $season){
      for($j = 1; $j <= $request->episodesPerSeason; $j++){
        $episodes[] = [
          'number' => $j,
          'season_id' => $season->id
        ];
      }  
    }
    Episode::insert($episodes);

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
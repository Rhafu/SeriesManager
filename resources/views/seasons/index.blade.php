<x-layout title='Temporadas de {!! $series->name !!}'>
  <ul class="list-group">
    @foreach ($seasons as $season)
    <li class="list-group-item d-flex justify-content-between align-items-center">
      Temporada N° {{$season->number}}
      <div class="d-flex p-1 text-white rounded border border-dark bg-secondary">
        {{$season->episodes->count()}}
      </div>
    </li>
    @endforeach
  </ul>
</x-layout>

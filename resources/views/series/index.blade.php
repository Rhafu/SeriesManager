<x-layout title='Lista séries'>
  <a href="/series/create" class="btn btn-dark mb-2">Adicionar Série</a>

  @isset($successMessage)
  <div class="alert alert-success">
    {{$successMessage}}
  </div>
  @endisset

  <ul class="list-group">
    @foreach ($series as $serie)
    <li class="list-group-item d-flex justify-content-between align-items-center">
      {{$serie->nome}}
      <div class="d-flex">
        <a class="mx-1 btn btn-success btn-sm" href="/series/{{ $serie->id }}/edit">Edit</a>
        <form action="/series/{{ $serie->id }}" method="post">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger btn-sm">X</button>
        </form>
      </div>
    </li>
    @endforeach
  </ul>
</x-layout>

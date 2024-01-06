<x-layout title="Editar Série '{!! $series->name !!}'">
  <form action="/series/{{ $series->id }}" method='post'>
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="nome" class="form-label">Série: </label>
      <input 
        type="text"
        name="name"
        class="form-control"
        @isset($series->name)value="{{$series->name}}"@endisset>
      <button type="submit" class="btn btn-primary mt-2">Salvar</button>
    </div>
  </form>
</x-layout>
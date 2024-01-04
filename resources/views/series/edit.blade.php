<x-layout title='Editar Série'>
  <form action="/series/{{ $series->id }}" method='post'>
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="nome" class="form-label">Série: </label>
      <input type="text" name="nome" class="form-control" value="{{ $series->nome }}">
      <button type="submit" class="btn btn-primary mt-2">Editar</button>
    </div>
  </form>
</x-layout>
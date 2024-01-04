<x-layout title='Nova Série'>
  <form action="/series" method='post'>
    @csrf
    <div class="mb-3">
      <label for="nome" class="form-label">Série: </label>
      <input type="text" name="nome" class="form-control">
      <button type="submit" class="btn btn-primary mt-2">Salvar</button>
    </div>
  </form>
</x-layout>
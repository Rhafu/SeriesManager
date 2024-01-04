<form action="{{ $action }}" method='post'>
    @csrf
    @isset($name)
      @method('PUT')
    @endisset
    <div class="mb-3">
      <label for="nome" class="form-label">Série: </label>
      <input 
        type="text"
        name="nome"
        class="form-control"
        @isset($name)value="{{$name}}"@endisset>
      <button type="submit" class="btn btn-primary mt-2">Salvar</button>
    </div>
</form>
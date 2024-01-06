<x-layout title='Nova Série'>
  <form action="/series" method='post'>
    @csrf
    <div class="row mb-3">
      <div class="col-8">
        <label for="name" class="form-label">Série: </label>
        <input 
          autofocus
          type="text"
          name="name"
          class="form-control"
          value="{{old('name')}}">
      </div>
      <div class="col-2">
        <label for="seasonsQuantity" class="form-label">N° Temporadas: </label>
        <input 
          type="text"
          name="seasonsQuantity"
          class="form-control"
          value="{{old('seasonsQuantity')}}">
      </div>
      <div class="col-2">
        <label for="episodesPerSeason" class="form-label">Eps/Temporada: </label>
        <input 
          type="text"
          name="episodesPerSeason"
          class="form-control"
          value="{{old('episodesPerSeason')}}">
      </div>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Salvar</button>
  </form>
</x-layout>
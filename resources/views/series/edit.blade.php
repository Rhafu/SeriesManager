<x-layout title="Editar Série '{{ $series->nome }}'">
  <x-form action="/series/{{ $series->id }}" name="{{ $series->nome }}"/>
</x-layout>
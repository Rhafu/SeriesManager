<x-layout title="Editar Série '{{ $series->name }}'">
  <x-form action="/series/{{ $series->id }}" name="{{ $series->name }}" :update="true"/>
</x-layout>
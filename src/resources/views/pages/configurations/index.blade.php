@extends('layouts.dashboard')

@section('title', 'Configurações')

@section('content')
<x-broadcrumb />

<h1 class="text-xl text-black dark:text-white font-semibold mt-4">Configurações</h1>
<p class="text-sm">Gerencie as configurações do sistema, incluindo preferências gerais, notificações e personalizações da
  interface.</p>
  
<form>
  <h2 class="mt-4 text-lg">Informações do hotel</h2>
  <hr class="text-gray-300" />

  <div class="grid grid-cols-12 gap-4 mt-4">
    <div class="col-span-3">
      <x-inputs.label for="hotel['fantasy_name']">Nome Fantasia</x-inputs.label>
      <x-inputs.input name="hotel['fantasy_name']" type="text" placeholder="Digite o nome fantasia" />
    </div>

    <div class="col-span-5">
      <x-inputs.label for="hotel['corporate_reason']">Razão Social</x-inputs.label>
      <x-inputs.input for="hotel['corporate_reason']" type="text" placeholder="Digite a razão social" />
    </div>

    <div class="col-span-2">
      <x-inputs.label for="hotel['document']">CNPJ</x-inputs.label>
      <x-inputs.input for="hotel['document']" type="text" placeholder="00.000.000/0000-00" />
    </div>

    <div class="col-span-2">
      <x-inputs.label for="hotel['telephone']">Telefone</x-inputs.label>
      <x-inputs.input for="hotel['telephone']" type="text" placeholder="(00) 00000-0000" />
    </div>

    <div class="col-span-3">
      <x-inputs.label for="hotel['email']">E-mail</x-inputs.label>
      <x-inputs.input for="hotel['email']" type="text" placeholder="email@email.com" />
    </div>
  </div>

  <h2 class="mt-4 text-lg">Aparência</h2>
  <hr class="text-gray-300" />

  <div class="grid grid-cols-12 gap-4 mt-4">
    <div class="col-span-2">
      <x-inputs.label for="interface['theme']">Tema</x-inputs.label>
      <x-inputs.select name="interface['theme']">
        <option value="light">Claro</option>
        <option value="dark">Escuro</option>
      </x-inputs.select>
    </div>
  </div>

  <h2 class="mt-4 text-lg">Quartos</h2>
  <hr class="text-gray-300" />

  <div class="grid grid-cols-12 gap-4 mt-4">
    <div class="col-span-4">
      <x-inputs.label for="bedroom['notify_vacant']">Notificar quarto que precisa ser desocupado?</x-inputs.label>
      <x-inputs.select name="bedroom['notify_vacant']">
        <option value="false">Não notificar</option>
        <option value="true">Sim, notificar</option>
      </x-inputs.select>
    </div>

    <div class="col-span-4">
      <x-inputs.label for="bedroom['notify_vacant']">Caso ultrapasse o tempo estimado, cobrar?</x-inputs.label>
      <x-inputs.select name="bedroom['notify_vacant']">
        <option value="false">Não cobrar</option>
        <option value="true">Sim, cobrar por tempo passado</option>
      </x-inputs.select>
    </div>
  </div>

  <div class="flex justify-end mt-4">
    <x-buttons.indigo type="submit">Aplicar configurações</x-buttons.button>
  </div>
</form>
@endsection

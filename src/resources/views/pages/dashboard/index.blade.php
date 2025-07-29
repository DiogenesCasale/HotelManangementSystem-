@extends("layouts.dashboard")

@section("title", "Dashboard")

@section("content")
<x-broadcrumb />

<div class="flex items-center mt-4">
  <h1 class="text-xl text-black dark:text-white font-semibold mr-4">Indicadores gerais</h1>

  <select name="period" class="appearance-none outline-none text-xs bg-white text-black dark:text-white dark:bg-zinc-900 px-3 py-1 rounded-md border border-gray-300 dark:border-zinc-700 hover:border-indigo-500">
    <option value="today">Hoje</option>
    <option value="week">Semana atual</option>
    <option value="month">Mês atual</option>
    <option value="year">Ano atual</option>
    <option value="all">Todo o período</option>
  </select>
</div>

<div class="grid grid-cols-12 gap-4 mt-3">
  <x-dashboard.card title="Taxa de ocupação" class="col-span-4 animate-fade-down" icon="hotel-fill" legend="Ocupação" value="80%" porcent="80" />

  <x-dashboard.card title="Hospedados" class="col-span-4 animate-fade-down animate-delay-200" icon="users-fill" legend="Total" value="5 / 50" porcent="{{ 5 / 50 * 100 }}" />

  <x-dashboard.card title="Novas reservas" class="col-span-4 animate-fade-down animate-delay-400" icon="calendar-alt-fill" legend="Novas" value="10 / 45" porcent="{{ 10 / 45 * 100 }}" />

  <x-dashboard.card title="Reservas canceladas" class="col-span-4 animate-fade-down animate-delay-600" icon="calendar-alt-fill" legend="Canceladas" value="1 / 45" porcent="{{ 1 / 45 * 100 }}" />
</div>

<div class="flex">
  <h2 class="text-xl font-semibold mt-4">Gráficos gerais</h2>
</div>
@endsection
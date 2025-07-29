@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <x-broadcrumb />

    <div class="flex gap-2 mt-4 align-middle">
        <h1 class="text-xl font-semibold text-black dark:text-white">
            Movimentações
        </h1>

        <div class="group relative flex items-center">
            <x-icons.info-circle-fill class="text-indigo-500/70 inline-block" />

            <div
                class="group-hover:block hidden absolute top-1/2 left-1/2 bg-white border border-gray-200 dark:border-gray-700 rounded-md p-2 shadow-md w-sm">
                <p class="text-sm text-gray-500 dark:text-gray-400 text-pretty">
                    As movimentações são todas realizadas no sistema automaticamente.
                </p>
            </div>
        </div>
    </div>

    <div class="flex items-center mt-2">
        <x-inputs.input type="search" placeholder="Pesquise aqui..." class="text-sm mr-2 max-w-sm" />
        <x-buttons.indigo class="text-sm mr-2">Pesquisar</x-buttons.indigo>
        <x-buttons.indigo class="text-sm w-24" id="filters-button">Filtros</x-buttons.indigo>
    </div>

    <x-tables.table headerComponent="tables.movements.header" rowComponent="tables.movements.row" class="mt-4"
        id="table" />

    <x-modal.overlay id="overlay" class="hidden" />
    <x-modal.modal-sidebar-right id="filter-modal" class="hidden" title="Filtros"
        description="Filtre de forma mais eficiente">
        <form class="grid grid-cols-12 gap-2">
            <div class="col-span-12">
                <x-inputs.label for="name">Nome</x-inputs.label>
                <x-inputs.input name="name" type="text" placeholder="Nome" class="w-full" />
            </div>

            <div class="col-span-12">
                <x-inputs.label for="document">Documento</x-inputs.label>
                <x-inputs.input name="document" type="text" placeholder="000.000.000-00 / 00.000.000/0000-00" />
            </div>

            <div class="col-span-12">
                <x-inputs.label for="role">Cargo</x-inputs.label>
                <x-inputs.select name="role">
                    <option value="">Selecione o cargo</option>
                </x-inputs.select>
            </div>

            <div class="col-span-12">
                <x-inputs.label for="status">Status</x-inputs.label>
                <x-inputs.select name="status">
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                </x-inputs.select>
            </div>

            <div class="col-span-12">
                <x-buttons.indigo class="w-full">Filtrar</x-buttons.indigo>
            </div>
        </form>
    </x-modal.modal-sidebar-right>
@endsection

@section('scripts')
    @vite('resources/js/pages/finances/movements/index.js')
@endsection

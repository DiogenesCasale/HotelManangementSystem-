@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <x-broadcrumb />

    <h1 class="text-xl font-semibold mt-4 text-black dark:text-white">Vendas</h1>

    <div class="flex items-center mt-2">
        <x-inputs.input type="search" placeholder="Pesquise aqui..." class="text-sm mr-2 max-w-sm" />
        <x-buttons.indigo class="text-sm mr-2">Pesquisar</x-buttons.indigo>
        <x-buttons.indigo class="text-sm w-24" id="filters-button">Filtros</x-buttons.indigo>

        <x-buttons.indigo class="text-sm w-32 ml-auto" id="create-sell-button">Nova Venda</x-buttons.indigo>
    </div>

    <x-tables.table headerComponent="tables.sells.header" rowComponent="tables.sells.row" class="mt-4" id="table" />

    <x-modal.overlay id="overlay" class="hidden" />
    <x-modal.modal-sidebar-right id="filter-modal" class="hidden" title="Filtros"
        description="Filtre de forma mais eficiente">
        <form class="grid grid-cols-12 gap-2">
            <div class="col-span-12">
                <x-inputs.label for="status">Status</x-inputs.label>
                <x-inputs.select name="status">
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                </x-inputs.select>
            </div>

            <div class="col-span-12">
                <x-inputs.label for="product">Produto</x-inputs.label>
                <x-inputs.input name="product" type="text" placeholder="Coca-cola" class="w-full" />
            </div>

            <div class="col-span-12">
                <x-inputs.label for="guest">Hóspede</x-inputs.label>
                <x-inputs.select name="guest">
                    <option value="">Selecione</option>
                </x-inputs.select>
            </div>

            <div class="col-span-12">
                <x-buttons.indigo class="w-full">Filtrar</x-buttons.indigo>
            </div>
        </form>
    </x-modal.modal-sidebar-right>

    <x-modal.modal class="hidden w-6xl" id="sell-modal" title="Nova venda"
        description="Preencha os campos para realizar uma venda">
        <x-forms.sell />
    </x-modal.modal>

@endsection

@section('scripts')
    @vite('resources/js/pages/sells/index.js')
@endsection

<form {{ $attributes->merge(['class' => 'grid grid-cols-12 gap-2']) }}>
    <div class="col-span-7">
        <x-inputs.label for="product">Produto</x-inputs-label>
            <x-inputs.input type="text" name="product" placeholder="Produto 01" />
    </div>

    <div class="col-span-2">
        <x-inputs.label for="quantity">Quantidade</x-inputs-label>
            <x-inputs.input type="text" name="quantity" placeholder="000" />
    </div>

    <div class="col-span-3">
        <x-inputs.label for="value">Valor</x-inputs-label>
            <x-inputs.input type="text" name="value" placeholder="R$ 00,00" />
    </div>

    <div class="col-span-4">
        <x-inputs.label for="lote">Lote</x-inputs-label>
            <x-inputs.input type="text" name="lote" />
    </div>

    <div class="col-span-4">
        <x-inputs.label for="validade">Validade</x-inputs-label>
            <x-inputs.input type="date" name="validade" placeholder="00/00/0000" />
    </div>

    <div class="col-span-4">
        <x-inputs.label for="supplier">Fornecedor</x-inputs-label>
            <x-inputs.select>
                <option value="">Selecione</option>
            </x-inputs.select>
    </div>

    <div class="col-span-12 mt-2 flex">
        <x-buttons.indigo type="submit"
            class="w-36 text-center text-sm ml-auto font-semibold">Cadastrar</x-buttons.indigo-button>
    </div>
</form>

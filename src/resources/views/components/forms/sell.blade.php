<form {{ $attributes->merge(['class' => 'grid grid-cols-12 gap-2']) }}>
    <div class="col-span-5">
        <x-inputs.label for="product">Produto<span class="text-red-500">*</span></x-inputs.label>

        <div class="flex">
            <x-inputs.select class="rounded-r-none" name="product" required>
                <option value="">Selecione</option>
            </x-inputs.select>
            <x-buttons.indigo class="text-sm font-semibold rounded-l-none">
                <x-icons.search-fill />
            </x-buttons.indigo>
        </div>
    </div>

    <div class="col-span-2">
        <x-inputs.label for="quantity">Quantidade<span class="text-red-500">*</span></x-inputs.label>
        <x-inputs.input type="number" name="quantity" required />
    </div>

    <div class="col-span-5">
        <x-inputs.label for="guest">Hóspede<span class="text-red-500">*</span></x-inputs.label>
        <div class="flex">
            <x-inputs.select class="rounded-r-none" name="guest" required>
                <option value="">Selecione</option>
            </x-inputs.select>
            <x-buttons.indigo class="text-sm font-semibold rounded-l-none">
                <x-icons.search-fill />
            </x-buttons.indigo>
        </div>
    </div>

    <div class="col-span-12">
        <x-tables.table headerComponent="tables.sells.product.header" rowComponent="tables.sells.product.row"
            class="mt-4" id="products" />
    </div>

    <div class="col-span-12">
        <p class="font-semibold text-md">Total: <span class="font-normal text-sm">R$ 0,00</span></p>
    </div>

    <div class="col-span-12 mt-2 flex">
        <x-buttons.indigo type="submit"
            class="w-36 text-center text-sm ml-auto font-semibold">Cadastrar</x-buttons.indigo-button>
    </div>
</form>

<form {{ $attributes->merge(['class' => 'grid grid-cols-12 gap-2']) }}>
    <div class="col-span-7">
        <x-inputs.label for="name">Nome<span class="text-red-500">*</span></x-inputs-label>
            <x-inputs.input type="text" name="name" placeholder="Quarto 01" required />
    </div>

    <div class="col-span-5">
        <x-inputs.label for="number">Valor<span class="text-red-500">*</span></x-inputs-label>
            <x-inputs.input type="text" name="number" placeholder="000" required />
    </div>

    <div class="col-span-12">
        <x-inputs.label for="description">Descrição</x-inputs-label>
            <x-inputs.textarea class="h-36" name="description" placeholder="Descrição" />
    </div>

    <div class="col-span-12 mt-2 flex">
        <x-buttons.indigo type="submit"
            class="w-36 text-center text-sm ml-auto font-semibold">Cadastrar</x-buttons.indigo-button>
    </div>
</form>

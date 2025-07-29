<form {{ $attributes->merge(['class' => 'grid grid-cols-12 gap-2']) }}>
    <div class="col-span-9">
        <x-inputs.label for="name">Nome</x-inputs-label>
            <x-inputs.input type="text" name="name" placeholder="Conta 1" />
    </div>

    <div class="col-span-3">
        <x-inputs.label for="value">Apelido</x-inputs-label>
            <x-inputs.input type="text" name="value" placeholder="R$ 0,00" />
    </div>

    <div class="col-span-12 mt-2 flex">
        <x-buttons.indigo type="submit"
            class="w-36 text-center text-sm ml-auto font-semibold">Cadastrar</x-buttons.indigo-button>
    </div>
</form>

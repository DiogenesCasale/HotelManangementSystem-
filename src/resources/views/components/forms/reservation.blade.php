<form {{ $attributes->merge(['class' => 'grid grid-cols-12 gap-2']) }}>
    <div class="col-span-12">
        <h2 class="text-black text-lg">Informações básicas</h2>

        <hr class="text-gray-300" />
    </div>

    <div class="col-span-4">
        <x-inputs.label for="guest_id">Hóspede<span class="text-red-500">*</span></x-inputs.label>
        <x-inputs.select name="guest_id" required>
            <option value="" selected disabled>Selecione o hóspede</option>
        </x-inputs.select>
    </div>

    <div class="col-span-4">
        <x-inputs.label for="room_id">Quarto<span class="text-red-500">*</span></x-inputs.label>
        <x-inputs.select name="room_id" required>
            <option value="" selected disabled>Selecione o quarto</option>
        </x-inputs.select>
    </div>

    <div class="col-span-2">
        <x-inputs.label for="check_in">Entrada<span class="text-red-500">*</span></x-inputs.label>
        <x-inputs.input name="check_in" type="date" required />
    </div>

    <div class="col-span-2">
        <x-inputs.label for="check_out">Saída<span class="text-red-500">*</span></x-inputs.label>
        <x-inputs.input name="check_out" type="date" required />
    </div>

    <div class="col-span-12">
        <div class="flex gap-2">
            <div class="w-full">
                <x-inputs.label for="services[]">Serviço</x-inputs-label>
                    <x-inputs.select name="services[]" required>
                        <option value="" selected disabled>Selecione o serviço</option>
                    </x-inputs.select>
            </div>

            <button type="button"
                class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 max-h-9 rounded-md self-end transition-colors">
                <x-icons.plus-fill class="text-white" />
            </button>
        </div>
    </div>

    <div class="col-span-12">
        <x-inputs.label for="observations">Observações</x-inputs.label>
        <x-inputs.textarea name="observations" class="min-h-20" />
    </div>

    <div class="col-span-12">
        <h2 class="text-black text-lg">Resumo</h2>

        <hr class="text-gray-300" />
    </div>

    <div class="col-span-12">
      
    </div>

    <div class="col-span-12 mt-2 flex">
        <x-buttons.indigo type="submit"
            class="w-36 text-center text-sm ml-auto font-semibold">Cadastrar</x-buttons.indigo-button>
    </div>
</form>

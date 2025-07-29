<form {{ $attributes->merge(["class" => "grid grid-cols-12 gap-2"]) }}>
  <div class="col-span-12">
    <h2 class="text-black text-lg">Informações básicas</h2>

    <hr class="text-gray-300" />
  </div>

  <div class="col-span-4">
    <x-inputs.label for="name">Nome<span class="text-red-500">*</span></x-inputs-label>
    <x-inputs.input type="text" name="name" placeholder="Quarto 01" />
  </div>

  <div class="col-span-2">
    <x-inputs.label for="number">Número<span class="text-red-500">*</span></x-inputs-label>
    <x-inputs.input type="text" name="number" placeholder="000"/>
  </div>

  <div class="col-span-3">
    <x-inputs.label for="telephone">Telefone</x-inputs-label>
    <x-inputs.input type="text" name="telephone" placeholder="(00) 00000-0000"/>
  </div>

  <div class="col-span-3">
    <x-inputs.label for="value">Valor do quarto(Base)<span class="text-red-500">*</span></x-inputs-label>
    <x-inputs.input type="text" name="value" placeholder="R$ 000,00"/>
  </div>

  <div class="col-span-12">
    <x-inputs.label for="description">Descrição</x-inputs-label>
    <x-inputs.textarea name="description" class="min-h-20" />
  </div>

  <div class="col-span-12">
    <h2 class="text-black text-lg">Características</h2>

    <hr class="text-gray-300" />
  </div>

  <div class="col-span-12">
    <div class="flex gap-2">
      <div class="w-full">
        <x-inputs.label for="attr[0]['name']">Nome</x-inputs-label>
        <x-inputs.input type="text" name="attr[0]['name']" placeholder="Nome da Características" />
      </div>

      <div class="w-full">
        <x-inputs.label for="attr[0]['value']">Valor</x-inputs-label>
        <x-inputs.input type="text" name="attr[0]['value']" placeholder="Valor da Característica" />
      </div>

      <button type="button" class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 max-h-9 rounded-md self-end">
        <x-icons.plus-fill class="text-white" />
      </button>
    </div>
  </div>

  <div class="col-span-12">
    <h2 class="text-black text-lg">Hóspedes</h2>

    <hr class="text-gray-300" />
  </div>
  
  <div class="col-span-12">
    <template id="guest-template">
      <div class="group relative hover:border-indigo-500 bg-gray-200 border border-gray-300 w-14 h-14 rounded-full flex items-center justify-center">
        <x-icons.user-fill class="text-2xl text-indigo-500" />
  
        <button class="group-hover:block hidden absolute right-0 -top-1" type="button">
          <x-icons.xmark-fill class="text-xl text-red-500" />
        </button>
      </div>
    </template>

    <div class="flex gap-2">
      <div class="group relative hover:border-indigo-500 bg-gray-200 border border-gray-300 w-14 h-14 rounded-full flex items-center justify-center">
        <x-icons.user-fill class="text-2xl text-indigo-500" />

        <button class="group-hover:block hidden absolute right-0 -top-1" type="button">
          <x-icons.xmark-fill class="text-xl text-red-500" />
        </button>
      </div>

      <button class="relative hover:border-indigo-500 bg-gray-200 border border-gray-300 w-14 h-14 rounded-full flex items-center justify-center" type="button">
        <x-icons.plus-fill class="text-2xl text-indigo-500" />
      </button>
    </div>
  </div>

  <div class="col-span-12 mt-2 flex">
    <x-buttons.indigo type="submit" class="w-36 text-center text-sm ml-auto font-semibold">Cadastrar</x-buttons.indigo-button>
  </div>
</form>
<form {{ $attributes->merge(["class" => "grid grid-cols-12 gap-2"]) }}>
  <div class="col-span-4">
    <x-inputs.label for="name">Nome</x-inputs-label>
    <x-inputs.input type="text" name="name" placeholder="João da Silva"/>
  </div>

  <div class="col-span-4">
    <x-inputs.label for="nickname">Apelido</x-inputs-label>
    <x-inputs.input type="text" name="nickname" placeholder="João"/>
  </div>

  <div class="col-span-4">
    <x-inputs.label for="document">Documento</x-inputs-label>
    <x-inputs.input type="text" name="document" placeholder="000.000.000-00"/>
  </div>

  <div class="col-span-3">
    <x-inputs.label for="birthday">Dana de nascimento</x-inputs-label>
    <x-inputs.input type="date" name="birthday"/>
  </div>

  <div class="col-span-2">
    <x-inputs.label for="balance">Saldo</x-inputs-label>
    <x-inputs.input type="text" name="balance" placeholder="R$ 0,00"/>
  </div>

  <div class="col-span-12 mt-2 flex">
    <x-buttons.indigo type="submit" class="w-36 text-center text-sm ml-auto font-semibold">Cadastrar</x-buttons.indigo-button>
  </div>
</form>
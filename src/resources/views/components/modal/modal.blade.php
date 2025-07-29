<div {{ $attributes->merge(['class' => "fixed top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 transform z-50 max-h-[90vh] max-w-7xl"]) }}>
  <div class="bg-gray-50 rounded-md max-h-[90vh] max-w-7xl overflow-hidden overflow-y-visible animate-fade animate-ease-in-out animate-duration-500">
    <div class="p-4 bg-indigo-500 flex justify-end">
      <div class="mr-auto">
        <h1 class="text-2xl text-pretty font-semibold text-white">{{ $title ?? "Modal" }}</h1>

        @if (isset($description))
          <p class="text-sm text-pretty text-white">{{ $description ?? "This is a modal" }}</p>
        @endif
      </div>
      
      <x-icons.xmark-fill class="text-2xl text-white hover:text-white self-center" id="close" />
    </div>

    <div class="p-4 overflow-y-auto">
      {{ $slot }}
    </div>
  </div>
</div>
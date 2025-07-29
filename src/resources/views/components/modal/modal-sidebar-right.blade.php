<div {{ $attributes->merge(["class" => "bg-gray-50 fixed top-0 right-0 h-full w-full max-w-sm z-50 animate-fade-left animate-duration-500 overflow-hidden rounded-l-xl"])}}>
  <div class="p-4 bg-indigo-500 flex justify-end">
    <div class="mr-auto">
      <h1 class="text-2xl text-pretty font-semibold text-white">{{ $title ?? "Modal" }}</h1>

      @if (isset($description))
        <p class="text-sm text-pretty text-white">{{ $description ?? "This is a modal" }}</p>
      @endif
    </div>
    
    <x-icons.xmark-fill class="text-2xl text-white hover:text-white self-center" id="close" />
  </div>

  <div class="p-4">
    {{ $slot }}
  </div>
</div>
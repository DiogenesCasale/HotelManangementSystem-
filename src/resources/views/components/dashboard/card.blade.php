<div {{ $attributes->merge(['class' => 'bg-white shadow-lg dark:bg-zinc-800 border dark:border-zinc-700 border-none rounded-lg shadow-md p-4']) }}>
    <div class="flex items-center gap-3">
        <x-dynamic-component :component="'icons.' . $icon" class="bg-indigo-500/20 p-4 text-xl text-indigo-500 rounded-lg"/>
        <h2 class="text-base text-black dark:text-white">{{ $title ?? "Sem título" }}</h2>
    </div>

    <div class="mt-4 flex">
        <p class="text-sm text-black dark:text-zinc-400">{{ $legend ?? "Sem legenda" }}</p>

        <span class="ml-auto font-bold text-sm text-black dark:text-white">{{ $value ?? "0%" }}</span>
    </div>

    <div class="w-full bg-neutral-300/50 dark:bg-zinc-700/50 rounded-full h-2 mt-1">
        <div class="bg-indigo-500 h-2 rounded-full" style="width: {{ $porcent }}%;"></div>
    </div>
</div>
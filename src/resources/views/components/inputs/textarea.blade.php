<textarea
    {{ $attributes->merge(['class' => 'border border-gray-300 bg-white rounded-md w-full appearance-none outline-none h-9 hover:border-indigo-400 focus:border-indigo-400 px-2 py-2 dark:bg-zinc-900 dark:border-zinc-800 dark:text-white text-black text-sm']) }}>
  {{ $slot }}
</textarea>

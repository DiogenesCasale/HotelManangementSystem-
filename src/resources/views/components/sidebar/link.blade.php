<a {{ $attributes->merge(["class" => "text-black dark:text-white py-2 px-4 hover:bg-neutral-200 dark:hover:bg-zinc-800 block rounded-md transition-colors duration-300"]) }}> 
    {{ $slot }}
</a>
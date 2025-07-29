<button class="group/menu hover:text-indigo-500 focus:text-indigo-500 text-black dark:text-white py-2 px-4 block text-left">
    <span>
        <x-dynamic-component :component="'icons.' . $icon" class="mr-2 transition-colors duration-300 w-5"/>

        <span class="@max-[100px]/sidebar:hidden">
            {{ $title ?? "Menu sem título" }}
        </span>
    </span>

    <div class="@max-[100px]/sidebar:absolute @max-[100px]/sidebar:bg-zinc-800 @max-[100px]/sidebar:rounded flex flex-col gap-2 group-hover/menu:block group-focus/menu:block hidden ml-2 mt-1 animate-fade-down animate-duration-500">
        {{ $slot }}
    </div>
</button>

<header class="transition-all duration-700 ml-64 bg-gray-50 border-b border-gray-300 dark:border-zinc-700 dark:bg-zinc-900 w-[calc(100%-16rem)] fixed top-0 p-4 flex justify-between items-center h-16" id="navbar">
    <button id="navbar-sidebar-button">
        <x-icons.bars-fill class="text-2xl text-black dark:text-white" />
    </button>

    <x-navbar.notify />
</header>

@vite('resources/js/components/navbar/navbar.js')
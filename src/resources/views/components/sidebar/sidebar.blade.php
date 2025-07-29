<nav class="@container/sidebar transition-all duration-700 bg-gray-50 dark:bg-zinc-900 border-r border-gray-300 dark:border-zinc-700 top-0 h-screen fixed py-4 px-2 w-64 flex flex-col gap-2"
    id="sidebar">
    <h1 class="font-bold text-4xl text-center textblack dark:text-white mb-4">LOGO</h1>

    @php
        $type = 1;
    @endphp

    @if ($type === 1)
        <x-sidebar.receptionist.sidebar />
    @elseif ($type === 2)
        <x-sidebar.housekeeper.sidebar />
    @elseif ($type === 3)
        <x-sidebar.manager.sidebar />
    @endif
</nav>

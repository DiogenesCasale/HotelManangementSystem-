<x-sidebar.link class="hover:text-indigo-500" href="{{ route('dashboard.index') }}">
    <x-icons.home-fill class="mr-2 transition-colors duration-150 w-5" />

    <span class="@max-[100px]/sidebar:hidden">
        Home
    </span>
</x-sidebar.link>

<x-sidebar.link class="hover:text-indigo-500" href="{{ route('dashboard.reservations.index') }}">
    <x-icons.id-badge-fill class="mr-2 transition-colors duration-150 w-5" />

    <span class="@max-[100px]/sidebar:hidden">
        Reservas
    </span>
</x-sidebar.link>

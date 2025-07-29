<x-sidebar.link class="hover:text-indigo-500" href="{{ route('dashboard.index') }}">
    <x-icons.home-fill class="mr-2 transition-colors duration-150 w-5" />

    <span class="@max-[100px]/sidebar:hidden">
        Home
    </span>
</x-sidebar.link>

<x-sidebar.link class="hover:text-indigo-500" href="{{ route('dashboard.users.index') }}">
    <x-icons.users-fill class="mr-2 transition-colors duration-150 w-5" />

    <span class="@max-[100px]/sidebar:hidden">
        Usuários
    </span>
</x-sidebar.link>

<x-sidebar.link class="hover:text-indigo-500" href="{{ route('dashboard.guests.index') }}">
    <x-icons.id-badge-fill class="mr-2 transition-colors duration-150 w-5" />

    <span class="@max-[100px]/sidebar:hidden">
        Hóspedes
    </span>
</x-sidebar.link>

<x-sidebar.menu title="Quartos" icon="hotel-fill">
    <x-sidebar.link class="hover:text-indigo-500" href="{{ route('dashboard.bedrooms.index') }}">
        <x-icons.list-fill class="mr-2 transition-colors duration-150 w-5" />

        <span class="@max-[100px]/sidebar:hidden">
            Listar
        </span>
    </x-sidebar.link>

    <x-sidebar.link class="hover:text-indigo-500" href="{{ route('dashboard.bedrooms.services.index') }}">
        <x-icons.bell-conciege-fill class="mr-2 transition-colors duration-150 w-5" />

        <span class="@max-[100px]/sidebar:hidden">
            Serviços
        </span>
    </x-sidebar.link>
</x-sidebar.menu>

<x-sidebar.menu title="Financeiro" icon="money-bill-fill">
    <x-sidebar.link class="hover:text-indigo-500" href="{{ route('dashboard.finance.movement') }}">
        <x-icons.money-bill-wave-fill class="mr-2 transition-colors duration-150 w-5" />

        Movimentações
    </x-sidebar.link>

    <x-sidebar.link class="hover:text-indigo-500" href="{{ route('dashboard.finance.account') }}">
        <x-icons.credit-card-fill class="mr-2 transition-colors duration-150 w-5" />

        Contas
    </x-sidebar.link>
</x-sidebar.menu>

<x-sidebar.link class="hover:text-indigo-500" href="{{ route('dashboard.storage.index') }}">
    <x-icons.box-fill class="mr-2 transition-colors duration-150 w-5" />

    <span class="@max-[100px]/sidebar:hidden">
        Estoque
    </span>
</x-sidebar.link>

<x-sidebar.link class="hover:text-indigo-500" href="{{ route('dashboard.sale.index') }}">
    <x-icons.shopping-cart-fill class="mr-2 transition-colors duration-150 w-5" />

    <span class="@max-[100px]/sidebar:hidden">
        Venda
    </span>
</x-sidebar.link>

<x-sidebar.link class="mt-auto hover:text-indigo-500" href="{{ route('dashboard.settings.index') }}">
    <x-icons.gear-fill class="mr-2 transition-colors duration-150 w-5" />

    <span class="@max-[100px]/sidebar:hidden">
        Configurações
    </span>
</x-sidebar.link>

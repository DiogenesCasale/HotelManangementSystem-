<div class="text-sm">
    <?php
        $segments = request()->segments();
    ?>

    <ul class="flex">
        @foreach ($segments as $index => $segment)
            <li>
                <p class="first-letter:uppercase dark:text-white text-black">
                    {{ $segment }}
                </p>
            </li>

            @if ($index < count($segments) - 1)
                <span class="mx-1 text-indigo-500">></span>
            @endif
        @endforeach
    </ul>
</div>
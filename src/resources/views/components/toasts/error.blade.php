<template id="error-toast">
    <div
        class="bg-red-500 text-white px-3 py-2 rounded-lg shadow-xl flex gap-4 items-center transform transition-all duration-300 hover:scale-105 animate-fade-up">
        <x-icons.xmark-fill class="text-2xl bg-red-400/50 rounded-md px-2.5 py-2 shadow-inner" />

        <div class="flex flex-col">
            <p class="font-semibold" id="title"></p>

            <p class="tracking-wide text-sm" id="description"></p>
        </div>

        <button class="ml-auto transition-colors duration-200 hover:bg-red-400/50 px-2 py-0.5 rounded-md" id="close">
            <x-icons.xmark-fill />
        </button>
    </div>
</template>

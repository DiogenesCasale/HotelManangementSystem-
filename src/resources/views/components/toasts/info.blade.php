<template id="info-toast">
    <div
        class="bg-yellow-500 text-white px-3 py-2 rounded-lg shadow-xl flex gap-4 items-center transform transition-all duration-300 hover:scale-105 animate-fade-up">
        <x-icons.info-circle-fill class="text-2xl bg-yellow-300/50 rounded-md px-2.5 py-2 shadow-inner" />

        <div class="flex flex-col">
            <p class="font-semibold" id="title"></p>

            <p class="tracking-wide text-sm" id="description"></p>
        </div>

        <button class="ml-auto transition-colors duration-200 text-white hover:bg-yellow-400/50 px-2 py-0.5 rounded-md"
            id="close">
            <x-icons.xmark-fill />
        </button>
    </div>
</template>

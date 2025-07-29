@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="flex h-screen">
        <div class="w-full p-5 flex flex-col items-center justify-center">
            <form class="w-full max-w-xl" id="login-form">
                @csrf
                <x-inputs.label for="login">E-mail<span class="text-red-500">*</span></x-inputs.label>
                <x-inputs.input type="text" name="login" id="login" required />
                <p class="text-red-500 text-sm" id="login-error"></p>

                <x-inputs.label for="password" class="mt-2 block">Senha<span class="text-red-500">*</span></x-inputs.label>
                <x-inputs.input type="password" name="password" id="password" required />
                <p class="text-red-500 text-sm" id="password-error"></p>

                <x-buttons.indigo class="w-full mt-4">Entrar</x-buttons.indigo>
            </form>
        </div>

        <div
            class="hidden w-full bg-gradient-to-tr from-indigo-700 to-indigo-900 sm:flex flex-col items-center justify-center p-5">
            <h1
                class="text-white text-4xl font-bold tracking-wide animate-fade-down animate-ease-in-out animate-duration-1000">
                Bem-vindo novamente!
            </h1>
            <p
                class="text-white text-center text-pretty text-md mt-1 animate-fade-down animate-ease-in-out animate-duration-1000 animate-delay-200">
                Estamos felizes em tê-lo conosco! Nosso sistema foi desenvolvido para tornar o gerenciamento do seu hotel
                mais fácil e eficiente.
            </p>
        </div>
    </div>

    <x-toasts.container id="toast-container">
    </x-toasts.container>

    <x-toasts.success title="Sucesso" message="Login realizado com sucesso!" />
    <x-toasts.error message="Login realizado com sucesso!" />
    <x-toasts.info message="Login realizado com sucesso!" />
@endsection

@section('scripts')
    @vite('resources/js/pages/login/login.js')
@endsection

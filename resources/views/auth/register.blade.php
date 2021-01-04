<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" action="{{ route('register') }}">
        @csrf

            <!-- User Name -->
            <div>
                <label for="pseudo">Nom d'utilisateur</label>

                <x-input id="pseudo" class="block mt-1 w-full" type="text" name="pseudo" :value="old('pseudo')" required autofocus/>
            </div>

            <!-- First Name -->
            <div>
                <label for="firstname">Prénom</label>

                <x-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required/>
            </div>

            <!-- Last Name -->
            <div>
                <label for="lastname">Nom</label>

                <x-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required/>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label for="email">Email</label>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password">Mot de passe</label>

                <x-input id="password" class="block mt-1 w-full"
                         type="password"
                         name="password"
                         required autocomplete="new-password"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation">Confirmation</label>

                <x-input id="password_confirmation" class="block mt-1 w-full"
                         type="password"
                         name="password_confirmation" required/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    Déjà enregistré ?
                </a>

                <x-button class="ml-4">
                    S'enregistrer
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

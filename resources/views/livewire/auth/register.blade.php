<div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <img class="mx-auto h-24 w-auto" src="/images/logo.svg" alt="Splurge logo" />
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <form wire:submit.prevent="register">
                <div>
                    <label for="name" class="block text-sm font-medium leading-5 text-gray-700">
                        Name
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model="name" id="name" type="name" required
                            class="@error('name') border border-red-500 @enderror appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    @error('name') <div class="mt-1 text-red-500 text-sm">{{ $message }}</div> @enderror
                </div>

                <div class="mt-6">
                    <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
                        Email
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model="email" id="email" type="email" required
                            class="@error('email') border border-red-500 @enderror appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    @error('email') <div class="mt-1 text-red-500 text-sm">{{ $message }}</div> @enderror
                </div>

                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium leading-5 text-gray-700">
                        Password
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="password" id="password" type="password" required
                            class="@error('password') border border-red-500 @enderror appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    @error('password') <div class="mt-1 text-red-500 text-sm">{{ $message }}</div> @enderror
                </div>

                <div class="mt-6">
                    <label for="passwordConfirmation" class="block text-sm font-medium leading-5 text-gray-700">
                        Password Confirmation
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="passwordConfirmation" id="passwordConfirmation" type="password" required
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                </div>

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                            Register
                        </button>
                    </span>
                </div>
            </form>

            <div class="mt-6">
                <p class="mt-2 text-center text-sm leading-5 text-gray-600 max-w">
                    <a href="/login"
                        class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                        Already have an account?
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
<form wire:submit.prevent="register">
    <div>
        <label for="name">name</label>
        <input wire:model="name" type="text" name="name" id="name">
        @error('name') <span>{{ $message }}</span> @enderror
    </div>
    <div>
        <label for="email">email</label>
        <input wire:model="email" type="text" name="email" id="email">
        @error('email') <span>{{ $message }}</span> @enderror
    </div>
    <div>
        <label for="password">password</label>
        <input wire:model.lazy="password" type="password" name="password" id="password">
        @error('password') <span>{{ $message }}</span> @enderror
    </div>
    <div>
        <label for="passwordConfirmation">passwordConfirmation</label>
        <input wire:model.lazy="passwordConfirmation" type="password" name="passwordConfirmation"
            id="passwordConfirmation">
    </div>
    <div>
        <input type="submit" value="Register">
    </div>
</form>
<div>
    <h1 class="text-2xl font-semibold text-gray-900">Profile</h1>

    <form wire:submit.prevent="save">
        <div class="mt-6 sm:mt-5">
            <div>
                @if ($saved)
                    <div class="mb-16 w-full bg-white rounded-lg pointer-events-auto">
                        <div class="rounded-lg shadow-xs overflow-hidden">
                            <div class="p-4">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <svg class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div class="ml-3 w-0 flex-1 pt-0.5">
                                        <p class="text-sm leading-5 font-medium text-gray-900">
                                            Successfully saved!
                                        </p>
                                    </div>
                                    <div class="ml-4 flex-shrink-0 flex">
                                        <button
                                            wire:click="$set('saved', false)"
                                            type="button"
                                            class="inline-flex text-gray-400 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150">
                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="username" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                    Username
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="max-w-lg flex rounded-md shadow-sm">
                        <span
                            class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                            workcation.com/
                        </span>
                        <input wire:model="username" id="username"
                            class="flex-1 form-input block w-full min-w-0 rounded-none rounded-r-md transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    @error('username') <div class="mt-1 text-red-500 text-sm">{{ $message }}</div> @enderror
                </div>
            </div>

            <div
                class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="about" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                    About
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="max-w-lg flex rounded-md shadow-sm">
                        <textarea wire:model="about" id="about" rows="3"
                            class="form-textarea block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"></textarea>
                    </div>
                    @error('about') <div class="mt-1 text-red-500 text-sm">{{ $message }}</div> @enderror
                    <p class="mt-2 text-sm text-gray-500">Write a few sentences about yourself.</p>
                </div>
            </div>

            <div
                class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="photo" class="block text-sm leading-5 font-medium text-gray-700">
                    Photo
                </label>
                <div class="mt-2 sm:mt-0 sm:col-span-2">
                    <div class="flex items-center">
                        <span class="h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                            <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </span>
                        <span class="ml-5 rounded-md shadow-sm">
                            <button type="button"
                                class="py-2 px-3 border border-gray-300 rounded-md text-sm leading-4 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                                Change
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 border-t border-gray-200 pt-5">
            <div class="flex justify-end">
                <span class="inline-flex rounded-md shadow-sm">
                    <button type="button"
                        class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                        Cancel
                    </button>
                </span>
                <span class="ml-3 inline-flex rounded-md shadow-sm">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                        Save
                    </button>
                </span>
            </div>
        </div>
    </form>
</div>
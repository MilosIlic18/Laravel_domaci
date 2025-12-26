<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
    <div class="max-w-xl">
        <form method="POST" action="{{route('profile.changeAvatar')}}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div>
                <img src="/storage/images/avatars/{{Illuminate\Support\Facades\Auth::user()->avatar}}" alt="Greska" srcset="">
            </div>
            <div>
                <label for="profile_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Profilna slika
                </label>

                <div class="mt-2">
                    <input
                        type="file"
                        name="profile_image"
                        id="profile_image"
                        accept="image/*"
                        class="block w-full text-sm text-gray-900 dark:text-gray-300
                               file:mr-4 file:py-2 file:px-4
                               file:rounded-md file:border-0
                               file:text-sm file:font-semibold
                               file:bg-indigo-50 file:text-indigo-700
                               hover:file:bg-indigo-100"
                        required
                    />
                </div>

                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    Dozvoljeni formati: JPG, PNG, WEBP (max 2MB)
                </p>
            </div>

            <div class="flex items-center gap-4">
                <button
                    type="submit"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600
                           border border-transparent rounded-md font-semibold
                           text-xs text-white uppercase tracking-widest
                           hover:bg-indigo-500 focus:outline-none focus:ring-2
                           focus:ring-indigo-500 focus:ring-offset-2
                           transition ease-in-out duration-150"
                >
                    Upload
                </button>
            </div>
        </form>
    </div>
</div>


            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

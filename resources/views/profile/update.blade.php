<x-app-layout>
    <section id="team" class="mt-5 team font-web">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col text-center position-relative">
                    <div class="d-flex justify-content-center">
                        @if ($user_image->image === null)
                            <img src="{{ asset('default.jpg') }}" height="200" width="200"
                                class="me-1 border border-1 border-secondary" style="border-radius: 50%;"
                                alt="{{ $user->fname }} Profile">
                        @else
                            <img src="{{ asset($user_image->image) }}" height="200" width="200"
                                class="me-1 border border-1 border-secondary" style="border-radius: 50%;"
                                alt="{{ $user->fname }} Profile">
                        @endif
                    </div>
                    <h4 class="mt-2 mb-0">{{ $user->fname }} {{ $user->mname }} {{ $user->lname }}
                        {{ $user->suffix }}</h4>
                    <small>{{ $user->email }}</small>

                    <div class="position-absolute top-0 end-0 me-2 d-flex">
                        <div class="dropdown me-2">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-pen me-1"></i>Edit
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item"
                                        href="{{ route('update.edit', ['id' => $user->id]) }}">Profile Picture</a></li>
                                <li><a class="dropdown-item" href="#">Change Password</a></li>
                            </ul>
                        </div>

                        <button class="btn btn-outline-danger">
                            <i class="fa-solid fa-trash me-1"></i>Delete
                        </button>
                    </div>
                </div>
            </div>

            <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6"
                enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div class="px-3">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="fname" name="fname" type="text" class="mt-1 block w-full"
                        :value="old('fname', $user->fname)" required autofocus autocomplete="fname" />
                    <x-input-error class="mt-2" :messages="$errors->get('fname')" />
                </div>

                <div class="px-3">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                        :value="old('email', $user->email)" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                        <div>
                            <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                {{ __('Your email address is unverified.') }}

                                <button form="send-verification"
                                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>

                <div class="px-3">
                    <x-input-label for="profile_image" :value="__('Profile Image')" />
                    <input type="file" name="image" id="image">
                    <x-input-error class="mt-2" :messages="$errors->get('image')" />
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>

                    @if (session('status') === 'profile-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                    @endif
                </div>
            </form>
        </div>
    </section>
</x-app-layout>

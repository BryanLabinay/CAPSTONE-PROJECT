<x-app-layout>
    <section id="team" class="mt-5 team font-web">
        <div class="d-flex justify-content-end">
            {{-- Update --}}
            @if (session('update'))
                <script>
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        iconColor: 'white',
                        customClass: {
                            popup: 'colored-toast',
                        },
                        showConfirmButton: false,
                        timer: 2500,
                        timerPr0ogressBar: true,
                    });
                    (async () => {
                        await Toast.fire({
                            icon: 'success',
                            title: 'Profile Picture Changed!'
                        })
                    })()
                </script>
            @endif
        </div>
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
                                class="me-1 border border-1 border-secondary"
                                style="border-radius: 50%; object-fit:cover;" alt="{{ $user->fname }} Profile">
                        @endif
                        {{-- <img src="{{ asset('images/' . $user->image) }}" height="200" width="200"
                            class="border border-1 border-secondary rounded-circle" alt="Profile Picture"> --}}
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
                                <li>
                                    <!-- Add a label to trigger the file input -->
                                    <label class="dropdown-item" for="image" style="cursor: pointer;">
                                        Profile Picture
                                    </label>
                                    <form method="post" action="{{ route('profile.update') }}"
                                        enctype="multipart/form-data" id="profileForm">
                                        @csrf
                                        @method('patch')
                                        <!-- Hidden inputs -->
                                        <input id="fname" name="fname" type="hidden" class="form-control mt-1"
                                            value="{{ old('fname', $user->fname) }}" required autofocus
                                            autocomplete="fname">
                                        <input id="email" name="email" type="hidden" class="form-control mt-1"
                                            value="{{ old('email', $user->email) }}" required autocomplete="username">
                                        <!-- Hidden file input -->
                                        <input type="file" id="image" name="image" style="display: none;"
                                            {{-- accept="image/*" --}}
                                            onchange="document.getElementById('profileForm').submit();">
                                        <!-- Hidden submit button -->
                                        <button type="submit" class="btn btn-primary"
                                            style="display: none;">Change</button>
                                    </form>
                                </li>
                                <li><a class="dropdown-item" href="#">Change Password</a></li>
                                <li><a class="dropdown-item text-danger" href="#">Delete Account</a></li>
                            </ul>
                        </div>
                        {{-- <button class="btn btn-outline-danger">
                            <i class="fa-solid fa-trash me-1"></i>Delete
                        </button> --}}
                    </div>
                </div>
            </div>


            {{-- <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6"
                enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div class="px-3">
                    <input id="fname" name="fname" type="hidden" class="form-control mt-1"
                        value="{{ old('fname', $user->fname) }}" required autofocus autocomplete="fname">
                    @if ($errors->has('fname'))
                        <div class="mt-2 text-danger">
                            {{ $errors->first('fname') }}
                        </div>
                    @endif
                </div>


                <div class="px-3">
                    <input id="email" name="email" type="hidden" class="form-control mt-1"
                        value="{{ old('email', $user->email) }}" required autocomplete="username">
                    @if ($errors->has('email'))
                        <div class="mt-2 text-danger">
                            {{ $errors->first('email') }}
                        </div>
                    @endif

                </div>

                <div class="row mt-3">
                    <div class="col">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="px-3 me-2">
                                <label for="image" class="form-label">Change Profile Picture</label>
                                <input type="file" name="image" id="image" class="form-control">
                                @if ($errors->has('image'))
                                    <div class="mt-2 text-danger">
                                        {{ $errors->first('image') }}
                                    </div>
                                @endif
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary">Change</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form> --}}


            {{-- <div class="row gy-4">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <div class="member">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                    <div class="member">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div> --}}
        </div>
        </div>
    </section>
</x-app-layout>

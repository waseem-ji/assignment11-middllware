<x-layout>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">

                    <div class="card mt-5 mb-5">
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted"></h6>
                            <img src="{{ asset($user->profile_pic ?? asset('images/profile/dummy.jpg')) }}"
                                alt="twbs" width="202" height="202" class="rounded-5 flex-shrink-0">
                            <p class="card-text display-4 mt-5 ">{{ count($user->posts) }} Posts</p>

                        </div>
                    </div>

                </div>
                <a href="/admin/users" class="text-decoration-none">Go back to admin panel</a>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <a href="/admin" class="h2 text-decoration-none">Admin Panel</a>
                </div>
                <div class="px-5 py-3">
                    <div class="border border-light-subtle rounded-4 shadow-sm mt-3 p-4 mb-5">
                        <div class="container">
                            <form action="/admin/{{ $user->id }}/updateUser" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            value="{{ $user->name }} ">

                                        @error('name')
                                            <div class="mt-3">
                                                <p class="blockquote-footer text-danger">{{ $message }} </p>

                                            </div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="email"
                                            value="{{ $user->email }}">

                                        @error('email')
                                            <div class="mt-3">
                                                <p class="blockquote-footer text-danger">{{ $message }} </p>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="date" class="form-label">Date of Birth</label>
                                        <input type="date" name="dob" class="form-control" id="date"
                                            value="{{ $user->dob ?? '' }}">

                                        @error('dob')
                                            <div class="mt-3">

                                                <p class="blockquote-footer text-danger">{{ $message }} </p>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="text" class="form-label">Phone Number</label>
                                        <input type="text" name="phone" class="form-control" id="phone"
                                            value="{{ $user->phone ?? '' }}">

                                        @error('phone')
                                            <div class="mt-3">

                                                <p class="blockquote-footer text-danger">{{ $message }} </p>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <fieldset>
                                                <legend class="fs-5">Gender</legend>

                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="inlineRadio1" value="female"
                                                    {{ $user->gender === 'female' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio1">Female</label>
                                                <input class="form-check-input ms-2" type="radio" name="gender"
                                                    id="inlineRadio1" value="male"
                                                    {{ $user->gender === 'male' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio1">Male</label>
                                            </fieldset>

                                        </div>

                                        @error('gender')
                                            <div class="mt-3">

                                                <p class="blockquote-footer text-danger">{{ $message }} </p>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col input-group mb-3">
                                        <input type="file" class="form-control" name="profile_pic">
                                        @error('images')
                                            <p class="text-danger"> {{ $message }}</p>
                                        @enderror

                                    </div>
                                </div>

                                {{-- <div class="d-flex flex-row-reverse "> --}}
                                <div class="row ">
                                    <div class="d-flex flex-row-reverse  justify-contents-end">
                                        <div class="">
                                            <button type="submit" class="btn btn-outline-success">Update
                                                Profile</button>
                                </form>

                                        </div>
                                        <div class="">
                                    

                                        </div>

                        </div>
                        

                                    </div>
                        

                    </div>
                    {{-- </div> --}}

                </div>
        </div>

    </div>

    </main>
    </div>
    </div>
    <x-flash />
</x-layout>

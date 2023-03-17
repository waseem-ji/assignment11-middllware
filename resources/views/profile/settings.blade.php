<x-layout>


    <div class="container-xxxl mt-5">
        <div class="row gap-3 ">
            <div class="col-2 col-md-3  bg-secondary bg-opacity-25 rounded-4   me-4">
                <ul>


                </ul>
            </div>
            <div class="col-7 text-emphasis-primary bg-light rounded-2">
                <div class="container">
                    <div class="row">

                        {{-- <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                          </div>
                          <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                          </div> --}}
                          <x-profile.profile_form />

                          <x-profile.password_form />
                    </div>


                </div>


            </div>
            <div class="col bg-warning bg-opacity-25 rounded-4">
{{-- right free space --}}
            </div>

        </div>

    </div>
</x-layout>

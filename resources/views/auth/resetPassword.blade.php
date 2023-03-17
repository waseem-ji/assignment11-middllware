<x-layout>
    <div class="container-fluid vh-100" style="margin-top:200px">
        <div class="" style="margin-top:100px">
            <div class="rounded d-flex justify-content-center">
                <div class="col-md-5 col-sm-12 shadow-lg p-5 bg-light">
                    <div class="text-center">
                        <h3 class="text-primary">ReSet your password</h3>
                    </div>
                    <form action="/password-reset" method="POST">
                        @csrf

                        <div class="p-4">
                                <input type="hidden" class="form-control  form-control-lg" name="token" value=" {{$token}} ">

                            <div class="input-group mb-3">
                                <span class="input-group-text bg-light"><i
                                        class="bi bi-person-plus-fill text-white"></i></span>
                                <input type="email" class="form-control  form-control-lg" name="email" placeholder="Email">
                            </div>
                            @error('email')
                                <p class="blockquote-footer text-danger">{{$message}} </p>

                            @enderror
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-light"><i
                                        class="bi bi-key-fill text-white"></i></span>
                                <input type="password" class="form-control  form-control-lg" name="password" placeholder="Password">
                            </div>
                            @error('password')
                                <p class="blockquote-footer text-danger">{{$message}} </p>

                            @enderror
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-light"><i
                                        class="bi bi-key-fill text-white"></i></span>
                                <input type="password" class="form-control form-control  form-control-lg" name="password_confirmation" placeholder="Confirm password">
                            </div>
                            @error('password_confirmation')
                                <p class="blockquote-footer text-danger">{{$message}} </p>

                            @enderror

                            <div class="d-flex justify-content-end ">
                                <button class="btn btn-primary text-center mt-4" type="submit">
                                    Reset Password
                                </button>

                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>

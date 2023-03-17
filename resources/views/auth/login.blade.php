<x-layout>
    <div class="container-fluid vh-100" style="margin-top:100px">
        <div class="" style="margin-top:100px">
            <div class="rounded d-flex justify-content-center">
                <div class="col-md-5 col-sm-12 shadow-lg p-5 bg-light">
                    <div class="text-center">
                        <h3 class="text-primary">Sign In</h3>
                    </div>
                    <form action="/login" method="POST">
                        @csrf
                        <div class="p-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-light"><i
                                        class="bi bi-person-plus-fill text-white"></i></span>
                                <input type="email" name="email" class="form-control form-control-lg" placeholder="Email">
                            </div>
                            @error('email')
                                <p class="blockquote-footer text-danger">{{$message}} </p>

                            @enderror
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-light"><i
                                        class="bi bi-key-fill text-white"></i></span>
                                <input type="password" name="password" class="form-control   form-control-lg" placeholder="password">
                            </div>
                            @error('password')
                                <p class="blockquote-footer text-danger">{{$message}} </p>

                            @enderror

                            <div class="d-flex justify-content-end ">
                                <button class="btn btn-primary text-center mt-4" type="submit">
                                    Login
                                </button>

                            </div>
                            <p class="text-center mt-5">Don't have an account?
                                <a href="/register" class="text-primary text-decoration-none fw-bold">Sign Up</a>
                            </p>
                            {{-- a href this to forgot password page --}}
                            <a href="/password-reset" class="text-center text-primary">Forgot your password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>

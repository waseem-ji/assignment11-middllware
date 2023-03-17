<x-layout>


<div class="container-fluid vh-100" style="margin-top:200px">
    <div class="" style="margin-top:100px">
        <div class="rounded d-flex justify-content-center">
            <div class="col-md-6 col-sm-12 shadow-lg p-5 bg-light rounded-4">
                <div class="text-center">
                    <h3 class="text-primary">Forgot Password !?</h3>
                </div>
                <form action="/send-password-reset-link" method="POST">
                    @csrf
                    <div class="p-4">
                        <div class="form-text mb-3">
                            Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
                          </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-light"><i
                                    class="bi bi-person-plus-fill text-white"></i></span>
                            <input type="email" name="email" class="form-control  form-control-lg" placeholder="Email">
                        </div>

                            @error('email')
                            <p class="blockquote-footer text-danger">{{$message}} </p>
                            @enderror

                        @if (session('status'))
                        <div>

                            <p class="blockquote-footer text-success">{{session('status')}} </p>

                        </div>
                        @endif

                        <div class="d-flex justify-content-end ">
                            <button class="btn btn-primary text-center mt-4" type="submit">
                                Email Password Reset Link
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</x-layout>

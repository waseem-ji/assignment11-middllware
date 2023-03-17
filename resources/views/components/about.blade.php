<div class="bg-secondary bg-opacity-25 rounded-3  ">
    <div class="container pb-4">
        <div class="row">
            <div class="col p-2 mt-3 text-center">
                <img src="{{ asset(auth()->user()->profile_pic ?? asset('images/profile/dummy.jpg')) }}"
                    alt="Profile Picture" class="rounded-circle" width="180" height="200">
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <span class="fs-3 mt-3 fw-bold">{{ Str::ucfirst(auth()->user()->name) }} </span>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <span class="fs-5 mt-3 fw-light">{{ auth()->user()->email }} </span>
            </div>
        </div>
    </div>
</div>

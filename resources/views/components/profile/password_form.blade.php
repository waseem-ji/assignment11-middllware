<div class="border border-secondary rounded-4 mt-3 p-4 mt-2">
    <div class="container">
        <form action="{{ route('update-password') }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="row mb-3">
                <div class="col">
                    <label for="name" class="form-label">Current Password</label>
                    <input type="password" name="old_password" class="form-control" id="name">
                </div>
                @error('old_password')
                    <p class="blockquote-footer text-danger">{{ $message }} </p>
                @enderror

            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="email" class="form-label">New Password</label>
                    <input type="password" name="password" class="form-control" id="email">
                </div>
                @error('password')
                    <p class="blockquote-footer text-danger">{{ $message }} </p>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="date" class="form-label">Confirm New Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="date">
                </div>
                @error('password_confirmation')
                    <p class="blockquote-footer text-danger">{{ $message }} </p>
                @enderror

            </div>
            <div class="d-flex flex-row-reverse ">
                <button type="submit" class=" mt-3 btn btn-outline-success">Change Password</button>
            </div>
        </form>
    </div>
</div>

<div class="border border-secondary rounded-4 mt-3 p-4 mb-5">
   <div class="container">
    <form action="{{route('update-profile')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name"  value="{{auth()->user()->name}} ">


            @error('name')
            <div class="mt-3">
                <p class="blockquote-footer text-danger">{{$message}} </p>

            </div>

            @enderror
        </div>

        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{auth()->user()->email}}">


            @error('email')
            <div class="mt-3">
                <p class="blockquote-footer text-danger">{{$message}} </p>
            </div>

            @enderror
        </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="date" class="form-label">Date of Birth</label>
                <input type="date" name="dob" class="form-control" id="date"  value="{{auth()->user()->dob ?? "" }}">


            @error('dob')
            <div class="mt-3">

                <p class="blockquote-footer text-danger">{{$message}} </p>
            </div>

            @enderror
        </div>
            <div class="col">
                <label for="text" class="form-label">Phone Number</label>
                <input type="text" name="phone" class="form-control" id="phone" value="{{auth()->user()->phone ?? "" }}" >


            @error('phone')
                <div class="mt-3">

                    <p class="blockquote-footer text-danger">{{$message}} </p>
                </div>

            @enderror
        </div>
            <div class="col">
                <div class="d-flex justify-content-center align-items-center">
                    <fieldset>
                         <legend class="fs-5">Gender</legend>

                         <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="female" {{auth()->user()->gender==='female' ? 'checked' : "" }}>
                         <label class="form-check-label" for="inlineRadio1">Female</label>
                         <input class="form-check-input ms-2" type="radio" name="gender" id="inlineRadio1" value="male" {{auth()->user()->gender==='male' ? 'checked' : "" }}>
                         <label class="form-check-label" for="inlineRadio1">Male</label>
                     </fieldset>

                </div>


            @error('gender')
            <div class="mt-3">

                <p class="blockquote-footer text-danger">{{$message}} </p>
            </div>

            @enderror
        </div>
        </div>

        <div class="row">
            <div class="col input-group mb-3">
            <input type="file" class="form-control" name="profile_pic">
            @error('profile_pic')
                <p class="text-danger"> {{$message}}</p>
            @enderror


            </div>
        </div>

        <div class="d-flex flex-row-reverse ">
            <button type="submit" class=" mt-3 btn btn-outline-success">Update Profile</button>
        </div>
    </form>
   </div>
</div>

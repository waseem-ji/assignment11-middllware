@props(['post'])
<div class="card p-2 mb-3 rounded-4 text-start shadow mb-5">

    <div class="card-header mb-1 d-flex justify-content-between">
        <div >
            <img src="{{asset($post->user->profile_pic ?? 'https://via.placeholder.com/30x30')}}" alt="Profile Picture" class="rounded-circle" width="30" height="30"> <span class="m-1 fw-bold">{{Str::ucfirst($post->user->name) }} </span>

        </div>

            <button class="btn btn-secondary-subtle " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-sharp fa-solid fa-ellipsis"></i>
            </button>
            <ul class="dropdown-menu">

              <li><a class="dropdown-item text-center" href="feed/{{$post->id}}/edit">Update</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form class="dropdown-item text-center" action="feed/{{$post->id}}" method="post">
                    @csrf
                    @method('DELETE')


                    <button type="submit"  onclick="return confirm('Are you sure you want to delete this item?');" class="text-danger fw-bold w-100 text-decoration-none btn" >Delete</button>



                  </form>
              </li>
            </ul>

    </div>
    <div class="card-body">
        <h5 class="card-title">{{$post->title}}</h5>
        {{-- image  --}}


        <p class="card-text">{{$post->body}} </p>
        <div id="carouselExample{{$post->id}}" class="carousel slide">
            <div class="carousel-inner">
                @foreach($post->pictures as $image)

              <div class="carousel-item active">
                <img src="{{ asset($image->url) }}" class="d-block w-100" width="200" height="350">
              </div>
              @if (count($post->pictures)>1)
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample{{$post->id}}" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample{{$post->id}}" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
              @endif
              @endforeach

            </div>

        </div>


    </div>
</div>


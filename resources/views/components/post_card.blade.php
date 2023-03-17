@props(['post'])
<div class="card m-3 p-2  ">

    <div class="card-header text-start">
        <img src="{{asset($post->user->profile_pic ?? 'https://via.placeholder.com/30x30')}}" alt="Profile Picture" class="rounded-circle" width="30" height="30"> <span class="m-1 fw-bold"> {{Str::ucfirst($post->user->name) }} </span> </div>
    <div class="card-body">
        <h5 class="card-title">{{$post->title}}</h5>
        {{-- image  --}}


        <p class="card-text">{{$post->body}} </p>
        <div id="carouselExample{{$post->id}}" class="carousel slide">
            <div class="carousel-inner">
                @foreach($post->pictures as $image)

              <div class="carousel-item active">
                <img src="{{ asset($image->url) }}" class="d-block w-100 rounded-3">
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

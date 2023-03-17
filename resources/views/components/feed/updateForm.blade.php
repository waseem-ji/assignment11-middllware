<div class=" rounded-2 mt-3 p-4 mb-2">
    <form action="/feed/{{ $post->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <!-- Name input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="title">Title</label>
            <input type="text" id="title" class="form-control" name="title"
                placeholder="Make your thoughts stand out" value="{{ $post->title }}" />
            @error('title')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>

        <!-- Message input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="body">Your Message</label>
            <textarea class="form-control" id="body" rows="4" name="body" title="body"
                placeholder="Speak your mind..."> {{ $post->body }} </textarea>
            @error('body')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>




        {{-- add images --}}

        <div class="input-group mb-3">
            <input type="file" class="form-control" name="new_images[]" multiple max="5">
            @error('images')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>

        <!-- Submit button -->
        <div class="flex justify-end">
            {{-- image upload  --}}
            <button type="submit" class="btn btn-primary btn-block mb-4">Update </button>
        </div>
    </form>
    @if (count($pictures))
        <h5>Delete Pictures ?</h5>
    @endif
    @foreach ($pictures as $picture)
        <div class="mb-3 pb-3">

            <form action="/feed/{{ $post->id }}/deleteImage" method="POST">
                @csrf
                @method('PATCH')
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <img src="{{ asset($picture->url) }}" alt="Post Image" width="400px">
                            <input type="hidden" name="delete_picture_{{ $picture->id }}" value="1">

                        </div>
                        <div class="col d-flex align-items-center">

                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="h4 pb-2 mb-4 text-danger border-bottom border-danger">

        </div>
    @endforeach
</div>

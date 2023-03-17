<div class="border border-primary rounded-2 mt-3 p-4 mb-2">
    <form action="feed" method="post" enctype="multipart/form-data">
        @csrf

        <!-- Name input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="title">Title</label>
          <input type="text" id="title" class="form-control" name="title" placeholder="Make your thoughts stand out" />
          @error('title')
                <p class="text-danger"> {{$message}}</p>
            @enderror
        </div>

        <!-- Message input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="body">Your Message</label>
            <textarea class="form-control" id="body" rows="4" name="body" title="body" placeholder="Speak your mind..."></textarea>
            @error('body')
                <p class="text-danger"> {{$message}}</p>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input type="file" class="form-control" name="images[]" multiple max="5">
            @error('images')
                <p class="text-danger"> {{$message}}</p>
            @enderror
        </div>



        <div class="flex justify-end">

            <button type="submit" class="btn btn-primary btn-block mb-4">Post to mySocial</button>
        </div>
      </form>
</div>

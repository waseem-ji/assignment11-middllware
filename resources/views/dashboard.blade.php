<x-layout>



    <div class="container-xxxl mt-5">
        <div class="row gap-3">
            <div class="col-3 offset-1 rounded-2">
                <x-about />
            </div>
            <div class="col-6 col-md-5 bg-light text-emphasis-primary rounded-4">
                @if (count($posts)==0)

                <div class="card mt-5">
                    <div class="card-header">
                      Nothing to show
                    </div>
                    <div class="card-body">
                      <blockquote class="blockquote mb-0 ">
                        <p>We are sorry , but there are no posts with that hastag </p>
                        <footer class="blockquote-footer"> Can you please search for other tags </footer>
                      </blockquote>
                      <a href="/" class="mt-3 text-decoration-none"> Click here to go back to all posts</a>
                    </div>
                  </div>

                @endif
                @foreach ($posts as $post)
                    <x-post_card :post=$post />

                @endforeach

            </div>
            <div class="col">
{{-- Right free space --}}

            </div>

        </div>

    </div>
</x-layout>

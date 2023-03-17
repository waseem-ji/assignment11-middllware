<x-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

 
    <div class="container-xxxl mt-5">
        <div class="row gap-3">
            <div
                class="col-2 col-md-3 rounded-3 offset-md-1 offset-2  bg-success bg-opacity-10 me-4 d-flex justify-content-center align-items-center">
                <div class="container ">
                    <div class="row">
                        <div class="col">
                            <div class="card mb-5" style="width: 20rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Tags</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Maybe add a tag</h6>
                                    <p class="card-text">Adding a tag can help others to quickly find your post. Let
                                        your ideas stand out </p>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card mt-5" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Images</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Let the world see</h6>
                                    <p class="card-text"> Show the world what they are missing out being away from you
                                        and invite them in. </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>






            </div>

            <div class="col-6  text-emphasis-primary rounded-2">
                <div class="container">
                    <div class="row bg-success bg-opacity-25">
                        <x-feed.updateForm :post=$post :pictures=$pictures />
                    </div>

                </div>


            </div>
            <div class="col">
                {{-- right free space --}}
            </div>

        </div>

    </div>
    <x-flash />
</x-layout>

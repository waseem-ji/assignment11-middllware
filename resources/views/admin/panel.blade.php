<x-layout>
    <div class="sticky-top">asda</div>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">

                    <div class="card mt-5 mb-5">
                        <div class="card-body">
                            <h5 class="card-title">Users</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Total Active Users</h6>
                            <p class="card-text display-4 mx-2"> {{ $users_count }} </p>
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                data-bs-target="#allUsers" data-bs-parent="#panel-controller" aria-expanded="false"
                                aria-controls="allUsers">
                                View All Users
                            </button>

                        </div>
                    </div>
                    {{-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                <span></span>
               
              </h6> --}}
                    <div class="card ">
                        <div class="card-body">
                            <h5 class="card-title">Posts</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Total Posts on site</h6>
                            <p class="card-text display-4 mx-2">{{ $posts_count }} </p>
                            {{-- <a href="#" class="card-link text-decoration-none">View all posts</a> --}}
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                data-bs-target="#allPosts" data-bs-parent="#panel-controller" aria-expanded="false"
                                aria-controls="allPosts">
                                View All Posts
                            </button>

                        </div>
                    </div>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Admin Panel</h1>
                </div>
                <div id="panel-controller" class="mx-5">
                    <div class="collapse" id="allPosts" data-bs-parent="#panel-controller">
                        <x-admin.posts :posts=$posts />


                    </div>


                    <div class="collapse" id="allUsers" data-bs-parent="#panel-controller">
                        <x-admin.users :users=$users />
                    </div>

           
                </div>
                <div class="">

                    
                    
                </div>




            </main>
        </div>
    </div>
    <script>
        function loadNextPage(url) {
            event.preventDefault();

            $('#adminPosts').load(url + ' #adminPosts');
            $('#adminUsers').load(url + ' #adminUsers');


        }
    </script>
</x-layout>

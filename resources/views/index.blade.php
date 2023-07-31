@extends('layouts.main')
@section('title')
    Home Buary
@endsection

@section('css')
@endsection

@section('content')
    <main>
        <style>
            .icon-container button {
                background-color: transparent;
                border: none;
                cursor: pointer;
            }

            .icon-container button:focus {
                outline: none;
            }
        </style>
        <main>
            <section class="about section-padding" id="section_2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-12 d-flex flex-column">

                            {{-- @if (Auth::guard('web')->check()) {

                            }
                            @endif
                            @dd(Auth::guard('web')->user()->name) --}}

                            {{-- @dd(Auth::guard('web')->user()->name) --}}
                            <h3 class="hh3">Add POST </h3>
                            <div class="about-thumb bg-white shadow-lg">
                                <div class="about-info">
                                    <div class="gg">
                                        <img src="{{ asset($users->image_url) }}" height="50px" class="rounded-circle">
                                        <style>
                                            .rounded-circle {
                                                border-radius: 5%;
                                            }
                                        </style>
                                        <span>
                                            <br>
                                            <br>
                                            @if (Auth::check())
                                                <p>{{ Auth::guard('web')->user()->name }}</p>
                                            @else
                                                <p>Unkown</p>
                                            @endif
                                        </span>

                                        <form method="post" action="{{ route('posts.store') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @if (auth()->check())
                                                <input type="hidden" name="u_id"
                                                    value="{{ Auth::guard('web')->user()->id }}">
                                            @endif

                                            <select class="ss form-control" style="margin-top:100px ;">
                                                <option>Active</option>
                                                <option>None Active</option>
                                            </select>
                                    </div>

                                    <div class="textpost">
                                        <input type="text" name="content" id="postContent"
                                            placeholder="Add New Post . . . " class="form-control">
                                    </div>

                                    <div class="icon1">
                                        <button><i class="bi bi-geo-alt-fill" style="color: #BA3B46"></i></button>
                                        <button type="button" class="btn" data-bs-toggle="modal"
                                            data-bs-target="#imageModal"><i class="bi bi-file-image"
                                                style="color: orange"></i></button>
                                        {{-- hear icone for chose category --}}
                                        <button type="button" class="btn" data-bs-toggle="modal"
                                            data-bs-target="#categoryModal"><i class="bi bi-grid-3x3-gap"
                                                style="color: rgb(126, 125, 125)"></i></button>
                                    </div>

                                    <div class="lleft">
                                        <span id="characterCount">0 / 500</span>
                                        <button type="submit" class="btn btn-outline-primary">Post</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- Image and Category Modal -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="width: 50%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel">Choose Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Image selection form -->
                        <div class="mb-3">
                            <label for="postImage" class="form-label">Upload Image</label>
                            <input type="file" class="form-control" id="postImage" name="image">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Category Modal -->
        <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="width: 50%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="categoryModalLabel">Choose Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Category selection form -->
                        <div class="mb-3">
                            <label for="categorySelect" class="form-label">Select Category</label>
                            <select class="form-select" id="categorySelect" name="category">
                                @foreach ($categorys as $category)
                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </form>

        <script>
            const postContent = document.getElementById('postContent');
            const characterCount = document.getElementById('characterCount');

            postContent.addEventListener('input', function() {
                const content = postContent.value;
                const count = content.length;
                characterCount.textContent = count + ' / 500';
            });
        </script>




        <!-- Add New Post Modal -->
        <div class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="addPostModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="width: 50%;">
                <div class="modal-content add-post-modal">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPostModalLabel">Add New Post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form to add a new post -->
                        <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                            @csrf
                            <!-- This code will only be displayed if a user is authenticated -->
                            {{-- @dd(Auth::guard('web')->user()->id) --}}
                            @if (Auth::guard('web')->check())
                                <input type="hidden" name="u_id" value="{{ Auth::guard('web')->user()->id }}">
                            @endif
                            {{-- <input type="hidden" name="u_id" value="{{ Auth::guard('web')->user()->id }}"> --}}

                            {{-- <input type="hidden" name="u_id" value="{{ Auth::guard('web')->user()->id}}"> --}}



                            <!-- Post content input -->
                            <div class="mb-3">
                                <label for="postContent" class="form-label">Content</label>
                                <textarea class="form-control" id="postContent" rows="5" name="content"></textarea>
                            </div>

                            <!-- Image input -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>

                            <div class="form-group">
                                <label for="actionSelect">Select Category:</label>
                                <select class="form-select mt-2" id="actionSelect" name="category">

                                    @foreach ($categorys as $category)
                                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Add any other fields or inputs you need for the post -->

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn my-custom-color">Add Post</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <style>
            .my-custom-color {
                background-color: #6250a5;
                color: white;
            }

            .modal-title {
                color: #6250a5;
            }
        </style>

        <section class="about section-padding" id="section_3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 d-flex flex-column">
                        <h3 class="hh3">Last Posts</h3>

                        @foreach ($posts as $post)
                            <div class="about-thumb bg-white shadow-lg">
                                <div class="about-info">
                                    <div>
                                        <button style="background: none;border: none" id="dropdownButton{{$post->id}}">
                                            <i class="bi bi-three-dots"></i></button>

                                    </div>

                                    {{-- <ul id="dropdownMenu{{$post->id}}">
                                        <li>
                                            <form method="GET" action="{{ route('posts.edit', $post->id) }}">
                                                @csrf
                                                <button type="submit" class="dropdown-item delete-button">Edite</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item delete-button">Delete</button>
                                            </form>
                                        </li>
                                    </ul> --}}



                                    <div class="ggg">
                                        <a href="#">
                                            <img src="{{ asset($post->user->image_url) }}"
                                                class="rounded-circle">
                                        </a>
                                        <style>
                                            .rounded-circle {
                                                border-radius: 5%;
                                                width: 50px;
                                                height: 50px;
                                            }
                                        </style>
                                        {{-- App\Models\User::where('id', $post->user_id)->first()->name ?? 'unkown user' --}}
                                        {{-- @php
                                            $user = \App\Models\User::whereHas('posts', function ($query) use ($post) {
                                                $query->where('id', $post->user_id);
                                            })->first();
                                        @endphp --}}

                                        @php
                                            $user_posts = \App\Models\User::find($post->user_id);

                                        @endphp
                                        <span class="name">{{ $user_posts->name ?? '' }}</span>
                                         <div class="sw">
                                       <span class="h5"> @if ($post->created_at->diffInHours() > 0)
                                        {{ $post->created_at->diffInHours() }}h
                                    @else
                                        {{ $post->created_at->diffInMinutes() }}m
                                    @endif</span>

                                       <label style="margin-top:5px ;margin-left: 135px">

                                            <span>
                                                @if ($post->active)
                                                <div style="color: #3bba50">Active</div>
                                            @else
                                            <div style="color: #BA3B46">NotActive</div>

                                            @endif
                                            </span>
                                        </label>
                                    </div>
                                    </div>

                                    <a href="{{ route('posts.show', $post->id) }}">
                                        <p class="prag">{{ $post->content }} </p>
                                    </a>

                                    <div class="img">
                                        @if ($post->image_url)
                                            <img src="{{ asset($post->image_url) }}" width="500px">
                                        @endif

                                    </div>

                                    <div class="fotbox">
                                        <div class="saved">
                                            <div id="savedPostContainer"></div>
                                            <form action="{{ route('posts.save') }}" method="POST" id="saveForm">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $post->id }}">
                                                <button type="submit" id="saveButton">
                                                    <i class="bi bi-bookmark-fill" id="saved"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <p class="offer1">{{ App\Models\Comments::where('post_id', $post->id)->count() }}
                                            Offers</p>
                                    </div>


                                </div>
                            </div>
                        @endforeach
                        <span class="slid">
                            <a href="#"><i class="bi bi-circle-fill"></i></a>
                            <a href="#"><i class="bi bi-circle-fill"></i></a>
                            <a href="#"><i class="bi bi-circle-fill"></i></a>
                        </span>
                    </div>
                </div>
            </div>
        </section>




        <section class="projects section-padding pb-0" id="section_4">
            <div>
                <h3
                    style="padding-left: 250px;
                color: var(--primary-color);
                padding-bottom: 50px">
                    Best Broker</h3>
            </div>
            <div class="arrow1">
                <!--                <i class="bi bi-arrow-left-circle"></i>-->
                <!--                    <i class="bi bi-arrow-right-circle"></i>-->
            </div>

            <div class="container">




                @foreach ($topUsers as $topUser)

                <div class="col-lg-4 col-12">
                    <div class="projects-thumb projects-thumb-small">
                        <div class="empty1">
                            <a href="{{route('profile.broker',$topUser->id)}}">
                                <img src="{{ asset($topUser->image_url) }}" class="img_projects-thumb-small2">
                            </a>


                        </div>
                        <div class="projects-info">
                            <div class="projects-title-wrap">
                                <small class="projects-small-title">{{$topUser->fname}}</small>
                                <div class="projects-btn-wrap mt-4">
                                    <span class="custom-btn btn">
                                        @for ($i = 1; $i <= $topUser->stars; $i++)
                                            <i class="bi bi-star-fill"></i>
                                        @endfor

                                        @for ($i = $topUser->stars + 1; $i <= 5; $i++)
                                            <i class="bi bi-star"></i>
                                        @endfor
                                    </span>
                                </div>

                                <div class="pr1">
                                    <p>{{$topUser->bio}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach




            </div>
            </div>




        </section>

    </main>
@endsection

@section('js')
    <script>
        function openModal() {
            document.getElementById("myModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("myModal").style.display = "none";
        }
    </script>
@endsection

@extends('BrokerLayouts.main')
@section('title')
    Home Broker
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
                                <input type="hidden" name="user_id" value="{{Illuminate\Support\Facades\Auth::id()}}">



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






                                    <div class="ggg">
                                        <a href="#">
                                            <img src="{{ asset($post->user->image_url) ?? asset('assets/images/UserProfile') }}" height="50px" class="rounded-circle">
                                        </a>
                                        <style>
                                            .rounded-circle {
                                                border-radius: 50%;
                                                width: 60px;
                                                height: 60px;
                                            }
                                        </style>
                                            @php
                                                $user_posts = \App\Models\User::find($post->user_id);
                                            @endphp
                                            <span class="name">{{ $user_posts->name ?? '' }}</span>

                                       <div class="sw">
                                        <span class="h5">{{$post->created_at->diffInHours()}}h</span>
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

                                    <a href="{{ route('broker.posts.show', $post->id) }}">
                                        <p class="prag">{{ $post->content }} </p>
                                    </a>
                                    @if ($post->image_url)
                                    <div class="img">
                                        <img src="{{ asset($post->image_url) }}" width="500px">
                                    </div>
                                    @endif


                                    <div class="fotbox">
                                        <div class="saved">
                                            <div id="savedPostContainer"></div>
                                            <form action="{{ route('broker.save') }}" method="POST" id="saveForm">
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

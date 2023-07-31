@extends('BrokerLayouts.main')
@section('title')
    Home Broker
@endsection

@section('css')
@endsection

@section('content')
    <main>





        <!-- Add New Post Modal -->
        <div class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="addPostModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="width: 50%;">
                <div class="modal-content add-post-modal">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPostModalLabel">Add New Post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form to add a new post -->
                        <form method="post" action="{{ route('posts.store') }}">
                            @csrf
                            <!-- Post title input -->
                            {{-- <input type="hidden" name="user_id" value="1"> --}}
                            <!-- Post content input -->
                            <div class="mb-3">
                                <label for="postContent" class="form-label">Content</label>
                                <textarea class="form-control" id="postContent" rows="5" name="content"></textarea>
                            </div>
                            <!-- Image input -->
                            <div class="mb-3">
                                <label for="postImage" class="form-label">Image</label>
                                <input type="file" class="form-control" id="postImage" name="image">
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


        <section class="about section-padding" id="section_4" style="margin-top: 30px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 d-flex flex-column">
                        <div class="about-thumb bg-white shadow-lg">
                            <div class="about-info">

                                <div>
                                    <button style="background: none;border: none" id="dropdownButton2">
                                        <i class="bi bi-three-dots"></i></button>

                                </div>


                                    @if(!Auth::guard('broker')->check()) {
                                        <ul id="dropdownMenu2">
                                            <li><form method="GET" action="{{ route('posts.edit',$post->id)}}">
                                                @csrf
                                                <button type="submit" class="dropdown-item delete-button">Edite</button>
                                              </form></li>
                                            <li><form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item delete-button">Delete</button>
                                              </form></li>
                                        </ul>

                                    }

                                    @endif


                                <div class="ggg">
                                    <a href="#">
                                        <img src="{{ asset($post->user->image_url) ?? asset('assets/images/UserProfile')  }}" height="50px" class="rounded-circle">
                                    </a>
                                    <style>
                                        .rounded-circle {
                                            border-radius: 50%;
                                            width: 50px;
                                            height: 50px;
                                        }
                                    </style>
                                     @php
                                     $user_posts = \App\Models\User::find($post->user_id);
                                 @endphp
                                 <span class="name">{{ $user_posts->name ?? '' }}</span>
                                    {{-- <span class="name">{{$post->user->name}}</span> --}}
                                    <div>
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
                                        <br>
                                        <br>
                                    </div>
                                </div>

                                <a href="#">
                                    <p class="prag">{{ $post->content }}
                                    </p>
                                </a>
                                @if ($post->image_url)
                                <div class="img">
                                    <img src="{{asset($post->image_url)}}" width="500px">
                                </div>
                                @endif


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

                                <p class="offer1">{{ count($comments) }} Offers</p>
                            </div>
                        </div>




                        @if ($post->active ==1)
                        <form class="about-thumb1 bg-white shadow-lg" method="POST" action="{{ route('comments.store') }}">
                            @csrf
                            <div class="about-info1">
                                <p class="prag">
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    @if (Auth::guard('broker')->check())

                                    <input type="hidden" name="broker_id" value="{{ Auth::guard('broker')->user()->id }}">
                                    @endif

                                    <input class="inputoffer" name="content" type="text"
                                        placeholder="Type your offer ..">
                                </p>
                                <button type="submit">Comment</button>
                            </div>
                        </form>
                        @endif
                        @foreach ($comments as $comment)
                        @if ($post->active ==1)
                            <div class="about-thumb1 bg-white shadow-lg">
                                <div class="about-info1">
                                    <p class="prag">{{ $comment->content ?? 'No comments yet' }}</p>
                                    @if ($comment->status == '1')
                                        <input type="submit" value="Accept" style="background-color: #F58F29; color: white; border: none; padding: 2px 8px; border-radius: 4px; width: 150px; height: 50px;">
                                    @elseif($comment->status == '2')
                                        <input type="submit" value="Pending" style="background-color: #BA3B46; color: white; border: none; padding: 2px 8px; border-radius: 4px; width: 150px; height: 50px;">
                                    @elseif($comment->status == '3')
                                        <input type="submit" value="Deny" style="background-color: rgb(0, 0, 0); color: white; border: none; padding: 2px 8px; border-radius: 4px; width: 150px; height: 50px;">

                                            @elseif($comment->status == '4')
                                            <input type="submit" value="Conntracte" style="background-color: rgb(86, 228, 58); color: white; border: none; padding: 2px 8px; border-radius: 4px; width: 150px; height: 50px;">
                                    @endif
                                </div>
                            </div>
                             <!-- Accept Modal -->
                             <div class="modal fade" id="acceptModal{{$comment->id}}" tabindex="-1" aria-labelledby="acceptModalLabel"
                             aria-hidden="true">
                             <div class="modal-dialog">
                                 <div class="modal-content">
                                     <form method="POST" action="{{ route('comments.update', $comment->id) }}">
                                         @csrf
                                         @method('PUT')
                                         <div class="modal-header">
                                             <h5 class="modal-title" id="acceptModalLabel">Select Action</h5>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                 aria-label="Close"></button>
                                         </div>
                                         <div class="modal-body">
                                             <div class="form-group">
                                                 <label for="actionSelect">Select Action:</label>
                                                 <select class="form-select" id="actionSelect" name="status">
                                                     <option value="1">Accept</option>
                                                     <option value="2">Pending</option>
                                                     <option value="3">Deny</option>
                                                     <option value="4">Conntracte</option>
                                                 </select>
                                             </div>
                                             {{-- <input type="hidden" name="id" value="{{$comment->id}}"> --}}
                                             <input type="hidden" name="post_id" value="{{ $post->id }}">
                                         </div>
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary"
                                                 data-bs-dismiss="modal">Close</button>
                                             <button type="submit" class="btn btn-primary">Save Changes</button>
                                         </div>
                                     </form>
                                 </div>
                             </div>
                         </div>

                         @endif

                            @endforeach





                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection

@section('js')
@endsection

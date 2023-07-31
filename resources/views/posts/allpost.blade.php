@extends('layouts.main')
@section('title')
 Posts
@endsection

@section('css')
@endsection

@section('content')
    <main>

        <style>
            .my-custom-color {
                background-color: #6250a5;
                color: white;
            }

            .modal-title {
                color: #6250a5;
            }
        </style>

        @foreach ($posts as $post)
        <section class="about section-padding" id="section_4" style="margin-top: 30px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 d-flex flex-column">
                        <div class="about-thumb bg-white shadow-lg">
                            <div class="about-info">
                                <div>
                                    <button style="background: none;border: none" id="dropdownButton{{$post->id}}">
                                        <i class="bi bi-three-dots"></i></button>

                                </div>

                                <ul id="dropdownMenu{{$post->id}}">
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



                                <div class="ggg">
                                    <a href="#">
                                        <img src="{{ asset($post->user->image_url) }}" height="50px" class="rounded-circle">
                                    </a>
                                            @php
                                            $user_posts = \App\Models\User::find($post->user_id);
                                        @endphp
                                        <span class="name">{{ $user_posts->name ?? '' }}</span>
                                     <div class="sw">
                                    <span class="h5">@if ($post->created_at->diffInHours() > 0)
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
                                    <img src="{{ asset($post->image_url) ?? asset('assets/images/UserProfile')}}" width="500px" class="rounded-circle">
                                    @endif
                                </div>


                                <style>
                                    .rounded-circle {
                                        border-radius: 5%;
                                        width: 50px;
                                        height: 50px;
                                    }
                                </style>

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
                                    <p class="offer1">{{App\Models\Comments::where('post_id',$post->id)->count()}} Offers</p>
                                </div>


                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>
        @endforeach


    </main>
@endsection

@section('js')
@endsection

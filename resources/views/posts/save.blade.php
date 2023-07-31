@extends('layouts.main')
@section('title')
    Save Posts
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

        @foreach ($saveposts as $savepost)
        <section class="about section-padding" id="section_4" style="margin-top: 30px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 d-flex flex-column">
                        <div class="about-thumb bg-white shadow-lg">
                            <div class="about-info">
                                <div>
                                    <button style="background: none;border: none" id="dropdownButton3">
                                        <i class="bi bi-three-dots"></i></button>
                                </div>

                                <ul id="dropdownMenu3">
                                    <a href="#">
                                        <li> Edite</li>
                                    </a>
                                    <a href="#">
                                        <li>Delete</li>
                                    </a>
                                </ul>

                                <div class="ggg">
                                    @php
                                    $user_posts = \App\Models\User::find($savepost->user_id);
                                @endphp
                                    <img src="{{ asset($user_posts->image_url) }}" height="50px" class="rounded-circle" style="width: 50px;height: 50px;">


                                <span class="name">{{ $user_posts->name ?? '' }}</span>

                                    <div>
                                        <span class="h5">{{$savepost->created_at->diffInHours()}}h</span>
                                    </div>
                                </div>
                                <label style="margin-top:5px ;margin-left: 135px">

                                    <span>
                                        @if ($savepost->active)
                                        <div style="color: #3bba50">Active</div>
                                    @else
                                    <div style="color: #BA3B46">NotActive</div>

                                    @endif
                                    </span>
                                </label>

                                <a href="{{ route('posts.show', $savepost->id) }}">
                                    <p class="prag">{{ $savepost->content }}
                                    </p>
                                </a>
                                {{-- if there is image --}}
                                 {{-- <div class="img">
                            <img src="{{$savepost->image_url}}" width="500px">
                            </div> --}}

                            <div class="img">
                                @if ($savepost->image_url)
                                <img src="{{ asset($savepost->image_url)}}" width="500px">
                                @endif                            </div>

                            <div class="saved">
                                <div id="savedPostContainer"></div>
                                <button id="saveButton" onclick="myFunction()">
                                    <i class="bi bi-bookmark-fill" id="saved" style="color: blue;"></i>
                                </button>
                            </div>


                            <p class="offer1">{{App\Models\Comments::where('post_id',$savepost->id)->count()}} Offers</p>
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

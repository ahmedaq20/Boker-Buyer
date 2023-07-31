@extends('BrokerLayouts.main')
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


                                @php
                                $user_posts = \App\Models\User::find($savepost->user_id);
                                 @endphp
                                <div class="ggg">
                                    <img src="{{ asset($savepost->user->image_url) ?? asset('assets/images/UserProfile')  }}" height="50px" class="rounded-circle">
                                    <style>
                                        .rounded-circle {
                                            border-radius: 50%;
                                            width: 50px;
                                            height: 50px;
                                        }
                                    </style>

                                <span class="name">{{ $user_posts->name ?? '' }}</span>

                                    <div>
                                        <span class="h5">{{$savepost->created_at->diffInHours()}}h</span>
                                        <label style="margin-top:5px ;margin-left: 135px">

                                            <span>
                                                @if ($savepost->active)
                                                <div style="color: #3bba50">Active</div>
                                            @else
                                            <div style="color: #BA3B46">NotActive</div>

                                            @endif
                                            </span>
                                        </label>


                                    </div>
                                </div>

                                <a href="{{ route('posts.show', $savepost->id) }}">
                                    <p class="prag">{{ $savepost->content }}
                                    </p>
                                </a>
                                {{-- if there is image --}}
                                 {{-- <div class="img">
                            <img src="{{$savepost->image_url}}" width="500px">
                            </div> --}}
                            @if ($savepost->image_url)
                            <div class="img">
                                <img src="{{asset($savepost->image_url)}}" width="500px">
                            </div>
                            @endif


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

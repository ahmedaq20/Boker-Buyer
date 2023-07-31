@extends('layouts.main')
@section('title')
    Home Buary
@endsection

@section('css')
@endsection

@section('content')

<section class="about section-padding" id="section_3">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12 d-flex flex-column">

                <div class="search">
                    <form action="{{route('search_index')}}" class="search-bar">
                    <input type="text" placeholder="search" name="search">
                    <button type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
                </div>


                <div class="choose">

                        <a href="{{route('search_servie')}}" class="btn btn-outline-primary but1">Service</a>
                        <a href="{{route('search_index')}}" class="btn btn-outline-dark but2">Keyword</a>


                </div>



                <section class="about section-padding" id="section_4" style="margin-top: 30px">
                    <div class="container">
                        <div class="row">
                            @if(isset($resultposts))

                            @forelse ($resultposts as $resultpost)
                            <div class="col-lg-6 col-12 d-flex flex-column">
                                <div class="about-thumb bg-white shadow-lg">


                                    <div class="about-info">

                                        <div>
                                            <button style="background: none;border: none" id="dropdownButton2">
                                                <i class="bi bi-three-dots"></i></button>

                                        </div>

                                        {{-- <ul id="dropdownMenu2">
                                            <li><form method="GET" action="{{ route('posts.edit',$resultposts->id)}}">
                                                @csrf
                                                <button type="submit" class="dropdown-item delete-button">Edite</button>
                                              </form></li>
                                            <li><form method="POST" action="{{ route('posts.destroy', $resultposts->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item delete-button">Delete</button>
                                              </form></li>
                                        </ul> --}}


                                        <div class="ggg">
                                            <img src="{{ asset($resultpost->user->image_url) }}" height="70px" class="rounded-circle">
                                        <span style="margin-top:30px;color: #6250a5;font-weight: bold ;font-size: 22px;margin-left: 10px">{{ $resultpost->user->name }}</span>

                                            <div>
                                                <span class="h5">{{$resultpost->created_at->diffInHours()}}h</span>
                                                <label class="switch">

                                                    <span ></span>
                                                </label>
                                            </div>
                                        </div>

                                        <a href="#">
                                            <p class="prag">{{ $resultpost->content }}
                                            </p>
                                        </a>

                                        <div class="img">
                                            @if ($resultpost->image_url)
                                            <img src="{{ asset($resultpost->image_url)}}" width="500px">
                                            @endif                                </div>

                                        <div class="saved">
                                            <div id="savedPostContainer"></div>
                                           <form action="{{ route('posts.save') }}" method="POST" id="saveForm">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $resultpost->id }}">
                                            <button type="submit" id="saveButton">
                                                <i class="bi bi-bookmark-fill" id="saved"></i>
                                            </button>
                                        </form>
                                        </div>

                                        {{-- <p class="offer1">{{ count($comments) }} Offers</p> --}}
                                    </div>
                                </div>

                                @empty
                                    <h5>NO Results</h5>
                                @endforelse
                                @endif








                            </div>
                        </div>
                    </div>
                </section>


            </div>
        </div>
    </div>
</section>



@endsection

@section('js')
@endsection

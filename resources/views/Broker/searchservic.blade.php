@extends('BrokerLayouts.main')
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
                    <form action="{{route('broker.search_servie')}}" class="search-bar">
                    <input type="text" placeholder="search" name="search">
                    <button type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
                </div>


                <div class="choose">

                    <a href="{{route('broker.search_servie')}}" class="btn btn-outline-primary but1">Service</a>
                    <a href="{{route('broker.search_index')}}" class="btn btn-outline-dark but2">Keyword</a>


                </div>


                <section class="about section-padding" id="section_4" style="margin-top: 30px">
                    <div class="container">
                        @if (isset($resultposts))
                            @forelse ($resultposts as $resultpost)
                                <div class="row">
                                    <div class="col-lg-6 col-12 d-flex flex-column">
                                        <div class="about-thumb bg-white shadow-lg">
                                            <div class="about-info">
                                                <div class="ggg">
                                                    <img src="{{ asset($resultpost->user->image_url) }}" height="70px" class="rounded-circle">
                                                    <span style="margin-top: 30px; color: #6250a5; font-weight: bold; font-size: 22px; margin-left: 10px;">{{ $resultpost->user->name }}</span>
                                                    <div>
                                                        <span class="h5">{{ $resultpost->created_at->diffInHours() }}h</span>
                                                        <label class="switch"></label>
                                                    </div>
                                                </div>
                                                <a href="#">
                                                    <p class="prag">{{ $resultpost->content }}</p>
                                                </a>
                                                <div class="img">
                                                    @if ($resultpost->image_url)
                                                        <img src="{{ asset($resultpost->image_url) }}" width="500px">
                                                    @endif
                                                </div>
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <h5>NO Results</h5>
                            @endforelse
                        @endif
                    </div>
                </section>

@endsection

@section('js')
@endsection

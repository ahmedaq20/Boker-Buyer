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
                <h3 class="hh3">Ofeers</h3>

                @foreach ($postsWithComments as $comment)
                @foreach ($comment->comments as $item)
                <div class="about-thumb1 bg-white shadow-lg1" style="border: 2px solid #6250A5;
                background-color: var(--section-bg-color);
                margin-top: 1px;">
                    <div class="about-info1">
                        <img src="{{ asset($comment->user->image_url) }}" height="50px" class="rounded-circle">                        <p class="prag4" style="padding-left: 20px; font-size: 25px">@if ($item->status == '1')
                            {{$comment->user->name}} Send you a Special offer
                        @elseif($item->status == '2')
                        You pending {{$comment->user->name}} offer
                        @elseif($item->status == '3')
                        {{-- You are  Deny this offer --}}
                        @php
                        $user = App\Models\User::where('id', $comment->user_id)->first()
                        @endphp
                        You are Deny {{$comment->user->name}} offer
                        {{-- {{$user->name}} deny your offer --}}

                         @elseif($item->status == '4')
                         @php
                         $user = App\Models\User::where('id', $comment->user_id)->first()
                                             @endphp

                         You Contracted with  {{$comment->user->name}}
                        @endif<br>
                        <span class="h5">5h</span></p>
                        @if ($item->status == '1')
                        <button type="button" data-bs-toggle="modal"
                            data-bs-target="#acceptModal{{ $item->id }}"
                            style="background-color: #F58F29; color: white; border: none; padding: 2px 8px; border-radius: 4px; width: 150px; height: 50px;">
                            Accept
                        </button>
                    @elseif($item->status == '2')
                        <button type="button" data-bs-toggle="modal"
                            data-bs-target="#acceptModal{{ $item->id }}"
                            style="background-color: #BA3B46; color: white; border: none; padding: 2px 8px; border-radius: 4px; width: 150px; height: 50px;">
                            Pending
                        </button>

                    @elseif($item->status == '3')
                        <button type="button"
                            style="background-color: rgb(0, 0, 0); color: white; border: none; padding: 2px 8px; border-radius: 4px; width: 150px; height: 50px;">
                            Deny
                        </button>
                        @elseif($item->status == '4')
                        <button type="button" data-bs-toggle="modal"
                            data-bs-target="#acceptModal{{ $item->id }}"
                            style="background-color:rgb(86, 228, 58);; color: white; border: none; padding: 2px 8px; border-radius: 4px; width: 150px; height: 50px;">
                            Contracted
                        </button>

                        @endif
                    </div>
                </div>

                @endforeach
                @endforeach

           </div>
        </div>
    </div>
</section>






@endsection

@section('js')
@endsection

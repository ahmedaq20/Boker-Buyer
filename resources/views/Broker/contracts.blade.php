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
                    <h3 class="hh3">Contracts</h3>

                    @foreach ($userComments as $comment)
                        <div class="about-thumb1 bg-white shadow-lg1"
                            style="border: 2px solid #6250A5;
                background-color: var(--section-bg-color);
                margin-top: 1px;">
                            <div class="about-info1">
                                @php
                                    $user_id = Auth::guard('broker')->user()->id;
                                 $brokers_info = App\Models\brokerinof::where('user_id','=',$user_id)->first();

                                @endphp
                                <img src="{{ asset($brokers_info->image_url) ?? asset('assets/images/UserProfile')  }}" height="50px" class="rounded-circle">
                                <p class="prag4" style="padding-left: 20px; font-size: 25px">
                                    @if ($comment->status == '1')
                                        {{-- {{ $brokers_info->fname ?? $brokers_info->broker->name }} Send you a Special offer --}}
                                        @php
                                           $post= App\Models\posts::where('id', '=', $comment->post_id)->first();

                        $user = App\Models\User::where('id', $post->user_id)->first();

                                        @endphp
                                        You Send a Special offer to {{$user->name}}
                                    @elseif($comment->status == '2')
                                        Your offer is pending Now
                                    @elseif($comment->status == '3')
                                       Your offer is Deny
                                    @elseif($comment->status == '4')
                                        You are Contracted with {{$user->name}} successfully
                                    @endif
                                    <br>
                                    <span class="h5">5h</span>
                                </p>
                                @if ($comment->status == '1')
                                    <button type="button" data-bs-toggle="modal"
                                        data-bs-target="#acceptModal{{ $comment->id }}"
                                        style="background-color: #F58F29; color: white; border: none; padding: 2px 8px; border-radius: 4px; width: 150px; height: 50px;">
                                        Accept
                                    </button>
                                @elseif($comment->status == '2')
                                    <button type="button" data-bs-toggle="modal"
                                        data-bs-target="#acceptModal{{ $comment->id }}"
                                        style="background-color: #BA3B46; color: white; border: none; padding: 2px 8px; border-radius: 4px; width: 150px; height: 50px;">
                                        Pending
                                    </button>
                                @elseif($comment->status == '3')
                                    <button type="button"
                                        style="background-color: rgb(0, 0, 0); color: white; border: none; padding: 2px 8px; border-radius: 4px; width: 150px; height: 50px;">
                                        Deny
                                    </button>
                                    @elseif($comment->status == '4')
                                    <button type="button" data-bs-toggle="modal"
                                        data-bs-target="#acceptModal{{ $comment->id }}"
                                        style="background-color:rgb(86, 228, 58);; color: white; border: none; padding: 2px 8px; border-radius: 4px; width: 150px; height: 50px;">
                                        Contracted
                                    </button>
                                @endif
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
@endsection

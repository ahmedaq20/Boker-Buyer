@extends('layouts.main')
@section('title')
    Home Broker
@endsection



@section('css')
@endsection

@section('content')

<section class="about section-padding" id="section_3">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12 d-flex flex-column">
                <div class="about-thumb1 bg-white shadow-lg1">
                    <div class="about-info">
                        <div class="gg">
                            <img src="{{asset($broker_info->image_url)}}" height="150px">
                            <span class="ss">{{$broker_info->fname.''.$broker_info->lname ?? $broker->name }}</span>
                            <div class="stars">
                                <br>
                                <br><br>
                             
                            <i class="bi bi-geo-alt-fill">{{$broker_info->country}}</i>
                            </div>
                            <div class="mm">

                                @for ($i = 1; $i <= $broker_info->stars; $i++)
                                <i class="bi bi-star-fill"></i>
                            @endfor

                            @for ($i = $broker_info->stars + 1; $i <= 5; $i++)
                                <i class="bi bi-star"></i>
                            @endfor


                            </div>
                            <style>
                                .mm {
                                    color: #F58F29;
                                    margin-bottom: 20px;
                                    margin-left: 563px;
                                    font-size: 20px;
                                }

                                .about .container .row .col-lg-6 .shadow-lg1 {
                                    background: none;
                                    border: 0;
                                }




                                .about .container .about-thumb1 i {
                                color: #ef9a45;
                                font-size: 20px;
                                margin-left: -82px;
                                margin-top: 45px;
                                }

                                .edit button {
                                height: 40px;
                                width: 250px;
                                position: absolute;
                                margin-left: -1044px;
                                margin-top: 83px;
                                background-color: #30C030;
                                border: 1px solid #30C030;
                                font-size: 18px;
                            }
                            .stars{
                            margin-left: -83px;
                            margin-top: 43px;font-size: 10px;

                            }

                            </style>


                            <div class="edit"  >
                                <a href="https://api.whatsapp.com/send?phone={{ $broker->phone_number }}" target="_blank"><button>Contact via Whatsapp</button></a>


                            </div>
                        </div>
                    </div>
                </div>








                <div class="about-thumb bg-white shadow-lg">
                    <div class="about-info">

                        <span style="font-size: 29px">Bio</span>
                        <p class="prag">{{$broker_info->bio}}</p>
                    </div>
                </div>


                <div class="container2">
                    <h6>Interests</h6>





                        <div class="about-info55">
                            <!-- Other content here -->
                            <div class="gg">
                                <!-- Other content here -->
                                <p>content writer , motion graphic  </p>
                            </div>
                        </div>


                </div>

                <style>
                     .container2 {
                        padding-left: 50px;
                        padding-top: 30px;

                    }

                    .container2 select {
                        width: 100%;
                        font-family: 'Roboto', sans-serif;
                    }
                    .about-info55{
                        width: 842px;
                        height: 130px;
                        background-color: #f7f4ea;
                        border:3px solid var(--primary-color);
                        font-size: 15px;
                        padding-left: 30px;
                        padding-top: 30px;


                    }

                </style>


                <div class="op">
                    <h5>Buyer Opinion</h5>
                    <div class="about-thumb2 ">
                        <div class="about-info1">
                            <img src="{{asset('assets/images/prof3.png')}}" height="60px">
                            <p class="prag4" style="padding-left: 20px; font-size: 25px">Thank you for the exceptional work! We truly appreciate your valuable feedback and collaboration.<br>
                                <span class="h5">5h</span></p>

                            <span class="custom3-btn btn">
                                         <i class="bi bi-star-fill"></i>
                                         <i class="bi bi-star-fill"></i>
                                         <i class="bi bi-star-fill"></i>
                                         <i class="bi bi-star-fill"></i>
                        </span>
                        </div>
                    </div>




                    <div class="about-thumb2 ">
                        <div class="about-info1">
                            <img src="{{asset('assets/images/prof1.png')}}" height="60px">
                            <p class="prag4" style="padding-left: 20px; font-size: 25px">We are extremely grateful for your outstanding services! Your dedication and expertise have made a significant impact on our project's success. Thank you for your exceptional work!<br>
                                <span class="h5">5h</span></p>

                            <span class="custom3-btn btn">
                                         <i class="bi bi-star-fill"></i>
                                         <i class="bi bi-star-fill"></i>
                                         <i class="bi bi-star-fill"></i>
                                         <i class="bi bi-star-fill"></i>
                                         <i class="bi bi-star-fill"></i>
                        </span>
                        </div>
                    </div>









                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('js')

@endsection

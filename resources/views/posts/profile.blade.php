@extends('layouts.main')
@section('title')
    Home Broker
@endsection



@section('css')
@endsection

@section('content')
    <main>
        <section class="about section-padding" id="section_3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 d-flex flex-column">
                        <div class="about-thumb1 bg-white shadow-lg1">
                            <div class="about-info">
                                <div class="gg">
                                    {{-- <img src="{{ asset(Auth::user()->image_url) }}" height="150px" class="rounded-circle"> --}}
                                    <div class="img">

                                        <img src="{{ asset(Auth::user()->image_url) ?? asset('assets/images/UserProfile')}}" width="500px" class="rounded-circle">

                                    </div>


                                    <style>
                                        .rounded-circle {
                                            border-radius: 5%;
                                            width: 150px;
                                            height: 150px;
                                        }
                                    </style>
                                    <span>{{$profile->name .' '.$profile->lname}}</span>
                                    <i class="bi bi-geo-alt-fill">{{$profile->country}}</i>

                                    <button type="button" class="m-250 btn btn-outline-primary" style="margin-left: 10px;margin-top: 50px;border-color:#6250a5;font-weight:550; color: #6250a5" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                                        Complite Profile
                                    </button>

                                </div>
                            </div>
                        </div>
                            <!-- Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel"
    aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <div class="modal-body">
               <form action="{{ route('profile.create',$user_id) }}" method="POST"
                enctype="multipart/form-data"
               >
                   @csrf

                   <div class="mb-3">
                       <label for="f_name" class="form-label">First Name</label>
                       <input type="text" class="form-control" id="f_name" name="name" placeholder="Hassan">
                   </div>

                   <div class="mb-3">
                    <label for="f_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="salha">
                </div>

                <div>
                    <label for="profile_image" class="block font-medium text-sm text-gray-700">Profile Image</label>
                    <input type="file" name="image" id="profile_image" class="mt-1">
                </div>
                   <div class="mb-3">
                       <label for="l_name" class="form-label">Mobile</label>
                       <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Shamri">
                   </div>
                   <div class="mb-3">
                       <label for="Country" class="form-label">Country</label>
                       <input type="text" class="form-control" id="Country" name="country" placeholder="Palestine">
                   </div>
                   <div class="mb-3">
                       <label for="City" class="form-label">City</label>
                       <input type="text" class="form-control" id="City" name="city" placeholder="Gaza">
                   </div>
                   <div class="mb-3">
                       <label for="birthday" class="form-label">Birthday</label>
                       <input type="text" class="form-control" id="birthday" name="birthday" placeholder="14 May 1995">
                   </div>
                   <div class="mb-3">
                       <label for="bio" class="form-label">Bio</label>
                       <textarea class="form-control" id="bio" name="bio"
                                 placeholder="This file features a messages experience with several interactive elements, including scroll groups including scroll groups"></textarea>
                   </div>
                   <button type="submit" class="btn btn-primary">Update Profile</button>
               </form>
           </div>
       </div>
   </div>
</div>



                        <div class="forme">
                            <form action="">

                                <div class="for1">

                                    <div>
                                        <label>First Name</label>
                                        <input id="inp" type="text" value="{{$profile->name ?? 'name'}}" name="name" placeholder="Hassan">

                                    </div>

                                    <label>Country</label>
                                    <input id="inp1" type="text" value="{{$profile->country ?? 'country'}}" name="Country" placeholder="Palestine">


                                    <label>Mobile</label>
                                    <input id="inp2"type="number" value="{{$profile->phone_number?? 'Mobile'}}"  name="Mobile" placeholder="+970 597 44 5678">

                                </div>

                                <div class="for2">

                                    <label>Last Name</label>
                                    <input id="inp3" type="text" value="{{$profile->lname ?? 'Last Name'}}" name="name" placeholder="Hassan">

                                    <label>City</label>
                                    <input id="inp4" type="text" value="{{$profile->city ?? 'City'}}" name="City" placeholder="Gaza">


                                    <label for="date">
                                        Birthday:
                                    </label>
                                    <input id="inp5" type="text" value="{{$profile->birthday ?? '1-1-2020'}}" name="date" id="date"
                                        placeholder="14 May 1995" pattern="\d{4}-\d{2}-\d{2}">
                                </div>


                                <div class="about-thumb bg-white shadow-lg">
                                    <div class="about-info">

                                        <span>Bio</span>
                                        <p class="prag">
                                            <input id="inp6" type="text" name="Bio" value="{{$profile->bio ?? '
                                            This file features a messages experience with several
                                            interactive elements, including scroll groups including
                                            scroll groups'}}"
                                                placeholder="This file features a messages experience with several
                                                             interactive elements, including scroll groups including
                                                             scroll groups">
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>


                        {{-- <div class="container2">
                            <h6>Interests</h6>

                            <table id="selectedTable">

                            </table>

                            <select id="optionList" multiple>
                                <option value="Mobiles">Mobiles</option>
                                <option value="Laptops">Laptops</option>
                                <option value="iPhones">iPhones</option>
                                <option value="AirPods">AirPods</option>


                                <!-- Add more options here -->
                            </select>



                            <button onclick="addRow()">Add Selected</button>


                        </div> --}}

                    </div>
                </div>
            </div>
        </section>



    </main>
@endsection

@section('js')

@endsection

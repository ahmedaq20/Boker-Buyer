@extends('BrokerLayouts.main')
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
                                @php
                                    $user = Auth::guard('broker')->user();
                                @endphp
                                <div>
                                    <img src="{{ asset($profile->image_url)  ?? asset('assets/images/UserProfile')  }}" height="140px" class="rounded-circle">
                                </div>
                                <style>
                                    .rounded-circle {
                                        border-radius: 50%;
                                        width: 140px;
                                        height: 140px;
                                    }
                                </style>
                                <span>{{ $profile->fname ?? $user->name }} {{ $profile->lname ?? '' }}</span>
                                <i class="bi bi-geo-alt-fill">{{ $profile->country ?? 'palstine' }}</i>

                                <button type="button" class="m-250 btn btn-outline-primary"
                                    style="margin-left: 10px;margin-top: 50px;border-color:#6250a5;font-weight:550; color: #6250a5"
                                    data-bs-toggle="modal" data-bs-target="#editProfileModal">
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
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('broker.profile.create') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="f_name" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="f_name" name="fname"
                                                placeholder="Hassan">
                                        </div>
                                        <div class="mb-3">
                                            <label for="l_name" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="l_name" name="lname"
                                                placeholder="Shamri">
                                        </div>
                                        <div class="mb-3">
                                            <label for="profile_image"
                                                class="block font-medium text-sm text-gray-700">Profile Image</label>
                                            <input type="file" name="image" id="image" class="mt-1">
                                        </div>
                                        <div class="mb-3">
                                            <label for="Country" class="form-label">Country</label>
                                            <input type="text" class="form-control" id="Country" name="country"
                                                placeholder="Palestine">
                                        </div>
                                        <div class="mb-3">
                                            <label for="City" class="form-label">City</label>
                                            <input type="text" class="form-control" id="City" name="city"
                                                placeholder="Gaza">
                                        </div>
                                        <div class="mb-3">
                                            <label for="birthday" class="form-label">Birthday</label>
                                            <input type="text" class="form-control" id="birthday" name="birthday"
                                                placeholder="14 May 1995">
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
                                    <input id="inp" type="text" value="{{ $profile->fname ?? 'ss' }}"
                                        name="name" placeholder="Hassan">

                                </div>

                                <label>Country</label>
                                <input id="inp1" type="text" value="{{ $profile->country ?? 'asd' }}"
                                    name="Country" placeholder="Palestine">


                                <label>Mobile</label>
                                <input id="inp2"type="number" value="{{ $broker_phone->phone_number ?? '123' }}"
                                    name="Mobile" placeholder="+970 597 44 5678">

                            </div>

                            <div class="for2">

                                <label>Last Name</label>
                                <input id="inp3" type="text" value="{{ $profile->lname ?? '1584' }}"
                                    name="name" placeholder="Hassan">

                                <label>City</label>
                                <input id="inp4" type="text" value="{{ $profile->city ?? 'gaza' }}"
                                    name="City" placeholder="Gaza">


                                <label for="date">
                                    Birthday:
                                </label>
                                <input id="inp5" type="text" value="{{ $profile->birthday ?? '1-1-2000' }}"
                                    name="date" id="date" placeholder="14 May 1995" pattern="\d{4}-\d{2}-\d{2}">
                            </div>


                            <div class="about-thumb bg-white shadow-lg">
                                <div class="about-info">

                                    <span>Bio</span>
                                    <p class="prag">
                                        <input id="inp6" type="text" name="Bio"
                                            value="{{ $profile->bio ?? 'None' }}"
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

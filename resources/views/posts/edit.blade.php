@extends('layouts.main')
@section('title')
    Home Buary
@endsection

@section('css')
@endsection

@section('content')
<main>
    <section class="about section-padding" id="section_2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 d-flex flex-column">
                    <h3 class="hh3">Edit POST</h3>
                    <div class="about-thumb bg-white shadow-lg">
                        <div class="about-info">
                            <div class="gg">

                                {{-- <img src="{{ asset($post->user->image_url) }}" height="50px" class="rounded-circle"> --}}

                                <div class="img">
                                    @if ($post->user->image_url)
                                    <img src="{{ asset($post->user->image_url) ?? asset('assets/images/UserProfile')}}" width="500px" class="rounded-circle">
                                    @endif
                                </div>


                                <style>
                                    .rounded-circle {
                                        border-radius: 5%;
                                        width: 50px;
                                        height: 50px;
                                    }
                                </style>
                                <span style="margin-top:30px ">{{ $post->user->name }}</span>
                                <form method="post" action="{{ route('posts.update',$post->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('Put')
                                    <select class="ss form-control" style="margin-top:88px " name="active">
                                        <option value="1">Active</option>
                                        <option value="0">None Active</option>
                                    </select>
                            </div>

                            <div class="textpost">
                                <input type="text" name="content" id="postContent" value="{{$post->content}}" class="form-control">
                            </div>

                            <div class="icon1">
                                <button><i class="bi bi-geo-alt-fill" style="color: #BA3B46"></i></button>
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#imageModal"><i class="bi bi-file-image" style="color: orange"></i></button>
                                {{-- hear icone for chose category --}}
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#categoryModal"><i class="bi bi-grid-3x3-gap" style="color: rgb(126, 125, 125)"></i></button>
                            </div>

                            <div class="lleft">
                                <span id="characterCount">0 / 500</span>
                                <button type="submit" class="btn btn-outline-primary">Save Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Image and Category Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width: 50%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Choose Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Image selection form -->
                <div class="mb-3">
                    <label for="postImage" class="form-label">Upload Image</label>
                    <input type="file" class="form-control" id="postImage" name="image">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Category Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width: 50%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryModalLabel">Choose Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Category selection form -->
                <div class="mb-3">
                    <label for="categorySelect" class="form-label">Select Category</label>
                    <select class="form-select" id="categorySelect" name="category">
                        @foreach ($categorys as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>

</form>

<script>
    const postContent = document.getElementById('postContent');
    const characterCount = document.getElementById('characterCount');

    postContent.addEventListener('input', function () {
        const content = postContent.value;
        const count = content.length;
        characterCount.textContent = count + ' / 500';
    });
</script>

@endsection

@section('js')
@endsection

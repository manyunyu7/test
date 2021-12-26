@extends('main.template')

@section('head-section')
    <script src="{{ asset('library/ckeditor/ckeditor.js') }}"></script>
    <style>
        #previewCover {
            object-fit: cover;
            height: 200px;
            width: 100%;
        }

    </style>
@endsection

@section('script')
    {{-- JS-SECTION-B --}}
    <script>
        $('#tagsinput').tagsinput({
            tagClass: 'badge-info'
        });
    </script>
    <script>
        CKEDITOR.replace('content', {
            filebrowserImageBrowseUrl: '/filemanager?type=Images',
            filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/filemanager?type=Files',
            filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='
        });
    </script>
@endsection

@section('main')
    <script>
        window.onload = function () {
            // jQuery and everything else is loaded


            var el = document.getElementById('input-image');
            el.onchange = function () {
                var fileReader = new FileReader();
                fileReader.readAsDataURL(document.getElementById("input-image").files[0])
                fileReader.onload = function (oFREvent) {
                    document.getElementById("imgPreview").src = oFREvent.target.result;
                };
            }

            $(document).ready(function () {
                $.myfunction = function () {
                    $("#previewName").text($("#inputTitle").val());
                    var title = $.trim($("#inputTitle").val())
                    if (title == "") {
                        $("#previewName").text("Judul")
                    }
                };

                $("#inputTitle").keyup(function () {
                    $.myfunction();
                });

            });
        }
    </script>


    <form action="{{ route('podcast.store') }}" method="POST" enctype="multipart/form-data">
        <div class="container-fluid mt-3">
            <div class="main-content-container container-fluid px-4">

                <!-- Page Header -->
                <div class="page-header row no-gutters mb-4">
                    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                        <span class="text-uppercase page-subtitle">Tambah Podcast</span>
                        <h3 class="page-title">Tambah Podcast</h3>
                    </div>
                </div>

                <!-- End Page Header -->
                <div class="row">
                    <div class="col-lg-8 col-md-12">

                        @if(session() -> has('success'))
                            <div class="alert alert-primary alert-dismissible fade show mx-2 my-2" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>

                                <script>
                                    var notify = $.notify('<strong>Saving</strong> Do not close this page...', {allow_dismiss: false});
                                    notify.update({
                                        type: 'success',
                                        '<strong>Success</strong> Your page has been saved!'
                                    });
                                </script>

                                <strong>{{Session::get( 'success' )}}</strong>
                            </div>


                        @elseif(session() -> has('error'))

                            <div class="alert alert-primary alert-dismissible fade show mx-2 my-2" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <strong>{{Session::get( 'error' )}}</strong> You should check in on some of those fields
                                below.
                            </div>
                        @endif


                        <div class="card card-small mb-3">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="font-weight-bold">Judul Podcast</label>
                                    <input required id="inputTitle" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" placeholder="Judul Podcast">

                                    <!-- error message untuk title -->
                                    @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Narasumber Podcast</label>
                                    <input required id="inputTitle" type="text"
                                           class="form-control @error('artist') is-invalid @enderror" name="artist"
                                           value="{{ old('artist') }}"
                                           placeholder="Narasumber Podcast">

                                    <!-- error message untuk title -->
                                    @error('artist')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- / Add New Post Form -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card border-0 shadow rounded">
                                    <div class="card-body">

                                        @csrf
                                        <div class="form-group">
                                            <label class="font-weight-bold">Cover Gambar Podcast</label>
                                            <input required id="input-image" type="file" accept="image/png, image/gif, image/jpeg"  onchange="previewPhoto()"
                                                   class="form-control @error('image') is-invalid @enderror"
                                                   name="image">

                                            <!-- error message untuk title -->
                                            @error('image')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold">File MP3 Podcast</label>
                                            <input required id="input-image" type="file" accept=".mp3,audio/*"  onchange="previewPhoto()"
                                                   class="form-control @error('music') is-invalid @enderror"
                                                   name="music">

                                            <!-- error message untuk title -->
                                            @error('music')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold">Penjelasan Tentang Podcast</label>
                                            <p>Misalnya : Podcast Ini Membahas Tentang Peranan Teknologi Informasi di Era Pandemi
                                            </p>
                                            <textarea class="form-control  @error('desc') is-invalid @enderror"
                                                      name="desc" rows="5"
                                                      placeholder="Masukkan Penjelasan">{{ old('desc') }}</textarea>

                                            <!-- error message untuk content -->
                                            @error('desc')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>


                                        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                                        <button type="reset" class="btn btn-md btn-warning">RESET</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        {{-- Card Preview --}}
                        <div class="card card-post card-round">
                            <img class="card-img-top" id="imgPreview"
                                 src="{{ asset('atlantis/examples') }}/assets/img/blogpost.jpg" alt="Card image cap">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="avatar">
                                        <img  src="{{ Storage::url('public/profile/'). Auth::user()->profile_url }}" alt="..."
                                              class="avatar-img rounded-circle">
                                    </div>
                                    <div class="info-post ml-2">
                                        <p class="username">{{ Auth::user()->name }}</p>
                                        <p class="date text-muted">20 Jan 18</p>
                                    </div>
                                </div>
                                <div class="separator-solid"></div>
                                <p class="card-category text-info mb-1"><a href="#">Design</a></p>
                                <h3 class="card-title" id="previewName">
                                    <a href="#">
                                        Judul Podcast Anda Ditampilkan Disini
                                    </a>
                                </h3>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                    of the card's content.</p>
                                <a href="#" class="btn btn-primary btn-rounded btn-sm">Read More</a>
                            </div>
                        </div>


                    </div>



                </div>
            </div>
        </div>
    </form>
@endsection

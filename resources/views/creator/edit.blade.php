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


    <form action="{{ route('creator.update',$data->id) }}" method="POST" enctype="multipart/form-data">
        <div class="container-fluid mt-3">
            <div class="main-content-container container-fluid px-4">

                <!-- Page Header -->
                <div class="page-header row no-gutters mb-4">
                    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                        <span class="text-uppercase page-subtitle">Edit Anggota Tim</span>
                        <h3 class="page-title">Edit Anggota Tim</h3>
                    </div>
                </div>

                <!-- End Page Header -->
                <div class="row">
                    <div class="col-lg-12 col-md-12">

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
                                    <label class="font-weight-bold">Nama Anggota Tim</label>
                                    <input id="inputTitle" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name',$data->name) }}" placeholder="Masukkan Nama ANGGOTA Tim">

                                    <!-- error message untuk title -->
                                    @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Peranan Anggota Tim</label>
                                    <input id="inputTitle" type="text"
                                           class="form-control @error('role') is-invalid @enderror" name="role"
                                           value="{{ old('role',$data->role) }}"
                                           placeholder="Peranan di Tim (Misalnya UI/UX atau Backend Developer">

                                    <!-- error message untuk title -->
                                    @error('role')
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
                                        <img src="{{ asset($data->photo) }}" class="rounded" style="width: 150px; border-radius:70px;">

                                        @csrf
                                        <div class="form-group">
                                            <label class="font-weight-bold">GAMBAR Foto (Upload Foto Baru Jika Ingin Mengubah)</label>
                                            <input id="input-image" type="file" accept="image/png, image/gif, image/jpeg"  onchange="previewPhoto()"
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
                                            <label class="font-weight-bold">Penjelasan Tambahan</label>
                                            <p>Misalnya : Mahasiswa S1 Informatika di Universitas A dan Asisten
                                                Laboratorium di Lab C
                                            </p>
                                            <textarea class="form-control  @error('desc') is-invalid @enderror"
                                                      name="desc" rows="5"
                                                      placeholder="Masukkan Penjelasan">{{ old('desc',$data->desc) }}</textarea>

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


                </div>
            </div>
        </div>
    </form>
@endsection

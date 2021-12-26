@extends('lessons._template')
@section('main')

    <div class="container-fluid">
        <div class="main-content-container container-fluid px-4 mt-5">
            {{-- @include('blog.breadcumb') --}}

            {{-- @php
            print_r($lessonz)
            @endphp --}}

            <!-- Page Header -->
            <div class="page-header row no-gutters mb-4">
                <div class="col-12 col-sm-12 text-center text-sm-left mb-0">
                    <span class="text-uppercase page-subtitle">Lihat Kelas</span>
                    <h3 class="page-title">{{ $lesson->course_title }}</h3>
                </div>
            </div>


            <!-- End Page Header -->
            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <!-- Add New Post Form -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border-0 shadow rounded">
                                <div class="card-body">
                                    <div class="embed-responsive embed-responsive-16by9 video-mask mb-3">
                                        <video loop controls class="embed-responsive-item">
                                            <source
                                                src="{{ Storage::url('public/class/trailer/') . $lesson->course_trailer }}"
                                                type=video/mp4>
                                        </video>
                                    </div>
                                    <h1 class="card-title">Deskripsi Kelas</h1><br>
                                    {!! $lesson->course_description !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-small mb-3">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="font-weight-bold">Judul Kelas</label>
                                <h3>{{ $lesson->course_title }}</h3>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Kategori Kelas</label>
                                <h3>{{ $lesson->course_category }}</h3>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Dibuat Oleh : </label>
                                <div class="d-flex">
                                    <div class="avatar">
                                        <img src="{{ Storage::url('public/profile/') . $lesson->profile_url }}" alt="..."
                                            class="avatar-img rounded-circle">
                                    </div>
                                    <div class="info-post ml-2">
                                        <p class="username">{{ $lesson->mentor_name }}</p>
                                        <p class="date text-muted">{{ $lesson->created_at }}</p>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>


                </div>


            </div>
        </div>
    </div>

@endsection

@extends('template')

@section('styling')
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

@endsection
@section('body')

    <header>
        <div class="container w-100" data-aos="flip-right">
            <img width="100%" src="{{ URL::to('/') }}/home_assets/img/illustration.svg"
                 alt="Illustration of the evolution of development by octocats"
                 class="home-footer-illustration position-relative z-1 width-full d-block events-none">
        </div>
        <div style="text-align: center">
            <p class="gloss mb-0" style="color: #7F00FF !important;   !important">{{ config('app.name') }}</p>
            {{-- <img src="./home_assets/img/esd_3.png" width="500px" alt="Logo EISD"> --}}
        </div>
        <div style="text-align: center"></div>
        <hr>
    </header>

    <div class="header-top">

    </div>

    <div class="container-fluid jargon row">

    </div>

    <div class="container-fluid row">
        <div class="col-md-6 center ">
            <h2 class="center" data-aos="flip-right">Belajar Lebih Terstruktur</h2>
        </div>
        <div class="col-md-6" data-aos="flip-left">
            <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_r4hFBX.json" mode="bounce"
                           background="TRANSPARENT" speed="1" style="width: 100%; height:300px;" hover loop autoplay>
            </lottie-player>
        </div>
    </div>
    <hr>


    <div>
        <hr>
    </div>

    <div class="container-fluid jargon jargon-6">
        <div class=" row">
            <div class="col-md-6 d-flex justify-content-center center" data-aos="zoom-in-up">
                <div class="ml-3">
                    <div>
                        <h2>Persiapan Kerja dan Belajar
                            Jadi Lebih Optimal</h2>
                    </div>
                    <div>
                        <p>{{ config('app.name') }} menggunakan tools yang sering digunakan oleh perusahaan dan
                            kampus</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-center" data-aos="zoom-in-up">
                    <img class="img-fluid mx-2" src="./home_assets/img/tools.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <div>
        <hr>
    </div>

    {{--

      <div class="row justify-content-center align-items-center">
          <div class="col-md-3 pl-md-0 " data-aos="flip-left">
              <div class="card-pricing2 card-success">
                  <div class="pricing-header">
                      <h3 class="fw-bold">1 Bulan</h3>
                      <span class="sub-title">Paket Coba-Coba</span>
                  </div>
                  <div class="price-value">
                      <div class="value">
                          <span class="currency">Rp.</span>
                          <span class="amount">75<span></span></span>
                          <span class="month">Ribu</span>
                      </div>
                  </div>
                  <ul class="pricing-content">
                      <li>50GB Disk Space</li>
                  </ul>
                  <a href="#" class="btn btn-success btn-border btn-lg w-75 fw-bold mb-3">Daftar</a>
              </div>
          </div>
          <div class="col-md-3 pl-md-0 pr-md-0" data-aos="flip-right" data-aos-delay="500">
              <div class="card-pricing2 card-primary">
                  <div class="pricing-header">
                      <h3 class="fw-bold">3 Bulan</h3>
                      <span class="sub-title">Short Intercourse</span>
                  </div>
                  <div class="price-value">
                      <div class="value">
                          <span class="currency">Rp.</span>
                          <span class="amount">150<span></span></span>
                          <span class="month">Ribu</span>
                      </div>
                  </div>
                  <ul class="pricing-content">
                      <li>60GB Disk Space</li>
                  </ul>
                  <a href="#" class="btn btn-primary btn-border btn-lg w-75 fw-bold mb-3">Daftar</a>
              </div>
          </div>
          <div class="col-md-3 pr-md-0" data-aos="flip-right" data-aos-delay="1000">
              <div class="card-pricing2 card-secondary">
                  <div class="pricing-header">
                      <h3 class="fw-bold">1 Tahun</h3>
                      <span class="sub-title">Bootcamp</span>
                  </div>
                  <div class="price-value">
                      <div class="value">
                          <span class="currency">Rp.</span>
                          <span class="amount">750<span></span></span>
                          <span class="month">Ribu</span>
                      </div>
                  </div>
                  <ul class="pricing-content">
                      <li>70GB Disk Space</li>
                  </ul>
                  <a href="#" class="btn btn-secondary btn-border btn-lg w-75 fw-bold mb-3">Daftar</a>
              </div>
          </div>

      </div> --}}

    {{-- <div class="container-fluid">
        <hr>
    </div> --}}


    <div class="container-fluid jargon jargon-path row">
        <div class="col-md-12 text-center" data-aos="flip-right">
            <br>
            <h1 class="center">Belajar Instant Berkualitas</h1>
            <p class="center"> Dengan 3 Langkah Mudah</p>
        </div>

        <div class="col-md-4 center text-center" data-aos="flip-right" data-aos-duration="1500">
            <lottie-player class="center" src="https://assets1.lottiefiles.com/packages/lf20_jcikwtux.json"
                           background="transparent" speed="1" style="width: 200px; height: 200px;" loop autoplay>
            </lottie-player>
            <br><br><br>
            <h4>Daftar</h4>
        </div>

        <div class="col-md-4 center text-center" data-aos="flip-right" data-aos-duration="1500">
            <lottie-player class="center" src="https://assets9.lottiefiles.com/packages/lf20_e9kjkvml.json"
                           background="transparent" speed="3" style="width: 200px; height: 200px;" loop autoplay>
            </lottie-player>
            <br><br><br>
            <h4>Belajar</h4>
        </div>


        <div class="col-md-4 center text-center" data-aos="flip-right" data-aos-duration="1500">
            <lottie-player class="center" src="https://assets10.lottiefiles.com/packages/lf20_n7DAEZ.json"
                           background="transparent" speed="1" style="width: 200px; height: 200px;" loop autoplay>
            </lottie-player>
            <br><br><br>
            <h4>Tugas Akhir</h4>
        </div>
    </div>

    <div>
        <hr>
    </div>

    <div class="container center jargon">

        <div class="text-center mb-4">
            <h1>Team</h1>
            <p>Developed with 💕 by : </p>
        </div>


        <div class="container-fluid row">

            @forelse($creators as $data)
                <div class="col-md-12 col-lg-4 col-12 card ">
                    <div class="card-body">
                        <div class="text-center">
                            <img class="mb-4 text-center" width="150px" height="150px"
                                 style="border-radius: 50% !important;"
                                 src="{{asset($data->photo)}}" alt="">
                        </div>
                        <h4 class="mt-2 text-center card-title">{{$data->name}}</h4>
                        <p class="card-text text-center">{{$data->role}}</p>
                        <p  style="text-align: center!important;" class="card-text text-center"> {!! $data->desc !!} </p>
                    </div>
                </div>
            @empty

            @endforelse


        </div>
    </div>


    <div>
        <hr>
    </div>


    <div class="container-fluid jargon jargon-client mt-5">
        {{-- <div class="center">
            <h3 style="text-align: center;">Member Kami Dari Berbagai Kampus dan Perusahaan</h3>
        </div>
        <div class="d-flex justify-content-center mb-5">
            <img class="center img-fluid" src="./home_assets/img/members-campus-companies.png" alt="">
        </div> --}}

    </div>

    <div class=" container-fluid jargon jargon-final bg">
        <br><br><br>
        <div class="d-flex justify-content-center">
            <img class="" src="./home_assets/img/members.png" alt="" height="60px">
        </div>
        <div class=" center text-center">
            <h3 style="text-align: center;">"Mari Bergabung Dengan Ratusan User Lainnya di
                {{ config('app.name') }}"
            </h3>
            <p>Tidak perlu download / kartu kredit. Cukup daftar langsung belajar.</p>
            <br><br>
            <button type="button" name="" id="" class="btn btn-primary btn-lg btn-block">Uji Coba Gratis</button>
            <br><br>
        </div>
    </div>


@endsection

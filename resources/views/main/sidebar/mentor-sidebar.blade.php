<li class="nav-item">
    <a data-toggle="collapse" href="#lesson">
        <i class="fas fas fa-book"></i>
        <p>Kelas</p>
        <span class="caret"></span>
    </a>
    <div class="collapse  {{ Request::is('lesson/*') ? 'show' : '' }}" id="lesson">
        <ul class="nav nav-collapse">
            <li class="{{ Request::is('lesson/manage') ? 'active' : '' }}">
                <a href="{{ url('/lesson/manage') }}">
                    <span class="sub-item">Manage Kelas</span>
                </a>
            </li>
            <li class="{{ Request::is('lesson/create') ? 'active' : '' }}">
                <a href="{{ url('/lesson/create') }}">
                    <span class="sub-item">Buat Kelas</span>
                </a>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item">
    <a data-toggle="collapse" href="#base">
        <i class="fas fa-pen-alt"></i>
        <p>Blogs</p>
        <span class="caret"></span>
    </a>
    <div class="collapse  {{ Request::is('blog/*') ? 'show' : '' }}" id="base">
        <ul class="nav nav-collapse">
            <li>
                <a href="{{ url('/blogs') }}">
                    <span class="sub-item">Lihat Blog</span>
                </a>
            </li>
            <li class="{{ Request::is('blog/manage') ? 'active' : '' }}">
                <a href="{{ url('/blog/manage') }}">
                    <span class="sub-item">Manage Blog</span>
                </a>
            </li>
            <li class="{{ Request::is('blog/create') ? 'active' : '' }}">
                <a href="{{ url('/blog/create') }}">
                    <span class="sub-item">Tulis Blog</span>
                </a>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item">
    <a data-toggle="collapse" href="#creator">
        <i class="fab fa-affiliatetheme"></i>
        <p>Anggota Tim</p>
        <span class="caret"></span>
    </a>
    <div class="collapse  {{ Request::is('creator/*') ? 'show' : '' }}" id="creator">
        <ul class="nav nav-collapse">
            <li class="{{ Request::is('creator/create') ? 'active' : '' }}">
                <a href="{{ url('/creator/create') }}">
                    <span class="sub-item">Tambah Anggota Tim</span>
                </a>
            </li>
            <li class="{{ Request::is('creator/manage') ? 'active' : '' }}">
                <a href="{{ url('/creator/manage') }}">
                    <span class="sub-item">Manage Anggota Tim</span>
                </a>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item  {{ (Request::is('portfolio/*')) ? 'active' : ''}}">
    <a data-toggle="collapse" href="#arts">
        <i class="fas fa-cubes"></i>
        <p>Karyaku</p>
        <span class="caret"></span>
    </a>
    <div class="collapse  {{ (Request::is('portfolio/*')) ? 'show' : ''}}" id="arts">
        <ul class="nav nav-collapse">
            <li>
                <a href="{{url('/portfolios')}}">
                    <span class="sub-item">Lihat Karya</span>
                </a>
            </li>
            <li class="{{ (Request::is('portfolio/create')) ? 'active' : ''}}">
                <a href="{{url('/portfolio/create')}}">
                    <span class="sub-item">Upload Karya</span>
                </a>
            </li>
            <li class="{{ (Request::is('portfolio/manage')) ? 'active' : ''}}">
                <a href="{{url('/portfolio/manage')}}">
                    <span class="sub-item">Manage Karya</span>
                </a>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item">
    <a data-toggle="collapse" href="#podcast">
        <i class="fas fa-music"></i>
        <p>Podcast</p>
        <span class="caret"></span>
    </a>
    <div class="collapse  {{ Request::is('podcast/*') ? 'show' : '' }}" id="podcast">
        <ul class="nav nav-collapse">
            <li class="{{ Request::is('podcast/create') ? 'active' : '' }}">
                <a href="{{ url('/podcast/create') }}">
                    <span class="sub-item">Tambah Podcast</span>
                </a>
            </li>
            <li class="{{ Request::is('podcast/manage') ? 'active' : '' }}">
                <a href="{{ url('/podcast/manage') }}">
                    <span class="sub-item">Manage Podcast</span>
                </a>
            </li>
        </ul>
    </div>
</li>


<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

<div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Menu</li>

            <li>
                <a href="{{url('/')}}" class="waves-effect">
                    <div class="d-inline-block icons-sm me-1"><i class="uim uim-airplay"></i></div><span class="badge rounded-pill text-bg-success float-end">3</span>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- <li>
                <a href="calendar.html" class=" waves-effect">
                    <div class="d-inline-block icons-sm me-1"><i class="uim uim-schedule"></i></div>
                    <span>Calendar</span>
                </a>
            </li> -->

            <li @if($link == 'soal') class="mm-active" @endif>
                <a href="javascript: void(0);" class="has-arrow waves-effect" @if($link == 'soal') aria-expanded="true" @endif>
                    <div class="d-inline-block icons-sm me-1"><i class="uim uim-comment-message"></i></div>
                    <span>Soal</span>
                </a>
                <ul class="sub-menu @if($link == 'soal') mm-collapse mm-show  @endif" aria-expanded="false">
                    <li><a href="{{url('soal')}}" @if($link == 'soal') class="active"  @endif>Kategori</a></li>
                    <li><a href="email-read.html">Isi Soal</a></li>
                    <li><a href="email-compose.html">Email Compose</a></li>
                </ul>
            </li>
        </ul>

    </div>
    <!-- Sidebar -->
</div>
</div>
<!-- Left Sidebar End -->
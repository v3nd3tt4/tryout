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

                @if (!empty(auth()->user()))
                    @if(auth()->user()->hasRole('admin'))
                <li>
                    <a href="{{url('user')}}" class=" waves-effect">
                        <div class="d-inline-block icons-sm me-1"><i class="uim uim-bag"></i></div>
                        <span>User</span>
                    </a>
                </li>

                <li @if($link=='kategori' || $link=='isi' ) class="mm-active" @endif>
                    <a href="javascript: void(0);" class="has-arrow waves-effect"
                        @if($link=='kategori' || $link=='isi' ) aria-expanded="true" @else aria-expanded="false" @endif>
                        <div class="d-inline-block icons-sm me-1">
                            <i class="uim uim-comment-message"></i>
                        </div>
                        <span>Master Soal</span>
                    </a>
                    <ul class="sub-menu @if($link == 'kategori' || $link == 'isi') mm-collapse mm-show @else mm-collapse @endif" aria-expanded="false">
                        <li class="{{ ($link == 'kategori') ? 'mm-active' : '' }}">
                            <a href="{{ url('soal') }}" class="{{ ($link == 'kategori') ? 'active' : '' }}">
                                Kategori Soal
                            </a>
                        </li>
                        <li class="{{ ($link == 'isi') ? 'mm-active' : '' }}">
                            <a href="{{ url('isisoal') }}" class="{{ ($link == 'isi') ? 'active' : '' }}">
                                Isi Soal
                            </a>
                        </li>
                    </ul>
                </li>
                    @endif
                @endif
            </ul>

        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
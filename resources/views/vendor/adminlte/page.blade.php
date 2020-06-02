@extends('adminlte::master')

@if(config('adminlte.layout_topnav') || View::getSection('layout_topnav'))
    @php( $def_container_class = 'container' )
@else
    @php( $def_container_class = 'container-fluid' )
@endif

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body', $adminlte->getBodyClasses())

@section('body_data', $adminlte->getBodyData())

@section('body')
    <div id="app" class="wrapper"> {{-- i added id="app" for Vue (LP) --}}

        {{-- Top Navbar --}}
        @if(config('adminlte.layout_topnav') || View::getSection('layout_topnav'))
            @include('adminlte::partials.navbar.navbar-layout-topnav')
        @else
            @include('adminlte::partials.navbar.navbar')
        @endif

        {{-- Left Main Sidebar --}}
        @if(!config('adminlte.layout_topnav') && !View::getSection('layout_topnav'))
            @include('adminlte::partials.sidebar.left-sidebar')
        @endif

        {{-- Content Wrapper --}}
        <div class="content-wrapper">

            {{-- Content Header --}}
            <div class="content-header">
                <div class="{{ config('adminlte.classes_content_header') ?: $def_container_class }}">
                    @yield('content_header')
                    @if (session()->has('flash'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ session('flash') }}
                        </div>
                    @endif
                </div>
            </div>

            {{-- Main Content --}}
            <div class="content">
                <div class="{{ config('adminlte.classes_content') ?: $def_container_class }}">
                    @yield('content')
                </div>
            </div>

        </div>

        {{-- Footer --}}
        @hasSection('footer')
            @include('adminlte::partials.footer.footer')
        @endif

        {{-- Right Control Sidebar --}}
        @if(config('adminlte.right_sidebar'))
            @include('adminlte::partials.sidebar.right-sidebar')
        @endif

    </div>
@stop

@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    @stack('js')
    @yield('js')
@stop

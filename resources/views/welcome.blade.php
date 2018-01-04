<?php
    //todo: declare dependencies
    /** @var $attendance \Models\StudentAttendance */
?>
        @extends('parent')
        @section('content')
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Assalam-o-Alaikum
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Unity</a>
                    <a href="https://laracasts.com">Faith</a>
                    <a href="https://laravel-news.com">Discipline</a>
                </div>
            </div>
        </div>
        @endsection

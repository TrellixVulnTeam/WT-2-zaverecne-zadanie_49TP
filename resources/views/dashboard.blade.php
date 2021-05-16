
@extends('layouts.test')
@section('title', 'testy')



@section('styles')
    {{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link
        href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css"
        rel="stylesheet"  type='text/css'>--}}
@endsection

@section('content')

    <div id="sidebar">
        <div id="sidebar-header">
            <div id="sidebar-header-container">
                <div id="sidebar-left"> </div>
                <div id="sidebar-right"><button class="basic-btn" id="sidebar-close-btn"><i class="fa fa-times"></i></button></div>
            </div>
        </div>
        <div>
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="fa fa-edit"></i> Create Test</a>
                </li>
                <li>
                    <a href="{{ route('tests') }}"><i class="fa fa-list"></i> Show Test</a>
                </li>
                <li>
                    <a href="{{ route('tests.live') }}"><i class="fa fa-graduation-cap"></i> Show Live Test</a>
                </li>
            </ul>
        </div>
    </div>

    <div id="container">
        <nav id="navbar" >
            <div id="nav-container">
                <div id="container-left"><div class="nav-text" id="btn-menu"><button class="basic-btn"><i class="fa fa-bars"></i></button></div></div>
                <div id="container-right" class="container-text">

                            <form id="logout" method="post" action="{{ route('logout') }}">
                                <i class="fa fa-user icon"></i>{{Auth::user()->name}}
                                @csrf
                                <a class="navbar-item" href="#" onclick="document.getElementById('logout').submit()">
                                    <i class="fa fa-power-off "></i>
                                    <span class="nav-text">Logout</span>
                                </a>
                            </form>

                </div>
            </div>
        </nav>

        <div id="items">
            <div id="bar">
                <div id="bar-top">
                    <div class="btn-header">
                        <button id="addTest" class="btn btn-add btn-center">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div id="bar-chosser">

                    <div id="bar-chosser-choice">
                        <div class="form-group ">

                            <label for="newQuestion">Choose type of question</label>
                            <select class="form-control " name="newQuestion" id="newQuestion">
                                <option value="0">Multiple choice question</option>
                                <option value="1">Question with short anser</option>
                                <option value="2">Pair Question</option>
                                <option value="3">Draw question</option>
{{--                                <option value="4">Otazka s matematickym</option>--}}
                            </select>
                        </div>

                        <div id="QuestionEditor"> </div>
                    </div>
                </div>

                <div id="bar-creator">
                    <div id="bar-form">
{{--                        <form  method="POST"  action="" id="test-form" enctype="multipart/form-data">--}}
                        <form   id="test-form" enctype="multipart/form-data">
                            <div>
                            <div class="form-row line">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="testName" class="nazov">Test Name</label>
                                        <input name="testName" type="testName" id="testName" class="form-control " placeholder="Test Name" required />

                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="timeLimit" class="nazov">Time Limit (min)</label>
                                        <input name="timelimit" type="number" id="timeLimit" class="form-control" placeholder="Time Limit" required />

                                    </div>
                                </div>
                            </div>
                            </div>
                            <div  id="questionsBody">

                            </div>
                            <div class="form-group btn-center">
                                <button type="button" id="submit-teacher" name="submit" class="btn btn-send btn-primary" >Create Test</button>
                            </div>
                            <div id="valid">

                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <pre id="json"></pre>
        </div>
    </div>
    @endsection

    @section('scripts')
        <script src="{{asset('js/hardcore.js')}}"></script>
    @endsection


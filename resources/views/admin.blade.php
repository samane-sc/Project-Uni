<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="/img/red-white-bokeh-bg.jpg" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="{{asset('js/script.js')}}" ></script>
    <style>
        .hovericon :hover{
            transform-style: preserve-3d;
            transform: scale(2);
            transition: all ease 0.3s;
        }


    </style>
</head>
<body class="w3-light-grey" style="font-size: 20px;">
@if (session('alert'))
    <script>
        swal({
            title: "تایید شد",
            text: "آگهی مورد نظر با موفقیت تایید شد",
            icon: "success",
            button: "باشه",
        });

    </script>
@endif
@if (session('deny'))
    <script>
        swal({
            title: "رد شد",
            text: "آگهی مورد نظر با موفقیت رد شد",
            icon: "error",
            button: "باشه",
        });

    </script>
@endif
@if (session('win'))
    <script>
        swal({
            title: "موفق",
            text: "قرعه کشی انجام شد",
            icon: "success",
            button: "باشه",
        });

    </script>
@endif
@if (session('alert'))
    <script>
        swal({
            title: "موفق",
            text: "اعلام انجام شد",
            icon: "success",
            button: "باشه",
        });

    </script>
@endif
<script src="{{asset('js/javascript.js')}}"></script>
<div class="dark" style="display: none; width: 100%; height: 100%; position: fixed; top: 0; left: 0; margin: auto; background-color: rgba(0, 0, 0, 0.7); z-index: 1;"></div>
<!--navbar-->
@can('admin')
<div class="row">
    <nav class="navbar justify-content-end bg-dark navbar-dark fixed-top">
        <ul class="nav" dir="rtl" align="right">
            <li class="signin nav-item pr-4">
                <a class="nav-link text-light" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('خروج ادمین') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
</div>
<div style="padding-top:10px ;display: block;">
    <!-- Sidebar/menu -->
    <nav class="w3-white float-right"  style="z-index:3;width:300px;margin-top:50px;height: 100%;position: fixed;right: 0" align="right" id="mySidebar"><br>
        <div class="w3-container w3-row">
            <div class="w3-col s4">
                <img src="img/avatar3.png" class="w3-circle w3-margin-right" style="width:46px">
            </div>
            <div class="w3-col s8 w3-bar">
                <span> خوش آمدی <strong> {{Auth::user()->name}} </strong></span><br>

            </div>
        </div>
        <hr>

        <div class="w3-bar-block" align="right" dir="rtl">
            <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
            <a href="#" onclick="changemycolor(this,'accept')" class=" w3-button w3-padding w3-bar-block-active"><i class="fa fa-bell fa-fw"></i>  تایید قرعه کشی ها</a><br/>
            <a href="#" onclick="changemycolor(this,'done')" class=" w3-button w3-padding btn2"><i class="fa fa-users fa-fw "></i>  انجام دادن قرعه کشی</a><br/>
            <a href="#" onclick="changemycolor(this,'show')" class=" w3-button w3-padding odd"><i class="fa fa-diamond fa-fw"></i>  نمایش کاربران</a><br/>
            <a href="#" onclick="changemycolor(this,'alert')" class=" w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  اعلام قرعه کشی نزدیک</a><br/>
        </div>
    </nav>

    <div class="col-md-9 mt-5 intendedrace" id="accept" style="display: block; position: relative;margin-top: 80px!important;margin-bottom: 50px" dir="rtl" align="center">
        <h4 style="text-align: center;" class="mt-1">
            تایید قرعه کشی ها
        </h4>
        <hr style="width:280px; border:4px double #515151;" class="rounded-circle mt-4">
        <div class="box row justify-content-center">
            @if(empty($lotterys[0]))
                <p>هیچ قرعه کشی وجود ندارد</p>
            @else
                @foreach($lotterys as $lottery)
                    <div class="card col-md-3 col-sm-12 ml-1 mr-1 mt-5" style="flex-direction: column; align-items: center; justify-content: space-between;
                         box-shadow: 1px 1px 12px rgba(0, 0, 0, 0.7) ;
                         background-color: #ffffff; border-radius: 10px;">
                        <img class="card-img-top rounded-circle" src="img/avatar3.png" style="padding: 10px; width: 150px; height: 150px;">
                        <div class="card-body">
                            <div style="border-bottom: 1px outset #515151; width: 250px; text-align: center; "></div>
                            <h5 href="#" dir="rtl" align="right" class="pt-3">
                                <i class="fa fa-user-circle-o fa-fw pl-4" style="opacity: 0.7;"></i>
                                <strong>نام:</strong> {{$lottery->name}}
                            </h5>
                            <h5 href="#" dir="rtl" align="right" class="pt-3">
                                <i class="fa fa-home fa-fw pl-4" style="opacity: 0.7;"></i>
                                @foreach($users->where('id',$lottery->owner_id) as $user)
                                <strong>سازنده:</strong> {{$user->name}}
                                @endforeach
                            </h5>
                            <h5 href="#" dir="rtl" align="right" class="pt-3">
                                <i class="fa fa-users fa-fw pl-4" style="opacity: 0.7;"></i>
                                <strong>تعداد شرکت کننده:</strong> {{$lottery->ucount}}
                            </h5>
                            <h5 href="#" dir="rtl" align="right" class="pt-3">
                                <i class="fa fa-child fa-fw pl-4" style="opacity: 0.7;"></i>
                                <strong>تعداد برنده:</strong> {{$lottery->wcount}}
                            </h5>
                            <h5 href="#" dir="rtl" align="right" class="pt-3">
                                <i class="fa fa-gift fa-fw pl-4" style="opacity: 0.7;"></i>
                                {{$lottery->reward}}
                            </h5>
                            <p  dir="rtl" align="right" class="pt-3">
                                <i class="fa fa-comment-o fa-fw pl-5" style="opacity: 0.7;"></i>
                                <a class="btncard" style="color: black">توضیحات </a>
                            </p>
                            <p href="#" dir="rtl" align="right" class="pt-3">
                                <i class="fa fa-calendar fa-fw pl-4" style="opacity: 0.7;"></i>
                                {{$lottery->ftime}}
                            </p>
                            <form action="{{route('allow',['id' => $lottery->id])}}" method="post"
                                  style="display: inline-block">
                                @csrf
                                <button type="submit" class="btn btn-success">تایید</button>
                            </form>
                            <form action="{{route('deny',['id' => $lottery->id])}}" method="post"
                                  style="display: inline-block">
                                @csrf
                                <button type="submit" class="btn btn-danger">رد</button>
                            </form>
                        </div>
                    </div>
                    
                    <div class="warning" style="display: none;direction: rtl">
                        <div style="border-radius: 20px ; background-color: #ffffff; width: 30%; height: 40%; position: fixed; top: 0; bottom: 0; left: 0; right: 0; margin: auto; z-index: 2;direction: rtl">
                            <p style="color: black; margin: 30px; padding: 20px; font-size: 20px; text-align: right;direction: rtl">
                                <strong>توضیحات :</strong><br>
                            </p>
				            <p style="text-align: right;direction: rtl;padding: 20px;">{{$lottery->description}} </p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>


    <div class="col-md-9 mt-5 intendedrace" id="done" style="display: none; position: relative;margin-top: 80px!important;margin-bottom: 50px" dir="rtl" align="center">
        <h4 style="text-align: center;" class="mt-1">
          انجام قرعه کشی ها
        </h4>
        <hr style="width:280px; border:4px double #515151;" class="rounded-circle mt-4">
        <div class="box row justify-content-center">
            @if(empty($dos[0]))
               <p>هیچ قرعه کشی وجود ندارد</p>
            @else
                @foreach($dos as $do)
                    <div class="card col-md-3 col-sm-12 ml-1 mr-1 mt-5" style="flex-direction: column; align-items: center; justify-content: space-between;
                     box-shadow: 1px 1px 12px rgba(0, 0, 0, 0.7) ;
                     background-color: #ffffff; border-radius: 10px;">
                        <img class="card-img-top rounded-circle" src="img/avatar3.png"
                             style="padding: 10px; width: 150px; height: 150px;">
                        <div class="card-body">
                            <div style="border-bottom: 1px outset #515151; text-align: center; "></div>
                            <h5 href="#" dir="rtl" align="right" class="pt-3">
                                <i class="fa fa-user-circle-o fa-fw pl-4" style="opacity: 0.7;"></i>
                                <strong>نام:</strong> {{$do->name}}
                            </h5>
                            <h5 href="#" dir="rtl" align="right" class="pt-3">
                                <i class="fa fa-home fa-fw pl-4" style="opacity: 0.7;"></i>
                                @foreach($users->where('id',$do->owner_id) as $user)
                                    <strong>سازنده:</strong> {{$user->name}}
                                @endforeach
                            </h5>
                            <h5 href="#" dir="rtl" align="right" class="pt-3">
                                <i class="fa fa-users fa-fw pl-4" style="opacity: 0.7;"></i>
                                <strong>تعداد شرکت کننده:</strong> {{$do->ucount}}
                            </h5>
                            <h5 href="#" dir="rtl" align="right" class="pt-3">
                                <i class="fa fa-child fa-fw pl-4" style="opacity: 0.7;"></i>
                                <strong>تعداد برنده:</strong> {{$do->wcount}}
                            </h5>
                            <h5 href="#" dir="rtl" align="right" class="pt-3">
                                <i class="fa fa-gift fa-fw pl-4" style="opacity: 0.7;"></i>
                                {{$do->reward}}
                            </h5>
                            <p  dir="rtl" align="right" class="pt-3">
                                <i class="fa fa-comment-o fa-fw pl-5" style="opacity: 0.7;"></i>
                                <a class="infobtn" style="color: black">توضیحات </a>
                            </p>
                            <p href="#" dir="rtl" align="right" class="pt-3">
                                <i class="fa fa-calendar fa-fw pl-4" style="opacity: 0.7;"></i>
                                {{$do->ftime}}
                            </p>
                            <form action="{{route('done',['id' => $do->id])}}" method="post"
                                  style="display: inline-block">
                                @csrf
                                <button type="submit" class="btn btn-success">انجام</button>
                            </form>
                        </div>
                    </div>
                    
                    <div class="warning" style="display: none;direction: rtl">
                        <div style="border-radius: 20px ; background-color: #ffffff; width: 30%; height: 40%; position: fixed; top: 0; bottom: 0; left: 0; right: 0; margin: auto; z-index: 2;direction: rtl">
                            <p style="color: black; margin: 30px; padding: 20px; font-size: 20px; text-align: right;direction: rtl">
                                <strong>توضیحات :</strong><br>
                            </p>
				            <p style="text-align: right;direction: rtl;padding: 20px;">{{$do->description}}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>


    <div class="col-md-9 mt-5 intendedrace" id="show" style="display: none; position: relative;margin-top: 80px!important;margin-bottom: 50px" dir="rtl" align="center">
        <h4 style="text-align: center;" class="mt-1">
            نمایش کاربران
        </h4>
        <hr style="width:280px; border:4px double #515151;" class="rounded-circle mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12 table-responsive">
                <table id="myTable" class="table table-striped" width="100%">
                    <tbody>
                    <tr>
                        <th style="text-align: center;">آیدی</th>
                        <th style="text-align: center;">نام</th>
                        <th style="text-align: center;">ایمیل</th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td dir="ltr" style="text-align: center;">{{$user->name}}</td>
                            <td style="text-align: center;">{{$user->email}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-9 mt-5 intendedrace" id="alert" style="display: none; position: relative;margin-top: 80px!important;margin-bottom: 50px" dir="rtl" align="center">
        <h4 style="text-align: center;" class="mt-1">
            اعلام قرعه کشی ها
        </h4>
        <hr style="width:280px; border:4px double #515151;" class="rounded-circle mt-4">
        <div class="box row justify-content-center">
            @if(empty($alerts[0]))
                <p>هیچ اعلامی وجود ندارد</p>
            @else
                @foreach($alerts as $alert)
                    <div class="card col-md-3 col-sm-12 ml-1 mr-1 mt-5" style="flex-direction: column; align-items: center; justify-content: space-between;
                     box-shadow: 1px 1px 12px rgba(0, 0, 0, 0.7) ;
                     background-color: #ffffff; border-radius: 10px;">
                        <img class="card-img-top rounded-circle" src="img/avatar3.png"
                             style="padding: 10px; width: 150px; height: 150px;">
                        <div class="card-body">
                            <div style="border-bottom: 1px outset #515151; width: 180px; text-align: center; "></div>
                            <h5 href="#" dir="rtl" align="right" class="pt-3">
                                <i class="fa fa-user-circle-o fa-fw pl-4" style="opacity: 0.7;"></i>
                                <strong>نام:</strong> {{$alert->name}}
                            </h5>
                            <h5 href="#" dir="rtl" align="right" class="pt-3">
                                <i class="fa fa-home fa-fw pl-4" style="opacity: 0.7;"></i>
                                @foreach($users->where('id',$alert->owner_id) as $user)
                                <strong>سازنده:</strong> {{$user->name}}
                                @endforeach
                            </h5>
                            <h5 href="#" dir="rtl" align="right" class="pt-3">
                                <i class="fa fa-users fa-fw pl-4" style="opacity: 0.7;"></i>
                                <strong>تعداد شرکت کننده:</strong> {{$alert->ucount}}
                            </h5>
                            <h5 href="#" dir="rtl" align="right" class="pt-3">
                                <i class="fa fa-child fa-fw pl-4" style="opacity: 0.7;"></i>
                                <strong>تعداد برنده:</strong> {{$alert->wcount}}
                            </h5>
                            <h5 href="#" dir="rtl" align="right" class="pt-3">
                                <i class="fa fa-gift fa-fw pl-4" style="opacity: 0.7;"></i>
                                {{$alert->reward}}
                            </h5>
                            <p href="#" dir="rtl" align="right" class="pt-3">
                                <i class="fa fa-calendar fa-fw pl-4" style="opacity: 0.7;"></i>
                                {{$alert->ftime}}
                            </p>
                            <form action="{{route('alert',['id' => $alert->id])}}" method="post"
                                  style="display: inline-block">
                                @csrf
                                <button type="submit" class="btn btn-success">اعلام</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

</div>
@endcan
<script src="{{asset('js/index.js')}}" type="text/javascript"></script>
</body>
</html>

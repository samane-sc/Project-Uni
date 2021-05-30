<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link href="img/red-white-bokeh-bg.jpg" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="jquery-3.5.1.min.js"></script>
    <style>
        @media screen and (max-width: 1080px ){
            .box {max-width: 70%; height: auto; text-align: center;}
        }
        @media screen and (max-width: 1028px){
            .leftside {display: none;}
            .rightside {display: none;}
        }

        .hovericon :hover{
            transform-style: preserve-3d;
            transform: scale(2);
            transition: all ease 0.3s;
        }
        .hover-card :hover{
            transform-style: preserve-3d;
            transform: scale(1.2);
            transition: all ease 0.3s;
        }
    </style>
    <link rel="stylesheet" href="css/persianDatepicker-default.css" />
    <script src="js/jquery.min.js" ></script>
    <script src="js/persianDatepicker.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body style="background-color: #f5f5f5;">
@if (session('alert'))
    <script>
        swal({
            title: "تبریک",
            text: "قرعه کشی شما ثبت شد و پس از تایید ادمین در سایت قرار میگیرد",
            icon: "success",
            button: "باشه",
        });

    </script>
@endif
@if (session('success'))
    <script>
        swal({
            title: "تبریک",
            text: "با موفقیت در قرعه کشی شرکت کردید",
            icon: "success",
            button: "باشه",
        });

    </script>
@endif
@if (session('deny'))
    <script>
        swal({
            title: "خطا",
            text: "صاحب قرعه کشی نمیتواند در قرعه کشی شرکت کند",
            icon: "error",
            button: "باشه",
        });

    </script>
@endif
@if (session('capacity'))
    <script>
        swal({
            title: "خطا",
            text: "متاسفانه ظرفیت قرعه کشی پر شده است",
            icon: "error",
            button: "باشه",
        });

    </script>
@endif
@if (session('already'))
    <script>
        swal({
            title: "خطا",
            text: "شما قبلا در این قرعه کشی ثبت نام کرده اید!",
            icon: "error",
            button: "باشه",
        });

    </script>
@endif
<div class="dark" style="display: none; width: 100%; height: 100%; position: fixed; top: 0; left: 0; margin: auto; background-color: rgba(0, 0, 0, 0.7); z-index: 1;"></div>
<!--navbar-->
<div class="row">
    <nav class="navbar justify-content-end bg-dark navbar-dark fixed-top">
        <ul class="nav" dir="rtl" align="right">
            <li class="nav-item  border-left pl-4">
                <a class="nav-link text-light" href="#">{{ Auth::user()->name }}</a>
            </li>
            <li class="signin nav-item border-right pr-4">
                <a class="nav-link text-light" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('خروج كاربر') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
</div>

<div style="margin-top:55px ; max-width:1500px;">
    <div class="row">
        <!--left side-->
        <div class="leftside col-md-2">
            <div class="pt-4" style="flex-direction: column; align-items: center;
                justify-content: space-between; width: 250px; box-shadow: 1px 1px 12px rgba(0, 0, 0, 0.7) ;
                background-color: #ffffff; height: 670px; text-align: center; overflow: auto;">
                <h5> قرعه کشی های جاری</h5>
                @foreach($recents as $recent)
                    <div class="ml-4 mr-4" style="border-bottom: 1px outset #515151; text-align: center;"></div>
                    <div class="mt-4 pt-3 pr-2 mb-5" style="background-color: #f5f5f5; height: 130px; width: 200px;
                    text-align: right; font-weight: bold; border-radius: 10px; margin-left: 15px;">
                        <span style="opacity: 0.5;">{{$recent->name}}</span>
                        <img class="card-img-top rounded-circle" src="img/avatar3.png"style="padding: 10px; width: 60px; height: 60px;">
                        <div class="hovercard">
                            <button class="btncard btn mt-2" 
                            style="font-size: 12px; margin-right: 50px; background-color: #4c8f8f;  cursor: pointer;">جزییات قرعه کشی
                        </div>
                    </div>
                    
                    <div class="warning" style="display: none;">
                      <div style="border-radius: 20px ; background-color: #ffffff; width: 30%; height: 40%; position: fixed; top: 0; bottom: 0; left: 0; right: 0; margin: auto; z-index: 2;">
                        <p style="color: black; font-size: 20px;">
                           <div><strong>ظرفیت: </strong>{{$recent->ucount}} </div><br>
                            <div><strong>تعداد برندگان : </strong>{{$recent->wcount}} </div><br>
                            <div><strong> جایزه: </strong>{{$recent->reward}}</div><br>
                            <div><strong>زمان قرعه کشی: </strong>{{$recent->ftime}} </div><br>
                        </p>
                        <div style="text-align: center;">
                            <a href="/link/{{$recent->id}}/{{$recent->created_at}}" style="color: #ffffff;">
                                <div class="btn" style="background-color: #4c8f8f; text-align: center; height: 40px; width: 200px; margin-right: 50px;">
                                    شرکت  در قرعه کشی   
                                </div>
                            </a>
                        </div>
                      </div>
                    </div>
                @endforeach
            </div>            
        </div>
        <!--center column-->
        <!--intended race-->
        <div class="col-md-7 mt-5 intendedrace" style="display: block; position: relative;" dir="rtl" align="center">
            <h4 style="text-align: center;" class="mt-1">
                مسابقه های شرکت کرده
            </h4>
            <hr style="width:280px; border:4px double #515151;" class="rounded-circle mt-4">
            <div class="box row justify-content-center">
                @if(empty($participates[0]))
                    <p>شما هنوز در هیچ قرعه کشی شرکت نکردید</p>
                @else
                    @foreach($participates as $participate)
                        <div class="intendedcard card col-md-3 col-sm-12 ml-3 mr-2 mt-5" style="flex-direction: column; align-items: center; justify-content: space-between;
                     box-shadow: 1px 1px 12px rgba(0, 0, 0, 0.7) ;  cursor: pointer;
                     background-color: #ffffff; border-radius: 10px; height: 340px;">
                            <img class=" card-img-top rounded-circle" src="img/avatar3.png"
                                 style="padding: 10px; width: 150px; height: 150px;">
                            <div class="card-body">
                                <div
                                    style="border-bottom: 1px outset #515151; width: 180px; text-align: center; "></div>
                                <h5 href="#" dir="rtl" align="right" class="pt-3">
                                    <i class="fa fa-user-circle-o fa-fw pl-5" style="opacity: 0.7;"></i>
                                    {{$participate->name}}
                                </h5>
                                <h5 href="#" dir="rtl" align="right" class="pt-3">
                                    <i class="fa fa-refresh fa-fw pl-5" style="opacity: 0.7;"></i>
                                    @if($participate->state == 1)
                                        در جریان
                                    @else
                                        پایان یافته
                                    @endif
                                </h5>
                                <p href="#" dir="rtl" align="right" class="pt-3">
                                    <i class="fa fa-calendar fa-fw pl-5" style="opacity: 0.7;"></i>
                                    {{$participate->ftime}}
                                </p>
                            </div>
                        </div>
                        
                        <div class="intendedwarning" style="display: none;"dir="rtl">
                            <div style="border-radius: 20px ; background-color: #ffffff; width: 30%; height: 40%; position: fixed; top: 0; bottom: 0; left: 0; right: 0; margin: auto; z-index: 2;">
                                <div style="color: black; font-size: 20px; margin-top: 50px">
                                    <div><strong>ظرفیت: </strong>{{$participate->ucount}} </div><br>
                                    <div><strong>تعداد برندگان : </strong>{{$participate->wcount}} </div><br>
                                    <div><strong> جایزه: </strong>{{$participate->reward}}</div><br>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <!--my race-->
        <div class="col-md-7 mt-5 myrace" style="display: none; position: relative;" dir="rtl" align="center">
            <h4 style="text-align: center;" class="mt-1">
                قرعه کشی های  من
            </h4>
            <hr style="width:250px; border:4px double #515151;" class="rounded-circle mt-4">
            <div class="box row justify-content-center">
                @if(empty($mylotterys[0]))
                    <p> شما هنوز هیچ قرعه کشی ایجاد نکردید</p>
                @else
                    @foreach($mylotterys as $mylottery)
                        <div class="mycard card col-md-3 col-sm-12 mr-2 ml-3 mt-5" style="flex-direction: column; align-items: center;
                    justify-content: space-between; width: 100px; box-shadow: 1px 1px 12px rgba(0, 0, 0, 0.7) ; cursor: pointer;
                    background-color: #ffffff; border-radius: 10px; height: 350px;">
                            <img class="card-img-top rounded-circle" src="img/avatar3.png"
                                 style="padding: 10px; width: 150px; height: 150px;">
                            <div class="card-body">
                                <div
                                    style="border-bottom: 1px outset #515151; width: 200px; text-align: center; "></div>
                                <h5 href="#" dir="rtl" align="right" class="pt-3">
                                    <i class="fa fa-user-circle-o fa-fw pl-5" style="opacity: 0.7;"></i>
                                    {{$mylottery->name}}
                                </h5>
                                <h5 href="#" dir="rtl" align="right" class="pt-3">
                                    <i class="fa fa-refresh fa-fw pl-5" style="opacity: 0.7;"></i>
                                    @if($mylottery->state == -1)
                                        رد شده
                                    @elseif($mylottery->state == 0)
                                        در انتظار تایید
                                    @elseif($mylottery->state == 1)
                                        تایید شده
                                    @elseif($mylottery->state == -2)
                                        پایان یافته
                                    @endif
                                </h5>
                                <p href="#" dir="rtl" align="right" class="pt-3">
                                    <i class="fa fa-calendar fa-fw pl-5" style="opacity: 0.7;"></i>
                                    {{$mylottery->ftime}}
                                </p>
                            </div>
                        </div>
                    
                        <div class="mywarning" style="display: none;"dir="rtl">
                            <div style="border-radius: 20px ; background-color: #ffffff; width: 30%; height: 40%; position: fixed; top: 0; bottom: 0; left: 0; right: 0; margin: auto; z-index: 2;">
                                <div style="color: black; font-size: 20px; margin-top: 50px">
                                    <div><strong>ظرفیت: </strong>{{$mylottery->ucount}} </div><br>
                                    <div><strong>تعداد برندگان : </strong>{{$mylottery->wcount}} </div><br>
                                    <div><strong> جایزه: </strong>{{$mylottery->reward}}</div><br>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <!--set race-->
        <div class="col-md-7 mt-5 setrace" style="display: none;" dir="rtl" align="right">
            <h4 style="text-align: center;" class="mt-1">
                تعریف قرعه کشی
            </h4>
            <hr style="width:280px; border:4px double #515151;" class="rounded-circle mt-4">
            <div class="box mt-4">
                <form method="post" action="{{route('create')}}">
                        @csrf
                        <div class="form-group row mr-5 ml-5">
                            <label for="name" class="col-md-3 col-form-label">نام قرعه کشی</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="name" id="name" placeholder="name">
                            </div>
                        </div>
                        <div class="form-group row mr-5 ml-5">
                            <label for="description" class="col-md-3 col-form-label">توضیحات</label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="description" rows="5" id="description" placeholder="description"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mr-5 ml-5">
                            <label class="col-md-3 col-form-label" for="inputError">نوع قرعه کشی</label>
                            <div class="col-md-8">
                                <input class="radio-inline ml-3 " type="radio" name="optradio" value="0">عمومی
                                <input class="radio-inline ml-3" type="radio" name="optradio" value="1">خصوصی
                            </div>
                        </div>
                        <div class="form-group row mr-5 ml-5">
                            <label class="col-md-3 col-form-label" for="ucount"> تعداد شرکت کنندگان</label>
                            <div class="col-md-8">
                                <input class="form-control" name="ucount" id="ucount" type="text" placeholder="participants' number">
                            </div>
                        </div>
                        <div class="form-group row mr-5 ml-5">
                            <label class="col-md-3 col-form-labell" for="wcount">تعداد برندگان</label>
                            <div class="col-md-8">
                                <input class="form-control" name="wcount" id="wcount" type="text" placeholder="winners">
                            </div>
                        </div>
                        <div class="form-group row mr-5 ml-5">
                            <label class="col-md-3 col-form-label" for="reward">نوع جایزه</label>
                            <div class="col-md-8">
                                <input class="form-control" name="reward" id="reward" type="text" placeholder="quality">
                            </div>
                        </div>
                        <div class="form-group row mr-5 ml-5">
                            <label class="col-md-3 col-form-label" for="time">زمان قرعه کشی</label>
                            <div class="col-md-8">
                                <input class="form-control example1" name="time" id="time" autocomplete="off" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" style="position: absolute; right: 180px; width: 400px;"><input class="form-control example1" name="mtime" id="mtime" type="hidden" dir="rtl" align="right"></label>
                        </div>
                        <button class="btn mt-2" style="font-size: 20px; border-radius: 20px; margin-right: 250px; background-color: #4c8f8f;">ثبت قرعه کشی</button>
                    </form>
            </div>
        </div>

        <!--rigth side-->
        <div class="rightside col-md-3 mt-5">
            <!---user profile-->
            <div class="card" style="flex-direction: column; align-items: center; justify-content: space-between;
                box-shadow: 1px 1px 12px rgba(0, 0, 0, 0.7) ; background-color: white; border-radius: 10px;">
                <h1 style="color: black; padding-top: 10px; font-size: 20px;"> حساب کاربری من</h1>
                <a href="#" title="ویرایش حساب کاربری">
                    <img class="card-img-top rounded-circle" src="img/avatar3.png" style="padding: 10px; width: 150px; height: 150px;">
                </a>
                <div class="card-body">
                    <div style="border-bottom: 1px outset #515151; width: 280px; text-align: center; "></div>
                    <h5 href="#" dir="rtl" align="right" class="pt-3">
                        <i class="fa fa-address-card-o fa-fw pl-5" style="opacity: 0.7;"></i>
                        {{Auth::user()->name}}
                    </h5>
                    <h5 href="#" dir="rtl" align="right" class="pt-3">
                        <i class="fa fa-telegram fa-fw pl-5" style="opacity: 0.7;"></i>
                        {{Auth::user()->email}}
                    </h5>
                </div>
            </div>
            <!--tags-->
            <div class="card" style="flex-direction: column; align-items: center; justify-content: space-between;
                 box-shadow: 1px 1px 12px rgba(0, 0, 0, 0.7) ;background-color: #4c8f8f; border-radius: 10px; margin-top: 25px;">
                <div class="btn-group-vertical" dir="rtl" align="right" style="width: 100%">
                    <button type="button" class="btn hoverbtn intended_race">
                        <i class="fa fa-circle-o-notch fa-fw mt-3 mb-3"></i> قرعه کشی های شرکت کرده
                    </button>
                    <div style="border-bottom: 2px solid #ffffff;width: 100%"></div>
                    <button type="button" class="btn hoverbtn my_race" >
                        <i class="fa fa-circle-o-notch fa-fw mt-3 mb-3"></i> قرعه کشی های من
                    </button>
                    <div style="border-bottom: 2px solid #ffffff;width: 100%;"></div>
                    <button type="button" class="btn hoverbtn set_race">
                        <i class="fa fa-circle-o-notch fa-fw mt-3 mb-3"></i> ساخت قرعه کشی
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!--footer-->
<div class="row d-sm-none d-xs-none d-md-block">
    <footer class="bg-dark" style="width: 100%; margin-top: 100px;">
        <div style="margin-left: 150px; margin-right: 150px;">
            <div class="row" style="border-bottom: 1px outset #515151; ">
                <div class="col">
                    <div style="padding-right: 50px; padding-left: 50px; padding-top: 50px; padding-bottom: 30px; font-size: 15px; text-align: center;">
                        <a class="icon text-white" href="javascript:void(0)" title="Facebook">
                            <i class="fa fa-facebook-official p-2 rounded-circle" style="background-color: #830707;"></i></a>
                        <a class="icon text-white" href="javascript:void(0)" title="Facebook">
                            <i class="fa fa-instagram p-2 rounded-circle" style="background-color: #3e0bb6;"></i></a>
                        <a class="icon text-white" href="javascript:void(0)" title="Facebook">
                            <i class="fa fa-snapchat p-2 rounded-circle" style="background-color: #07a12d;"></i></a>
                        <a class="icon text-white" href="javascript:void(0)" title="Facebook">
                            <i class="fa fa-pinterest-p p-2 rounded-circle" style="background-color: #f3e40c;"></i></a>
                        <a class="icon text-white" href="javascript:void(0)" title="Facebook">
                            <i class="fa fa-twitter p-2 rounded-circle" style="background-color: #be630e;"></i></a>
                        <a class="icon text-white" href="javascript:void(0)" title="Facebook">
                            <i class="fa fa-linkedin p-2 rounded-circle" style="background-color: #790788;"></i></a>
                    </div>
                </div>
                <div class="col" style="padding-right: 50px; padding-left: 50px; padding-top: 50px; padding-bottom: 30px; font-size: 15px; text-align: center;" >
                    <a class="text-white float-right" href="#" dir="rtl" align="right">&nbsp;&nbsp;&nbsp;&nbsp;صفحه نخست</a>
                    <a class="text-white float-right" href="#" dir="rtl" align="right">&nbsp;&nbsp;&nbsp;&nbsp;ورود</a>
                    <a class="text-white float-right" href="#" dir="rtl" align="right">&nbsp;&nbsp;&nbsp;&nbsp;قرعه کشی ها</a>
                    <a class="text-white float-right" href="#" dir="rtl" align="right">&nbsp;&nbsp;&nbsp;&nbsp;تماس با ما</a>
                </div>
            </div>

            <div class="row">
                <div class="col" style="padding-top: 20px; padding-bottom: 20px; text-align: center;" >
                    <a id="top" href="#" class="btn btn-secondary"><i class="fa fa-arrow-up"></i>To the top</a>
                </div>
                <div class="col">
                    <p style="padding-right: 50px; padding-top: 20px; padding-bottom: 20px; text-align: right;"> . تمام حقوق مادی و معنوی این سایت برای من محفوظ است </p>
                </div>
            </div>
        </div>
    </footer>
</div>

<div class="d-none d-xs-block d-sm-block d-md-non d-lg-none">
    <footer class="bg-dark" style="width: 100%;">
        <div style="padding: 50px ; font-size: 15px; text-align: center; border-bottom: 1px outset #515151;">
            <a class="text-white float-right pl-4">صفحه نخست</a>
            <a class="text-white float-right pl-4">ورود</a>
            <a class="text-white float-right pl-4">قرعه کشی ها</a>
            <a class="text-white float-right pl-4">تماس با ما</a>
        </div>
        <div>
            <p style="padding: 40px; text-align: center;"> . تمام حقوق مادی و معنوی این سایت برای من محفوظ است </p>
        </div>
    </footer>
</div>
<script src="{{asset('js/index.js')}}" type="text/javascript"></script>
<script>
    $("#time").persianDatepicker({
        cellWidth: 34,
        cellHeight: 30,
        fontSize: 13,
        onSelect: function () {
            var mtime = $("#time").attr("data-gdate");
            $("#mtime").val(mtime);
        }
    });
</script>
</body>
</html>

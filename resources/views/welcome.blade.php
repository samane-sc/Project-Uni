<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>log in</title>
    <link href= "{{asset('style.css')}}" rel="stylesheet" >
    <link href= "img/red-white-bokeh-bg.jpg" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{asset('js/index.js')}}" type="text/javascript"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <style>
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
        .hover{
            background-color: #4c8f8f;
            color: white;

        }

        @media screen and (max-width: 400px){
            .aboutus {margin-bottom: 200px; }
        }
        .price {
            color: grey;
            font-size: 28px;
        }

    </style>

</head>
<body style="background-color: #f5f5f5;" direction="rtl">
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
<div class="row">
    <nav class="navbar justify-content-end bg-dark navbar-dark fixed-top">
        <ul class="nav" dir="rtl" align="right">
            @guest
                @if (Route::has('register'))
                    <li class="nav-item  border-left pl-4">
                        <a class="nav-link text-light" href="{{route('login')}}">ورود</a>
                    </li>
                @endif
            @else
                <li class="nav-item  border-left pl-4">
                    <a class="nav-link text-light" href="{{route('login')}}">{{ Auth::user()->name }}</a>
                </li>
            @endguest
            <li class="nav-item border-left pl-4 pr-4">
                <a class="nav-link text-light" href="#lottory">قرعه کشی ها</a>
            </li>
            <li class="nav-item pl-4 pr-4">
                <a class="nav-link text-light" href="#about">درباره ما</a>
            </li>
        </ul>
    </nav>
</div>
<div class="row  justify-content-center">
    <div style="background-image: url(img/red-white-bokeh-bg.jpg); background-size: cover;
            width: 100%; height: 100vh; padding-top: 200px; background-repeat: no-repeat;">
        <p style="margin-right: 75px; color: #FFFFFF;" dir="rtl" align="right">
        قرعه کشی یک بازی شانس یا روند کم شانس است که در آن برندگان با یک قرعه کشی تصادفی انتخاب می شوند.<br><br>
        ما در این سایت روند تعریف و انجام قرعه کشی را برای شما ساده کرده تا به اسانی و بدون مشکلات ان را به اتمام برسانید.<br><br>
        به منظور تعریف یک قرعه کشی ابتدا در سایت ثبت نام کرده و سپس قرعه کشی خود را ایجاد کنید.<br><br>
        اگر تمایل دارین ما نیز در این قرعه کشی شرکت کنیم ، ان را به صورت عمومی تعریف کرده و در اختیار همگان قرار دهید.<br><br>
        اگر قرعه ی شما خصوصی است لینک فقط در اختیار خودتان قرار خواهد گرفت :)<br><br>
        </p>

    </div>
</div>
<div class="mb-5" id="lottory"></div>
<div class="container pb-3" style="text-align: center; margin-top: 40px;">
    <h3> قرعه کشی ها</h3>
    <hr style="width:400px; border:4px double #515151;" class="rounded-circle mt-4">
</div>


<div class="slider  owl-carousel">

                <li class="col" style="list-style: none">
                    <div class="card" style="flex-direction: column;align-items: center;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);max-width: 300px;margin: auto;
  text-align: center;font-family: arial;">
                        <img src="img/images.jpg" alt="Denim Jeans" style="width: 300px; height: 400px;margin-bottom: 5px">
                        <h1 style=" border-bottom: 1px double #515151;margin-bottom: 5px;margin-top: 10px;">نام قرعه کشی</h1>
                        <p class="price">جایزه</p>
                        <button class="btncard bg-dark" style="border: none; outline: 0;padding: 12px;color: white; ;text-align: center;
  cursor: pointer;width: 100%;font-size: 18px;">جزئیات قرعه کشی</button>
                    </div>
                </li>
                <li class="col" style="list-style: none">
                    <div class="card" style="flex-direction: column;align-items: center;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);max-width: 300px;margin: auto;
  text-align: center;font-family: arial;">
                        <img src="img/download.jpg" alt="Denim Jeans" style="width: 300px; height: 400px;margin-bottom: 5px">
                        <h1 style=" border-bottom: 1px double #515151;margin-bottom: 5px;margin-top: 10px;">نام قرعه کشی</h1>
                        <p class="price">جایزه</p>
                        <button class="btncard bg-dark" style="border: none; outline: 0;padding: 12px;color: white; text-align: center;
  cursor: pointer;width: 100%;font-size: 18px;">جزئیات قرعه کشی</button>
                    </div>
                </li>
                <li class="col" style="list-style: none">
                    <div class="card" style="flex-direction: column;align-items: center;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);max-width: 300px;margin: auto;
  text-align: center;font-family: arial;">
                        <img src="img/images.jpg" alt="Denim Jeans" style="width: 300px; height: 400px;margin-bottom: 5px">
                        <h1 style=" border-bottom: 1px double #515151;margin-bottom: 5px;margin-top: 10px;">نام قرعه کشی</h1>
                        <p class="price">جایزه</p>
                        <button class="btncard bg-dark" style="border: none; outline: 0;padding: 12px;color: white; text-align: center;
  cursor: pointer;width: 100%;font-size: 18px;">جزئیات قرعه کشی</button>
                    </div>
                </li>
                <li class="col" style="list-style: none">
                    <div class="card" style="flex-direction: column;align-items: center;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);max-width: 300px;margin: auto;
  text-align: center;font-family: arial;">
                        <img src="img/images.jpg" alt="Denim Jeans" style="width: 300px; height: 400px;margin-bottom: 5px">
                        <h1 style=" border-bottom: 1px double #515151;margin-bottom: 5px;margin-top: 10px;">نام قرعه کشی</h1>
                        <p class="price">جایزه</p>
                        <button class="btncard bg-dark" style="border: none; outline: 0;padding: 12px;color: white; text-align: center;
  cursor: pointer;width: 100%;font-size: 18px;">جزئیات قرعه کشی</button>
                    </div>
                </li>

    </div>


<div class="dark" style="display: none; width: 100%; height: 100%; position: fixed; top: 0; left: 0; margin: auto; background-color: rgba(0, 0, 0, 0.7); z-index: 1;"></div>
        <div class="warning" style="display: none;">
            <div style="border-radius: 20px ; background-color: #ffffff; width: 30%; height: 40%; position: fixed; top: 0; bottom: 0; left: 0; right: 0; margin: auto; z-index: 2;">
                <p style="color: black; margin: 30px; padding: 20px; font-size: 20px; text-align: right">
                <strong>:ظرفیت </strong><br>
                <strong>:تعداد برندگان </strong><br>
                <strong>:زمان قرعه کشی </strong><br>
                    <strong>:توضیحات </strong><br>
                </p>
                <div style="text-align: center;">
                    <a href="#" style="color: #ffffff;">
                        <div class="btn bg-dark" style="border: none; outline: 0;padding: 12px;color: white; text-align: center;
  cursor: pointer;width: 100%;font-size: 18px;">
                            شرکت  در قرعه کشی
                        </div>
                    </a>
                </div>
            </div>
        </div>

<div class="row" id="about" style="margin: 50px; ">
    <div class="aboutus col-md-5 col-sm-12">
        <div class="text-dark mr-4" dir="rtl" align="right">
            <h3 class="pb-4" style="border-bottom : 1px outset #515151; width: 350px;">ارتباط با ما</h3>
            <p dir="rtl" align="right"><i class="fa fa-map-marker fa-fw text-left pl-3" style="font-size: 30px;"></i> ایران، قم</p>
            <p dir="rtl" align="right"><i class="fa fa-phone fa-fw text-left pl-3" style="font-size: 30px;"></i>+9891200000</p>
            <p dir="rtl" align="right"><i class="fa fa-envelope fa-fw text-left pl-3" style="font-size: 30px;"> </i>  MAIL@mail.com</p>
        </div>
    </div>
    <div class="col-md-7 col-sm-12">
        <form action="/action_page.php">
            <div class="form-group text-dark" dir="rtl" align="right">
                <label for="email">آدرس ایمیل :</label>
                <input type="email" class="form-control" placeholder="ایمیل" id="email" dir="rtl" align="right">
            </div>
            <div class="form-group text-dark"  dir="rtl" align="right">
                <label for="cm"> کامنت  :</label><br>
                <textarea id="cm" class="form-control" name="text" rows="3" dir="rtl" align="right"></textarea>
            </div>
            <div style="text-align: right;">
                <button type="submit" class="btn btn-primary">ثبت نظر</button>
            </div>
        </form>
    </div>
</div>
<!--footer-->
<div class="row d-sm-none d-xs-none d-md-block">
    <footer class="bg-dark" style="width: 100%;">
        <div style="margin-left: 150px; margin-right: 150px;">
            <div class="row" style="border-bottom: 1px outset #515151; ">
                <div class="col-md-6">
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
                <div class="col-md-6" style="padding-right: 50px; padding-left: 50px; padding-top: 50px; padding-bottom: 30px; font-size: 15px; text-align: center;" >
                    <a class="text-white float-right" href="#" dir="rtl" align="right">&nbsp;&nbsp;&nbsp;&nbsp;صفحه نخست</a>
                    <a class="text-white float-right" href="#" dir="rtl" align="right">&nbsp;&nbsp;&nbsp;&nbsp;ورود</a>
                    <a class="text-white float-right" href="#" dir="rtl" align="right">&nbsp;&nbsp;&nbsp;&nbsp;قرعه کشی ها</a>
                    <a class="text-white float-right" href="#" dir="rtl" align="right">&nbsp;&nbsp;&nbsp;&nbsp;تماس با ما</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6" style="padding-top: 20px; padding-bottom: 20px; text-align: center;" >
                    <a id="top" href="#" class="btn btn-secondary"><i class="fa fa-arrow-up"></i>To the top</a>
                </div>
                <div class="col-md-6">
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
            <a class="text-white float-right pl-4" href="#lottory">قرعه کشی ها</a>
            <a class="text-white float-right pl-4" href="#about">تماس با ما</a>
        </div>
        <div>
            <p style="padding: 40px; text-align: center; color:white;"> . تمام حقوق مادی و معنوی این سایت برای من محفوظ است </p>
        </div>
    </footer>
</div>

<script>
        $(".slider").owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 2000, //2000ms = 2s;
        autoplayHoverPause: true,
    });
</script>
</body>
</html>

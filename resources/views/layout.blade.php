<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <style>
        .nav {
            margin-bottom:-10px;
        }

    </style>
</head>
<body>
<div class="modal fade" id="clientbookmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">@lang('home.book_title')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <form id="addform">
        <div class="modal-body">
            {{ csrf_field() }}
                <div class="form-group">
                    <label>@lang('home.book_fname')</label>
                    <input type="text" class="form-control" name="first_name" placeholder="@lang('home.enter_fname')">
                </div>
                <div class="form-group">
                    <label>@lang('home.book_lname')</label>
                    <input type="text" class="form-control" name="last_name" placeholder="@lang('home.enter_lname')">
                </div>
                <div class="form-group">
                    <label>@lang('home.book_emp')</label>
                    <input type="text" class="form-control" name="employee" placeholder="@lang('home.enter_emp')">
                </div>
                <div class="form-group">
                    <label>@lang('home.book_ser')</label>
                    <input type="text" class="form-control" name="service" placeholder="@lang('home.enter_ser')">
                </div>

        </div>

        <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('home.book_close')</button>
                <button type="submit" class="btn btn-success">@lang('home.book_save')</button>
        </div>
    </form> 
    </div>
</div>
</div>    


    <header class="class">
        <div class="container">
            <div class="header_wrapper">
                <div class="header_logo">
                    <img src="assets/img/zalonix-logo.png" width="145px" height="41px" alt="logo" class="logo-pic">
                </div>
                <nav class="nav">
                    <ul class="nav_menu">
                        <li class="nav_menu-item">
                            <a href="#!" class="nav_menu-link">@lang('home.home_menu')</a>
                        </li>
                        <li class="nav_menu-item">
                            <a href="#!" class="nav_menu-link">@lang('home.about_menu')</a>
                        </li>
                        <li class="nav_menu-item">
                            <a href="#!" class="nav_menu-link">@lang('home.service_menu')</a>
                        </li>
                        <li class="nav_menu-item">
                            <a href="#!" class="nav_menu-link">@lang('home.price_menu')</a>
                        </li>
                        <li class="nav_menu-item">
                            <a href="#!" class="nav_menu-link">@lang('home.login_menu')</a>
                        </li>
                        <li class="nav_menu-item">
                            <a href="#!" class="nav_menu-link">@lang('home.signup_menu')</a>
                        </li>
                    </ul>
                    <ul class="nav_menu">
                        <li class="nav_menu-item">
                            <a href="locale/en" class="nav_menu-link">EN</a>
                        </li>
                        <li class="nav_menu-item">
                            <a href="locale/ru" class="nav_menu-link">RU</a>
                        </li>
                    </ul>
                </nav>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#clientbookmodal">@lang('home.book_button')</button>
            </div>
        </div>
    </header>

    <main class="main">
        <section class="intro">
            <div class="intro_wrapper">
                <h2 class="intro_subtitle">
                    @lang('home.subtitle')
                </h2>
                <h1 class="intro_title">
                    @lang('home.title')
                </h1>
                <p class="intro_text">
                    @lang('home.paragraph')
                </p>
                <a href="#!" class="intro-btn">@lang('home.start_button')</a>
            </div>

        </section>
    </main>

<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>    

<script type="text/javascript">
    $(document).ready(function () {

        $('#addform').on('submit', function(e){
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "/myproj/public/clientbook",
                data: $('#addform').serialize(),
                success: function (response) {
                    console.log(response) 
                    $('#clientbookmodal').modal('hide')
                    alert("@lang('home.alert_save')");
                },
                error: function(error){
                    console.log(error)
                    alert("@lang('home.alert_nsave')");
                }

            });
        });
    });
</script>
<div class="d-flex vw-100 vh-100 justify-content-center align-items-center">
    <form method="POST" enctype="multipart/form-data" action="{{route('fileupload.store')}}">
        @csrf    
            <div class="form-group">
                <label for="exampleFormControlFile1">Example file input</label>
                <input type="file" class="form-control-file" name="uploadedfile" id="exampleFormControlFile1">
            </div>
            <div class="form-group"><button class="btn btn-success">Upload the file</button></div>
    </form>
</div>  

<canvas id="barchart" style="width:100px"></canvas>
<script type="text/javascript">
    var ctx = document.getElementById("barchart");
    var barchart = new Chart(ctx, {
        type: 'bar',
            data: {
                labels: ["Employees", "Hairdressers", "Manicurist", "Makeup artists", "Cosmetologists"],
                datasets: [
                    { label: 'Zalonix Beauty Salon',
                    data: [40,50,80,90,100],
                    backgroundColor: ['rgba(255,129,102,1)',
                    'rgba(234,162,235,1)',
                    'rgba(255,206,36,1)',
                    'rgba(75,192,192,1)',
                    'rgba(153,102,255,1)',
                    ],
                  }
                ]
            },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }    
    });
</script>


<canvas id="piechart" width="300" height="100"></canvas>
<script type="text/javascript">
    var ctx2 = document.getElementById("piechart");
    var piechart = new Chart(ctx2, {
        type: 'pie',
            data: {
                labels: ["Special offers", "Discounts", "Feedbacks"],
                datasets: [
                    { label: 'Zalonix services',
                    data: [20,50,80],
                    backgroundColor: ['rgba(255,129,102,1)',
                    'rgba(234,162,235,1)',
                    'rgba(255,206,36,1)',
                    ],
                  }
                ]
            },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }    
    });
</script>

<canvas id="linechart" width="300" height="100"></canvas>
<script type="text/javascript">
    var ctx3 = document.getElementById("linechart");
    var linechart = new Chart(ctx3, {
        "type": "line",
            "data": {
                "labels": ["2015", "2016", "2017", "2018", "2019", "2020", "2021"],
                "datasets": [{"label": "Zalonix rating","data": [20,50,80,30,60,40,90],
                    "fill":false,"borderColor":"rgb(75,192,192)", "linetension":0.1}]},
                "options":{}    
    });
</script>


</body>
</html>
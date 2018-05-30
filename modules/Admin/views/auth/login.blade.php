
<!DOCTYPE html>
<html lang="en">
  <meta charset="utf-8" />
        <title>Dashboard Login</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="author" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,800" rel="stylesheet">
        <link href="{{ URL::asset('assets/ven/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />


        <link href="{{ URL::asset('assets/ven/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/ven/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ URL::asset('assets/ven/css/login.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/ven/css/login.css')}}" rel="stylesheet" type="text/css" />
        </head>


    <body class="login">
       <div class="backRight">
        <div class="RectangleRight">
            <a href="#">
                <img src="{{ URL::asset('assets/ven/img/logo.png')}}">
            </a>
        </div>
        <div class="vendimation">
            <div class="text">Powered by ProgrammerLAB</div>
            <div class="logov">
                <a href="#">
                 
            </a>
            </div>
        </div>
        <div class="middleDivider">
            <ul>
                <li class="active"></li>
                <li></li>
                <li class="last"></li>
            </ul>
        </div>
       </div>    

        {!! Form::model($user, ['url' => ['admin/login'],'class'=>'form-horizontal login-form','files' => true]) !!}
           @include('packages::auth.form')
        {!! Form::close() !!}     

        <script src="{{ URL::asset('assets/js/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{ URL::asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
    </body>
</html>




<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta id="csrf_token" name="csrf_token" content="{{ csrf_token() }}">

        <script src="/js/template/assets/plugins/jquery/jquery.min.js"></script>

        <script type="text/javascript" src="/js/Script.js"></script>

        <link rel="stylesheet" type="text/css" href="/css/login.css">

        <script type="text/javascript" src="/js/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/js/sweetalert/dist/sweetalert.css">

        <title>Uplexis - PHP Test</title>

        <script type="text/javascript" src="/js/login.js"></script>
    </head>
    <body>
    <div class='login'>
        <div class='login_title'>
            <span>Login to your account</span>
        </div>
        <form name="login">
            <div class='login_fields'>
                <div class='login_fields__user'>
                    <div class='icon'>
                        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/user_icon_copy.png'>
                    </div>
                    <input placeholder='Username' type='text'>
                    <div class='validation'>
                        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/tick.png'>
                    </div>
                    {{--</input>--}}
                </div>
                <div class='login_fields__password'>
                    <div class='icon'>
                        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/lock_icon_copy.png'>
                    </div>
                    <input placeholder='Password' type='password'>
                    <div class='validation'>
                        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/tick.png'>
                    </div>
                </div>
                <div class='login_fields__submit'>
                    <input id="loginButton" type='submit' value='Log In'>
                    <div class='forgot'>
                        <a href='#'>Forgotten password?</a>
                    </div>
                </div>
            </div>
        </form>
        <div class='success'>
            <h2>Authentication Success</h2>
            <p>Welcome back</p>
        </div>
        <div class='disclaimer'>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce semper laoreet placerat. Nullam semper auctor justo, rutrum posuere odio vulputate nec.</p>
        </div>
    </div>
    <div class='authent'>
        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/puff.svg'>
        <p>Authenticating...</p>
    </div>
    {{--<div class='love'>--}}
        {{--<p>Made with <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/love_copy.png" /> by <a href='https://www.jamiecoulter.co.uk' target='_blank'> Jcoulterdesign </a></p>--}}
    {{--</div>--}}

    </body>
</html>

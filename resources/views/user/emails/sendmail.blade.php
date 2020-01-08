<!DOCTYPE html>
<html>
<head>
    <title>Ubidaid</title>
    <style type="text/css">
        .email-template{

            width: 50%;
            margin: auto;
            border: 1px solid #ddd;
            padding: 60px;
        }


        .email-template a{

            border-radius: 4px;
            font-size: 15px;
            color: white;
            text-decoration: none;
            padding: 14px 7px 14px 7px;
            width: 210px;
            max-width: 210px;
            font-family: "Open Sans","Helvetica Neue",Arial;
            margin: 0;
            display: block;
            background-color: #007ee6;
            text-align: center;
        }

        .email-template p{

            color: #404040;
            font-size: 20px;
        }
    </style>
</head>
<body>


<div class="email-template">
    <img class="img-responsive" src="{{ asset('public/frontend/images/logo/logo.png')}}" height="28px">

    <p>Hi ,{{ $user['username'] }}</p>

    <p>Someone recently requested a password change for your Ubidaid account. If this was you, you can set a new password here:</p>

    <a href="{{ route('user.password.reset',$user['id']) }}">Reset password</a>

    <p>If you don't want to change your password or didn't request this, just ignore and delete this message.</p>

    <p>Thank you</p>
</div>


</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="route" content="{{ url('/') }}">

	<title>Seller Mail</title>

	<!-- css here -->
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />

	<!-- jquery here -->
	<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
	<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>



	<style type="text/css">
	.login-form {
		width: 35%;
    	margin: 10% auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {
        font-size: 15px;
        font-weight: bold;
    }
    label.error {
        color: red;
    }
	</style>
</head>
<body>

<div style="text-align: center;">
<p>Hello,</p>
<p>Please find buyer details below : </p>
<p>Buyer Name : <?php echo $mailData['buyer_name'] ?></p>
<p>Buyer Email : <?php echo $mailData['buyer_email'] ?></p>
<p>Buyer Message : <?php echo $mailData['mssg'] ?></p>

</div>

</body>
</html>

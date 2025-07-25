<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{website_name}}</title>
    <meta name="description" content="{{website_name}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">


    <style>
        ._failed{ border-bottom: solid 4px red !important; }
._failed i{  color:red !important;  }

._success {
    box-shadow: 0 15px 25px #00000019;
    padding: 45px;
    width: 100%;
    text-align: center;
    margin: 40px auto;
    border-bottom: solid 4px #28a745;
}

._success i {
    font-size: 55px;
    color: #28a745;
}

._success h2 {
    margin-bottom: 12px;
    font-size: 40px;
    font-weight: 500;
    line-height: 1.2;
    margin-top: 10px;
}

._success p {
    margin-bottom: 0px;
    font-size: 18px;
    color: #495057;
    font-weight: 500;
}
    </style>


</head>

<body>
    <div class="container">   
        <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="message-box _success _failed">
                         <i class="fa fa-check-circle" aria-hidden="true"></i>
                        <h2> Your payment success </h2>
                 <a href="<?=base_url('user/dashboard') ?>">Dashboard </a>              
                </div> 
            </div> 
        </div>
    </div> 
</body>

</html>
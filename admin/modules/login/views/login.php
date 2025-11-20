<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MPR Computers<?= date("D d M Y") ?></title>

  <link href="<?= base_url() ?>assets/admin/css/main.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="<?= base_url() ?>assets/images/logo/favicon.png" />

  <style>
    body {
      font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
      margin: 0;
    }

    #hoeapp-wrapper {
      background: #fff;
      padding: 30px 25px;
      border-radius: 8px;
      margin: 50px auto;
      height:80%;
      max-width:450px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    h2 {
      font-size: 24px;
      font-weight: 600;
      color: #333;
      margin-top: 0;
      margin-bottom: 25px;
    }

    .form-control {
      height: 40px;
      font-size: 14px;
      border-radius: 4px;
    }

    .btn-primary {
      font-size: 15px;
      padding: 10px 0;
    }

    @media (max-width: 480px) {
      #hoeapp-wrapper {
        margin-top: 20px;
        padding: 25px 15px;
        max-width: 80%;
      }
    }
  </style>


</head>

<body style="height:100dvh; background: linear-gradient(135deg,#4a6cf7,#7b6be5);">
  <div id="hoeapp-wrapper" class="container" style="margin-top:40px;">
    <h2 class="text-center">Welcome Administrator</h2>

    <div class="text-center" style="margin:20px 0;">
      <img src="<?= base_url("assets/images/logo/logo.png") ?>" alt="logo" style="width:150px;">
    </div>

    <form class="form-horizontal" action="<?= site_url('login/check'); ?>" method="post">
      <?php
      $error = validation_errors();
      if (isset($msg))
        echo '<div class="alert alert-danger">' . $msg . '</div>';
      else if (!$error)
        echo '<div class="alert alert-info">Please login with your Username and Password.</div>';
      else
        echo '<div class="alert alert-warning">' . $error . '</div>';
      ?>

      <div class="form-group">
        <label for="username" class="col-sm-3 control-label">Username</label>
        <div class="col-sm-9">
          <input class="form-control" name="user" id="username" value="<?= set_value('username'); ?>" placeholder="Username" autofocus>
        </div>
      </div>

      <div class="form-group" style="margin-top:2rem;">
        <label for="password" class="col-sm-3 control-label">Password</label>
        <div class="col-sm-9">
          <input class="form-control" name="pass" id="password" type="password" placeholder="Password">
        </div>
      </div>

      <div class="form-group" style="margin-top:5rem;">
        <div class="col-sm-12">
          <button type="submit" class="btn btn-primary btn-block" onclick="setvalue()" id="myButton">Login</button>
        </div>
      </div>
    </form>
  </div>

  <script>
    function setvalue() {
      document.getElementById('myButton').innerText = 'Verifying...';
    }
  </script>
</body>



</html>
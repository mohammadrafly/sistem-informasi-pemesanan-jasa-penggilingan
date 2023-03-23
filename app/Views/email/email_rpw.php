<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h2 class="text-center">Reset Your Password</h2>
        <p class="text-center">Hello, <?= $nama ?></p>
        <p class="text-center">We received a request to reset the password for your account.</p>
        <p class="text-center">If you did not make this request, please ignore this email.</p>
        <hr>
        <p class="text-center">To reset your password, please click the button below:</p>
        <p class="text-center">
          <a href="<?= base_url('reset-password/v1/'.$email.'/'.$token) ?>" class="btn btn-primary">Reset Password</a>
        </p>
        <hr>
        <p class="text-center">If you're having trouble clicking the "Reset Password" button, copy and paste the following URL into your web browser:</p>
        <p class="text-center"><a href="<?= base_url('reset-password/v1/'.$email.'/'.$token)  ?>"><?= base_url('reset-password/v1/'.$email.'/'.$token)  ?></a></p>
        <p class="text-center">Thank you for using our service!</p>
      </div>
    </div>
  </div>
</body>
</html>

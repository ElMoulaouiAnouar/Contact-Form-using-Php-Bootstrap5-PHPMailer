<?php 
   require './helpers/Send.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo APP_NAME ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-11 col-sm-9 col-md-6 mx-auto">
                <div class="card mt-3">
                    <div class="card-header">
                        <div class="card-title text-center">
                            Contact Us
                        </div>
                    </div>
                    <?php require 'includes/alert.php'; ?>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="m-3 mt-1">
                            <div class="input-group">
                                <div class="input-group-text"><i class="fa fa-user"></i></div>
                                <input class="form-control" type="text" name="name" id="" placeholder="Name" value="<?php echo $data['name'] ?? '' ?>">
                            </div>
                            <div class="m-1 text-danger"><?php isset($validation) ? $validation->DisplayError('name') : '' ?></div>
                        </div>
                        <div class="m-3">
                            <div class="input-group">
                                <div class="input-group-text"><i class="fa fa-user"></i></div>
                                <input class="form-control" type="email" name="email" id="" placeholder="Email" value="<?php echo $data['email'] ?? '' ?>">
                            </div>
                            <div class="m-1 text-danger"><?php isset($validation) ? $validation->DisplayError('email') : '' ?></div>
                        </div>
                        <div class="m-3">
                                <textarea name="subject" id="" class="form-control" rows="7" placeholder="Subject"><?php echo $data['subject'] ?? '' ?></textarea>
                                <div class="m-1 text-danger"><?php isset($validation) ? $validation->DisplayError('subject') : '' ?></div>
                            </div>

                        <div class="m-3">
                            <input type="file" name="file" class="form-control">
                            <div class="m-1 text-danger"><?php isset($validation) ? $validation->DisplayError('file') : '' ?></div>
                        </div>
                        <div class="m-3">
                            <button type="submit" name="btn_send" class="form-control btn btn-outline-primary"><i class="fa fa-send"></i> Send</button>
                        </div>
                    </form>
                </div>
             </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
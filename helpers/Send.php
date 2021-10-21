<?php 
require './autoload.php';
$data = isset(validation::$data) ? validation::$data : [];
if(isset($_POST['btn_send'])){
    $validation = new validation();
    $data = [
        'name' => Filter::Filter_input($_POST['name']),
        'email' => Filter::Filter_input($_POST['email']),
        'subject' => Filter::Filter_input($_POST['subject'])
    ];
    if(!empty($_FILES['file']['name'])){
        $data['file'] = $_FILES['file']['name'];
        $validation->Validate($data,[
            'name' => 'require|chaine',
            'email' => 'require|email',
            'subject' => 'require|subject',
            'file' => 'require|file'
        ]);
    }
    else{
        $validation->Validate($data,[
            'name' => 'require|chaine',
            'email' => 'require|email',
            'subject' => 'require|subject'
        ]);
    }

    
    if($validation->ErrorCount() == 0){
        $mail = new mail();
        if(!empty($_FILES['file']['name'])){
            $file_name = 'uploads/'.$_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'],$file_name);
            $mail->Send($data['name'],$data['email'],$data['subject'],$file_name);
        }
        else{
            $mail->Send($data['name'],$data['email'],$data['subject']);
        }
        header('location: '._BASE_URL);
    }
}
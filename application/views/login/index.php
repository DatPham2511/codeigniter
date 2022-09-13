
    <style type="text/css">
    /* sign in FORM */
    #logreg-forms {
        width: 412px;
        margin: 10vh auto;
        background-color: #f3f3f3;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
    }

    #logreg-forms form {
        width: 100%;
        max-width: 410px;
        padding: 15px;
        margin: auto;
    }

    #logreg-forms .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
    }

    #logreg-forms .form-control:focus {
        z-index: 2;
    }

    #logreg-forms .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    #logreg-forms .form-signin input[type="password"] {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        margin-top:10px
    }


    #logreg-forms a {
        display: block;
        padding-top: 10px;
        color: lightseagreen;
    }


    #logreg-forms button[type="submit"] {
        margin-top: 19px;
    }


    

</style>

<body>
<?php 
    if($this->session->flashdata('error')){  
      ?>
      <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
    <?php 
     }
    ?>
    <div id="logreg-forms">

        <form autocomplete="off" class="form-signin" method="POST" action="<?php echo base_url('login-user')?>">
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">Đăng nhập</h1>
            <input autocomplete="off" type="text" id="inputEmail" name="email" class="form-control" placeholder="Email" required="" autofocus="">
            
            <input autocomplete="off" type="password" id="inputPassword" name="password" class="form-control" placeholder="Mật khẩu" required="">
           
            <button class="btn btn-success btn-block" type="submit"> <i class="fas fa-sign-in-alt"></i> Đăng nhập</button>
            <hr>
        </form>
        <br>

    </div>
 <div class="vc_empty_space" id="vc_empty_space"><span class="vc_empty_space_inner"></span></div>
    <div class="widget-text-heading  heading-style4 text-left">
        <div class="subtitle">
            login
        </div>

    </div>
    <form action="#" method="post" id="login">
   <div id="login_error" class="login_error"> <?php if ($this->session->flashdata('error')) { ?>
        <div class="alert alert-danger" > <?= $this->session->flashdata('error') ?> </div>
    <?php } ?></div>
        <div class="imgcontainer">
            <img class="log_banner" src="./images/beer.png">
        </div>

        <div class="container">
            <label for="uname"><b>Email</b></label>
            <input type="text" placeholder="Enter Your Email " name="email" required="">

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required="">

            <button type="submit" class="btns" name="login">Login</button>
            <button type="button" class="cancelbtn btns" onclick="location.href = '<?php echo base_url('home');?>';">Cancel</button>

            <label class="psw  label ">Forgot <a href="">Password ?</a></label>
            <br>

        </div>

    </form>
 
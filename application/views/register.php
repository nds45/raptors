<style type="text/css">
    .reg_banner {
    width: 50%;
    top: 30%;
    position: absolute;
     right: unset; 
    float: right;
}
</style>
<div class="vc_empty_space" id="register"><span class="vc_empty_space_inner"></span></div>
    <div class="widget-text-heading  heading-style4 text-left">
        <div class="subtitle">
            Register
        </div>

    </div>
    <form  method="post" id="registers">
        <div class="imgcontainer">
            <img class="reg_banner" src="./images/q.png">
        </div>
<?php if ($this->session->flashdata('up_msg')) { ?>
        <div class="alert alert-danger" > <?= $this->session->flashdata('up_msg') ?> </div>
    <?php } ?>

        <div class="container">

            <label for="uname"><b>Name</b></label>
            <input type="text" placeholder="Enter Your Name" name="name" required>

            <label for="uname"><b>Email</b></label>
            <input type="text" placeholder="Enter Your Email" name="email" required>

            <label for="uname"><b>address</b></label>
           
            <textarea placeholder="Enter Your Address" name="address" required></textarea>
            <label for="uname"><b>Contact No.</b></label>
            <input type="text" placeholder="Enter Your Contact No." name="mobile" required>

            <label for="birthday">Birthday:</label><br>
            <input type="date" id="birthday" name="dob" required >
            
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <button type="submit" class="btns" name="submit">Sign up</button>
            <!-- <button type="submit">Login</button> -->
            <button type="button" class="cancelbtn btns" onclick="location.href = '<?php echo base_url('home');?>';">Cancel</button>

        </div>
    </form>
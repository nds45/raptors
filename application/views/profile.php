



<style type="text/css">
	.about-text a{background: unset;}
</style>

 
    <div class="container">
        <div class="row">
        
            <div class="col-lg-6 col-md-6">
       
             
                <div class="about-text">
                    <div class="widget-text-heading  heading-style4 text-left">
        <div class="subtitle">
          Profile Detail
        </div>

    </div>
                    <div>
                             <?php if ($this->session->flashdata('up_msg')) { ?>
        <div class="alert alert-danger" > <?= $this->session->flashdata('up_msg') ?> </div>
    <?php } ?>
    <?php

						foreach($res as $k=>$v) {?>
                    

                               <form  method="post" id="registers">
                                  <div class="imgcontainer">
                                        <img class="reg_banner" src="./images/q.png">
                    </div>

                  <div class="container">

                  <label for="uname"><b>Name</b></label>
                  <input type="text" value="<?php echo $v['name']; ?>" name="name" readonly>

                  <label for="uname"><b>Email</b></label>
                  <input type="text"  value="<?php echo $v['email']; ?>"name="email" readonly> 
                 

                  <label for="uname"><b>address</b></label>
                   <textarea readonly><?php echo $v['address']; ?></textarea>

                  <label for="uname"><b>Contact No.</b></label>
                  <input type="text"  value="<?php echo $v['mobile']; ?>" name="mobile" readonly>

                  <label for="birthday">Birthday:</label><br>
                  <input type="date" value="<?php echo $v['dob']; ?>" id="birthday" name="dob" readonly >
                  
                  <label for="psw"><b>Password</b></label>
                  <input type="text"  value="<?php echo $v['password']; ?>" name="password" readonly>

                <a href="<?php echo base_url('register/edit/').$v['id'];?>" class="btns">Edit</a>

              </div>
          </form>
                           <?php } ?>
                           <a href="<?php echo base_url('login/logout');?>"><button type="submit" name="submit" class="btns">Log out</button></a>
                    </div>
                 
                </div>
            </div>
            
        </div>
        <!-- row -->
    </div>

<html>
    <body>
    <?php include "header.php";?>
    <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Contact</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form  action="contact_send.php" method ="POST" autocomplete="off">
                  
                  <?php
            if(isset($_SESSION['send']))
            {
                ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $_SESSION['send'];?>
                </div>
                <?php
                unset($_SESSION['send']);
            }
            ?>
             <?php
            if(isset($_SESSION['error']))
            {
                ?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $_SESSION['error'];?>
                </div>
                <?php
                unset($_SESSION['error']);
            }
            ?>
                  <div class="form-group">
                          <label>Name</label>
                          <input type="text" name="name" class="form-control" placeholder="Name" required>
                      </div>
                      
                      <div class="form-group">
                          <label>Phone</label>
                          <input type="number" name="phone" class="form-control" placeholder="Phone" required>
                      </div>
                      <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control" placeholder="Email" required>
                      </div>
                          <div class="form-group">
                          <label>Subject</label>
                          <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                      </div>
                      <div class="form-group">
                          <label>Message</label>
                          <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" required></textarea>

                      </div>

                    
                      <input type="submit"  name="save" class="btn btn-primary" value="Send" required />
                  </form>
                   <!-- Form End-->
                   
               </div>
           </div>
       </div>
   </div>
    </body>
    <?php include "footer.php";?>
</html>
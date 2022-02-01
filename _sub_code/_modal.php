<?php

    echo 
    // login modal
    '
    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="loginModalLabel">Login Our Web</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
           <!-- login form -->
            <div class="container">
                
            <form action="./_sub_code/_login_post.php" method="POST">

              <div class="mb-3 setwidth">
                <label for="exampleInputEmail1" class="form-label" style="font-weight: 700;">User Name / Email address</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user_email">
                <div id="emailHelp" class="form-text">We\'ll never share your email with anyone else.</div>
              </div>
              <div class="mb-3 setwidth">
                <label for="exampleInputPassword1" class="form-label" style="font-weight: 700;">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="loginPass">
              </div>
              <div class="setwidth">
                <button type="submit" class="btn btn-primary" style="align-items:center;">Submit</button>
              </div>
          </form>
            </div>
         
          </div>
        <!--
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div> 
        -->  
        </div>
      </div>
    </div>';
    
    // signup modal
    echo '
    <!-- Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="signupModalLabel">Create An Account On Our Web</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <!-- Sign up form -->
        
      <div class="container">
             
      <form class="row g-3" action="./index.php" method="POST">
  

      <div class="col-md-6">
        <label for="inputEmail4" class="form-label">User Name</label>
        <input type="text" class="form-control" id="inputEmail4" maxlength="50" name="username" required>
      </div>
      <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Email Id</label>
        <input type="email" class="form-control" id="inputEmail4" maxlength="60" name="emailid" required>
        <div id="emailHelp" class="form-text">We\'ll never share your email with anyone else.</div>
      </div>
      <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Password</label>
        <input type="text" class="form-control" id="inputPassword4" maxlength="270" name="pass" required>
      </div>
      <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="inputEmail4" name="confpass">
      </div>
      <div class="col-12">
        <label for="inputAddress2" class="form-label">Address</label>
        <input type="text" class="form-control" id="inputAddress2" maxlength="500" placeholder="Apartment, studio, or floor" name="address" required>
      </div>
      <div class="col-md-6">
        <label for="inputCity" class="form-label">City</label>
        <input type="text" class="form-control" id="inputCity" maxlength="20" name="city">
      </div>
      <div class="col-md-4">
        <label for="inputState" class="form-label">State</label>
        <select id="inputState" class="form-select" maxlength="20" name="state">
          <option selected>Choose...</option>
          <option value="Andhra Pradesh">Andhra Pradesh</option>
          <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
          <option value="Arunachal Pradesh">Arunachal Pradesh</option>
          <option value="Assam">Assam</option>
          <option value="Bihar">Bihar</option>
          <option value="Chandigarh">Chandigarh</option>
          <option value="Chhattisgarh">Chhattisgarh</option>
          <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
          <option value="Daman and Diu">Daman and Diu</option>
          <option value="Delhi">Delhi</option>
          <option value="Lakshadweep">Lakshadweep</option>
          <option value="Puducherry">Puducherry</option>
          <option value="Goa">Goa</option>
          <option value="Gujarat">Gujarat</option>
          <option value="Haryana">Haryana</option>
          <option value="Himachal Pradesh">Himachal Pradesh</option>
          <option value="Jammu and Kashmir">Jammu and Kashmir</option>
          <option value="Jharkhand">Jharkhand</option>
          <option value="Karnataka">Karnataka</option>
          <option value="Kerala">Kerala</option>
          <option value="Madhya Pradesh">Madhya Pradesh</option>
          <option value="Maharashtra">Maharashtra</option>
          <option value="Manipur">Manipur</option>
          <option value="Meghalaya">Meghalaya</option>
          <option value="Mizoram">Mizoram</option>
          <option value="Nagaland">Nagaland</option>
          <option value="Odisha">Odisha</option>
          <option value="Punjab">Punjab</option>
          <option value="Rajasthan">Rajasthan</option>
          <option value="Sikkim">Sikkim</option>
          <option value="Tamil Nadu">Tamil Nadu</option>
          <option value="Telangana">Telangana</option>
          <option value="Tripura">Tripura</option>
          <option value="Uttar Pradesh">Uttar Pradesh</option>
          <option value="Uttarakhand">Uttarakhand</option>
          <option value="West Bengal">West Bengal</option>
        </select>
      </div>
      <div class="col-md-2">
        <label for="inputZip" class="form-label">Zip</label>
        <input type="text" class="form-control" id="inputZip" maxlength="7" minlength="6" name="zip">
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Sign in</button>
        <button type="reset" class="btn btn-danger mx-4">Reset</button>
      </div>
    </form>

          </div>
       
        </div>
      
        <!--
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div> 
        -->  
      
      
      
        </div>
      </div>
    </div>';

    
?>
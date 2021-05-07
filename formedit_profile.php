<!-- Your Account Personal Information -->

<div class="container">
  <div class="row">
    <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12" style="
    padding-left: 15px;
    padding-right: 30px;
">
      <div class="ui-block">
        <div class="ui-block-title">
          <h6 class="title">Personal Information</h6>
        </div>
        <div class="ui-block-content"> 
          
          <!-- Personal Information Form  -->
          
          <form action="reg.php" method="post">
            <div class="row">
              <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="form-group label-floating">
                  <label class="control-label">First Name</label>
                  <input class="form-control form-control-lg" placeholder="" type="text" name="fname" value="<?php echo $name[0]; ?>">
                </div>
                <div class="form-group label-floating">
                  <label class="control-label">Your Email</label>
                  <input class="form-control form-control-lg" placeholder="" type="email" name="email" value="<?php echo $urow['email']; ?>">
                </div>

                <div class="form-group date-time-picker label-floating">
                  <label class="control-label">Your Birthday</label>
                  <input type="date" name="datetimepicker form-control form-control-lg" name="doba">
                   </div>
              </div>

              <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="form-group label-floating">
                  <label class="control-label">Last Name</label>
                  <input class="form-control form-control-lg" placeholder="" type="text" name="lname" value="<?php echo $name[1]; ?>">
                </div>
                
                <div class="form-group label-floating is-empty">
                  <label class="control-label">Your Phone Number</label>
                  <input class="form-control form-control-lg" placeholder="" type="text" name="phone" value="<?php echo $urow['phone']; ?>">
                </div>
              </div>
              <div class="col col-lg-4 col-md-4 col-sm-12 col-12">
               <div class="form-group label-floating">
                  <label class="control-label">Your Your Country</label>
                  <input type="text" class="form-control form-control-lg" name="country" value="<?php echo $urow['country']; ?>">
                </div>
              </div>
              <div class="col col-lg-4 col-md-4 col-sm-12 col-12">
               <div class="form-group label-floating">
                  <label class="control-label">Your State</label>
                  <input type="text" class="form-control form-control-lg" name="state" value="<?php echo $urow['state']; ?>">
                </div>
              </div>
              <div class="col col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="form-group label-floating">
                  <label class="control-label">Your City</label>
                  <input type="text" class="form-control form-control-lg" name="city" value="<?php echo $urow['city']; ?>">
                </div>
              </div>
              <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="form-group label-floating"><label class="control-label">Bio</label>
                  <textarea class="form-control" placeholder="Write a little description about you" name="bio" value="<?php echo $urow['bio']; ?>"><?php echo $urow['bio']; ?></textarea>
                </div>
                <div class="form-group label-floating is-select">
                  <label class="control-label">Your Gender</label>
                  <select class="selectpicker form-control form-control-lg" name="gender">
					  
                    <option value="Male" <?php if($urow['gender']=="Male") { echo "selected"; }?>>Male</option>
                    <option value="Female" <?php if($urow['gender']=="Female") { echo "selected"; }?>>Female</option>
                  </select>
                </div>
                
              </div>
              <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="form-group label-floating is-empty">
                  <label class="control-label">Branch</label>
                  <input class="form-control form-control-lg" placeholder="" type="text" name="branch" value="<?php echo $urow['branch']; ?>">
                </div>
                
                <div class="form-group label-floating is-select">
                  <label class="control-label">Year</label>
                  <select class="selectpicker form-control form-control-lg" name="year" value="<?php echo $urow['year']; ?>" >
                    <option value="I Year" <?php if($urow['year']=="I Year") { echo "selected"; }?>>I Year</option>
                    <option value="II Year" <?php if($urow['year']=="II Year") { echo "selected"; }?>>II Year</option>
					  <option value="III Year" <?php if($urow['year']=="III Year") { echo "selected"; }?>>III Year</option>
                  </select>
                </div>
                <?php 
				  if($urow['year']=="I Year")
				  {
					  echo "selected";
				  }
				  ?>
              </div>
				<hr><br>

              <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group with-icon label-floating">
                  <label class="control-label">Your Facebook Account</label>
                  <input class="form-control form-control-lg" type="text" name="facebook" value="<?php echo $urow['facebook']; ?>">
                  <i class="fab fa-facebook-f c-facebook" aria-hidden="true"></i> </div>
                <div class="form-group with-icon label-floating">
                  <label class="control-label">Your Twitter Account</label>
                  <input class="form-control form-control-lg" type="text" name="twitter" value="<?php echo $urow['twitter']; ?>">
                  <i class="fab fa-twitter c-twitter" aria-hidden="true"></i> </div>
                
                <div class="form-group with-icon label-floating">
                  <label class="control-label">Your Instagram Account</label>
                  <input class="form-control form-control-lg" type="text" name="instagram" value="<?php echo $urow['instagram']; ?>">
                  <i class="fab fa-instagram c-dribbble" aria-hidden="true"></i> </div>
                
              </div>
              <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                <button class="btn btn-secondary btn-lg full-width" type="reset">Restore all Attributes</button>
              </div>
              <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                <button class="btn btn-primary btn-lg full-width" type="submit" name="update">Save all Changes</button>
              </div>
            </div>
          </form>
          
          <!-- ... end Personal Information Form  --> 
        </div>
      </div>
    </div>
   
<div class="col col-xl-3 order-xl-1 col-lg-3 order-lg-1 col-md-12 order-md-2 col-sm-12 col-12 responsive-display-none" style="padding-left: 0px;padding-right: 30px;">
			<div class="ui-block">

				<!-- Your Profile  -->
				
				<div class="your-profile">
					<div class="ui-block-title ui-block-title-small">
						<h6 class="title">Your PROFILE</h6>
					</div>
				
					<div id="accordion" role="tablist" aria-multiselectable="true">
						<div class="card">
							<div class="card-header" role="tab" id="headingOne">
								<h6 class="mb-0">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
										Profile Settings
										<svg class="olymp-dropdown-arrow-icon"><use xlink:href="#olymp-dropdown-arrow-icon"></use></svg>
									</a>
								</h6>
							</div>
				
							<div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" style="">
								<ul class="your-profile-menu">
									<li>
										<a href="28-YourAccount-PersonalInformation.html">Personal Information</a>
									</li>
									<li>
										<a href="30-YourAccount-ChangePassword.html">Change Password</a>
									</li>									
								</ul>
							</div>
						</div>
					</div>								
				</div>
				
				<!-- ... end Your Profile  -->

			</div>
		</div>

  </div>
</div>

<!-- ... end Your Account Personal Information --> 
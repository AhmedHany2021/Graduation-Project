<!-- ============================================================== -->
                    <!-- content -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- profile -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- card profile -->
                            <!-- ============================================================== -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="user-avatar text-left d-block">
                                        <img src="/uploads/images/<?php echo $user->image ?>" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                                    </div>
                                    <form action="/profile/editimage" method="post"  enctype="multipart/form-data">
                                        <input type="file" id="myFile" name="img" >
                                        <input type="submit">
                                    </form>
                                    <br>
                                <form action="/profile/editprofile" method="post"> 
                                    <div class="text-center" >
                                        <label for="your-vname">Name</label>
                                        <input type="text" name="name" id="your-vname" class="input-text" placeholder="Visable Name" <?php if(isset($user->user_name))?>value="<?php echo $user->user_name ;?>" required>                                        
                                    </div>
                                <div class="card-body border-top">
                                    <h3 class="font-22">Contact Information</h3>
                                    <div class="text-center">
                                        <ul class="list-unstyled mb-0">
                                        <li class="mb-2 font-18"><i class="fas fa-fw fa-envelope mr-2"></i><?php echo $user->email ?></li>
                                        <li class="mb-2 font-18"><i class="fas fa-fw fa-phone mr-2"></i><?php echo $user->phone ?></li>
                                    </ul>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <h3 class="font-22">Personal Information</h3>                                   
                                    <br>
                                    <div class="text-center" >
                                        <label for="your-gender">Gender</label>
                                        <i class="fas fa-fw fa-venus-mars mr-2"></i>
                                        <input type="text" name="gender" id="your-gender" class="input-text" placeholder="Gender  " <?php if(isset($user->gender))?>value="<?php echo $user->gender; ?>" required>                                        
                                    </div>
                                    <br>
                                    <div class="text-center" >
                                        <label for="your-weight">Weight</label>
                                        <i class="fas fa-fw fa-weight mr-2"></i>
                                        <input type="text" name="weight" id="your-weight" class="input-text" placeholder="Kilograms" <?php if(isset($user->weight))?>value="<?php echo $user->weight; ?>" required>                                        
                                    </div>
                                    <br>
                                    <div class="text-center" >
                                        <label for="your-height">Height</label>
                                        <i class="fas fa-fw fa-tape mr-2"></i>
                                        <input type="text" name="height" id="your-height" class="input-text" placeholder="Centimeters" <?php if(isset($user->height))?> value="<?php echo $user->height; ?>" required>                                        
                                    </div>
                                </div>                                
                                <div class="form-row-last">
					<input type="submit" name="submit" class="register" value = 'update'>
				</div> 
                                </form>
                                    <div class="card-body border-top">
                                        <h3 class="font-22">Reset Password</h3> 
                                    <form action="/profile/editpassword" method="post">                                                                                                                      
                                            <br>
                                            <div class="text-center" >
                                                <label for="your-gender">Old Password</label>
                                                
                                                <input type="password" name="oldpassword" id="your-gender" class="input-text" placeholder="Old Password"  required>                                        
                                            </div>
                                            <br>
                                            <div class="text-center" >
                                                <label for="your-gender">new Password</label>
                                                
                                                <input type="password" name="password" id="your-gender" class="input-text" placeholder="Nwe Password" required>                                        
                                            </div>
                                            <br>
                                            <div class="text-center" >
                                                <label for="your-gender">Repeat Password</label>
                                                
                                                <input type="password" name="password2" id="your-gender" class="input-text" placeholder="Repeat Password"  required>                                        
                                            </div>
                                            <div class="form-row-last">
                                                <input type="submit" name="submit" class="register" value = 'reset'>
                                            </div>
                                    </form>
                                         </div>
                            </div>
                            

                            <!-- ============================================================== -->
                            <!-- end card profile -->
                            <!-- ============================================================== -->
                        </div>
                        <!-- ============================================================== -->
                        <!-- end profile -->
                        <!-- ============================================================== -->
                                            
                </div>
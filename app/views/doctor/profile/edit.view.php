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
                                        <label >specialization</label>
                                        <input type="text" name="specialization" id="your-gender" class="input-text" placeholder="specialization" <?php if(isset($user->specialization))?>value="<?php echo $user->specialization; ?>" required>                                        
                                    </div>
                                    <br>
                                    <div class="text-center" >
                                        <label >description</label>
                                        <input type="text" name="description" id="your-gender" class="input-text" placeholder="description" <?php if(isset($user->description))?>value="<?php echo $user->description; ?>" required>                                        
                                    </div>
                                    <br>
                                    
                                    <div class="text-center" >
                                        <label >country</label>
                                        <input type="text" name="country" id="your-gender" class="input-text" placeholder="country" <?php if(isset($user->country))?>value="<?php echo $user->country; ?>" required>                                        
                                    </div>
                                    <br>
                                    
                                    <div class="text-center" >
                                        <label >city</label>
                                        <input type="text" name="city" id="your-gender" class="input-text" placeholder="city" <?php if(isset($user->city))?>value="<?php echo $user->city; ?>" required>                                        
                                    </div>
                                    <br>
                                    
                                    <div class="text-center" >
                                        <label >address</label>
                                        <input type="text" name="address" id="your-gender" class="input-text" placeholder="address" <?php if(isset($user->address))?>value="<?php echo $user->address; ?>" required>                                        
                                    </div>
                                    <br>
                                    
                                    <div class="text-center" >
                                        <label >price</label>
                                        <input type="text" name="price" id="your-gender" class="input-text" placeholder="price" <?php if(isset($user->price))?>value="<?php echo $user->price; ?>" required>                                        
                                    </div>
                                    <br>
                                    
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
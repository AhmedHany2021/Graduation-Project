


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
                                        <img src="/uploads/images/<?php echo $doctor->image ?>" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                                        <button type="button" name="edit" class="button edit" style="float: right" onclick="location.href ='/doctor/join/<?php echo $doctor->id; ?>'">Join</button>
                                    </div>
                                    <div class="text-center">
                                        <h2 class="font-32 mb-0"><?php echo $doctor->user_name ?></h2>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <h3 class="font-22">Contact Information</h3>
                                    <div class="text-center">
                                        <ul class="list-unstyled mb-0">
                                        <li class="mb-2 font-18"><i class="fas fa-fw fa-envelope mr-2"></i><?php echo $doctor->email ?></li>
                                        <li class="mb-2 font-18"><i class="fas fa-fw fa-phone mr-2"></i><?php echo $doctor->phone ?></li>
                                    </ul>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <h3 class="font-22">Personal Information</h3>
                                    <div class="text-center">
                                        <ul class="list-unstyled mb-0">
                                        <label>specialization: </label>
                                        <li class="mb-2 font-18"><?php echo $doctor->specialization ?></li>
                                        <br>
                                        <label>description: </label>
                                        <li class="mb-2 font-18"><?php echo $doctor->description ?></li>
                                     
                                        <br>
                                        <label>country: </label>
                                        <li class="mb-2 font-18"><?php echo $doctor->country ?></li>
                                        <br>
                                        <label>city: </label>
                                        <li class="mb-2 font-18"><?php echo $doctor->city ?></li>
                                        <br>
                                        <label>address: </label>
                                        <li class="mb-2 font-18"><?php echo $doctor->address ?></li>
                                        <br>
                                        <label>price: </label>
                                        <li class="mb-2 font-18"><?php echo $doctor->price ?></li>
                                        <br>
                                        <label>rate: </label>
                                        <li class="mb-2 font-18"><?php echo $doctor->rate ?></li>
                                        <label>rate count: </label>
                                        <li class="mb-2 font-18"><?php echo $doctor->rate_num ?></li>
                                        
                                    </ul mr-2>
                                    </div>
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


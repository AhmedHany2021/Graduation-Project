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
                                        <button type="button" name="edit" class="button edit" style="float: right" onclick="location.href ='/profile/edit';">Edit Profile</button>
                                    </div>
                                    <div class="text-center">
                                        <h2 class="font-32 mb-0"><?php echo $user->user_name ?></h2>
                                    </div>
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
                                    <div class="text-center">
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2 font-18"><i class="fas fa-fw fa-venus-mars mr-2"></i><?php echo $user->gender ?> </li>
                                        <li class="mb-2 font-18"><i class="fas fa-fw fa-weight mr-2"></i><?php echo $user->weight; ?> Kg </li>
                                        <li class="mb-2 font-18"><i class="fas fa-fw fa-tape mr-2"></i><?php echo $user->height ?> cm</li>
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
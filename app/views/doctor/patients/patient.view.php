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
                                        <img src="/uploads/images/<?php echo $patient->image ?>" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                          
                                    </div>
                                    <div class="text-center">
                                        <h2 class="font-32 mb-0"><?php echo $patient->user_name ?></h2>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <h3 class="font-22">Contact Information</h3>
                                    <div class="text-center">
                                        <ul class="list-unstyled mb-0">
                                        <li class="mb-2 font-18"><i class="fas fa-fw fa-envelope mr-2"></i><?php echo $patient->email ?></li>
                                        <li class="mb-2 font-18"><i class="fas fa-fw fa-phone mr-2"></i><?php echo $patient->phone ?></li>
                                    </ul>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <h3 class="font-22">Personal Information</h3>
                                    <div class="text-center">
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2 font-18"><i class="fas fa-fw fa-venus-mars mr-2"></i><?php echo $patient->gender ?> </li>
                                        <li class="mb-2 font-18"><i class="fas fa-fw fa-weight mr-2"></i><?php echo $patient->weight; ?> Kg </li>
                                        <li class="mb-2 font-18"><i class="fas fa-fw fa-tape mr-2"></i><?php echo $patient->height ?> cm</li>
                                    </ul mr-2>
                                    </div>
                                </div>                                
                            
                                <div class="card-body border-top">
                                    <h3 class="font-22">Patient Reads</h3>
                                    <div class="text-center">
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2 font-18"><i  class="fa fa-heartbeat" aria-hidden="true"></i><a href="/ecg/default/<?php echo $patient->id ?>"> ECG </a> </li>
                                            <li class="mb-2 font-18"><i  class="fa fa-heart" aria-hidden="true"></i><a href="/heartrate/default/<?php echo $patient->id ?>"> Heart Rate </a> </li>
                                    </ul mr-2>
                                    </div>
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
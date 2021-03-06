<?php if(isset($doctor)){?>



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
                                        <button type="button" name="edit" class="button edit" style="float: right" onclick="location.href ='/doctor/delete'">Delete My Doctor</button>
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

    
    
<?php } ?>



<?php if(isset($doctors)) {?>



<div>
    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">patients</a></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Readings</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">name</th>
                                                        <th class="border-0">email</th>
                                                        <th class="border-0">phone</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if($doctors != false){ $count =1;    foreach ($doctors as $value){ ?>
                                                    <tr>
                                                        <td><?php echo $count;$count++;?></td>
                                                        <td  onMouseOver="this.style.color='#00F'" onClick="document.location.href='/doctor/one/<?php echo $value->id ?>'"
                                                        onMouseOut="this.style.color='#999'"><?php echo $value->user_name ?></td>
                                                        <td><span class="badge-dot badge-success mr-1"></span><?php echo $value->email?></td>
                                                        <td><span class="badge-dot badge-success mr-1"></span><?php echo $value->phone?></td>
                                                    </tr>
                                                    <?php }} ?>
                                                </tbody>
                                            </table>
                                        </div>
</div>


<?php } ?>
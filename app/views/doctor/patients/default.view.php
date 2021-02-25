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
                                                        <th class="border-0">delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if($patients != false){ $count =1;    foreach ($patients as $value){ ?>
                                                    <tr>
                                                        <td><?php echo $count;$count++;?></td>
                                                        <td  onMouseOver="this.style.color='#00F'" onClick="document.location.href='/patients/patient/<?php echo $value->id ?>'"
                                                        onMouseOut="this.style.color='#999'"><?php echo $value->user_name ?></td>
                                                        <td><span class="badge-dot badge-success mr-1"></span><?php echo $value->email?></td>
                                                        <td><span class="badge-dot badge-success mr-1"></span><?php echo $value->phone?></td>
                                                        <td  onClick="document.location.href='/patients/delete/<?php echo $value->id ?>'" onMouseOver="this.style.color='#00F'"
                                                             onMouseOut="this.style.color='#999'"><li class = 'fa fa-trash'></li></td>
                                                    </tr>
                                                    <?php }} ?>
     </tbody>
                                            </table>
                                        </div>
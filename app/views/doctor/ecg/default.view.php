<div>
    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">patient</a></li>
                                            <p class="breadcrumb-item">ECG</p>
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
                                                        <th class="border-0"><?php echo $When ?></th>
                                                        <th class="border-0"><?php echo $Reading ?></th>
                                                        <th class="border-0"><?php echo $Comment ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if($ecg != false){ $count =1;    foreach ($ecg as $value){ ?>
                                                    <tr>
                                                        <td><?php echo $count;$count++;?></td>
                                                        <td><?php echo $value->create_time?></td>
                                                        <td onClick="document.location.href='/ecg/graph/<?php echo $patient->id ?>/<?php echo $value->id ?>'" onMouseOver="this.style.color='#00F'"
                                                        onMouseOut="this.style.color='#999'"><?php echo $value->heart_rate ?></td>
                                                        <td><span class="badge-dot badge-success mr-1"></span><?php echo $value->comment?></td>
                                                    </tr>
                                                    <?php }} ?>
     </tbody>
                                            </table>
                                        </div>
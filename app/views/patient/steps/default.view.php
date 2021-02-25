<div>
    <div class="row">
<div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h2 class="card-header text-center">Today</h2>
                                    <h4 contenteditable="true" class="text-center">
                                        <?php if($steps){ echo $steps[0]->steps.'/'.$steps[0]->target;}?>
                                    </h4>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0"><?php echo $when ?></th>
                                                        <th class="border-0"><?php echo $step ?></th>
                                                        <th class="border-0"><?php echo $target ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php if($steps){$count = 0;foreach ($steps as $value) {?>
                                                   <tr>
                                                        <td><?php echo ++$count ?></td>
                                                        <td><?php echo explode(' ',$value->create_time)[0] ?></td>
                                                        <td><?php echo $value->steps ?></td>
                                                        <td><?php echo $value->target ?></td>
                                                    </tr> 
                                                <?php }}?>
     </tbody>
                                            </table>
                                        </div>
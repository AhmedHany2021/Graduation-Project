  <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"><img src="/uploads/images/<?php echo $user1->image ?>" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $user1->user_name ?></h5>
                                    <span class="status"></span><span class="ml-2"><?php echo $Available ?></span>
                                </div>
                                <a class="dropdown-item" href="/profile"><i class="fas fa-user mr-2"></i><?php echo $Account ?></a>
                                <a class="dropdown-item" href="/logout"><i class="fas fa-power-off mr-2"></i><?php echo $Logout ?></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <!-- Logo -->
                <div class="logo">
                    <h1><a href="<?php echo site_url('admin/') ?>">Admin | ExpressDelivery</a></h1>
                </div>
            </div>
            <div class="col-md-2">
                <div class="navbar navbar-inverse" role="banner">
                    <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a>Logout</a>
                            </li>
                        </ul>

                        <!-- <ul class="nav navbar-nav">
                            <li class="dropdown">
                            <?php if($this->session->status=='Logged') { ?>
                                <a href="<?php echo site_url('log/logout') ?>">Keluar</a>
                            <?php } ?>
                            </li>
                        </ul> -->
                        
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row border-bottom white-bg">
                <nav class="navbar navbar-static-top" role="navigation">
                    <div class="navbar-header">
                        <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                            <i class="fa fa-reorder"></i>
                        </button>
                        <a href="<?php echo base_url();?>admin" class="navbar-brand">Form Creator</a>
                    </div>
                    <div class="navbar-collapse collapse" id="navbar">
                        <ul class="nav navbar-nav">
                            <li>
                                <a aria-expanded="false" role="button" href="<?php echo base_url()?>admin"> Form</a>
                            </li>
                            <li>
                                <a aria-expanded="false" role="button" href="<?php echo base_url()?>admin/setting"> Setting</a>
                            </li>

                        </ul>
                        <ul class="nav navbar-top-links navbar-right">
                            <li><p>Hi, <strong><?php echo strtoupper($this->session->userdata('username'));?></strong></p></li>
                            <li>
                                <a href="<?php echo base_url()?>admin/logout">
                                    <i class="fa fa-sign-out"></i> Log out
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
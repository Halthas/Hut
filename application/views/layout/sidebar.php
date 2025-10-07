<aside id="sidebar-left" class="sidebar-left">
	<div class="sidebar-header">
		<div class="sidebar-title">Shortcut</div>
	</div>
	<div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <!-- Dashboard -->
                    <li class="<?php if ($main_menu == 'dashboard') echo 'nav-active'; ?>">
                        <a href="<?php echo base_url('dashboard'); ?>"><i class="fab fa-dashcube"></i><span><?php echo translate('dashboard'); ?></span></a>
                    </li>
					
                    <?php if(get_permission('employee', 'is_view') || get_permission('employee', 'is_add') || get_permission('designation', 'is_view') || get_permission('designation', 'is_add') || get_permission('department', 'is_view') || get_permission('employee_disable_authentication', 'is_view')) { ?>
                    <!-- Employees -->
                    <li class="nav-parent <?php if ($main_menu == 'employee') echo 'nav-expanded nav-active'; ?>">
                        <a><i class="fas fa-users"></i><span><?php echo translate('employee'); ?></span></a>
                        <ul class="nav nav-children">
                        <?php if(get_permission('employee', 'is_view')) { ?>
                            <li class="<?php if ($sub_page == 'employee/view' || $sub_page == 'employee/profile' || $sub_page == 'employee/add_short_bio') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('employee/view'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('employee') . " " . translate('list'); ?></span>
                                </a>
                            </li>
                        <?php } if(get_permission('department', 'is_view') || get_permission('department', 'is_add')) { ?>
                            <li class="<?php if ($sub_page == 'employee/department') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('employee/department'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('add') . " " . translate('department'); ?></span>
                                </a>
                            </li>
                        <?php }  if(get_permission('designation', 'is_view') || get_permission('designation', 'is_add')) { ?>
                            <li class="<?php if ($sub_page == 'employee/designation') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('employee/designation'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('add') . " " . translate('designation'); ?></span>
                                </a>
                            </li>
                        <?php } if(get_permission('employee', 'is_add')) { ?>
                            <li class="<?php if ($sub_page == 'employee/add') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('employee/create'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('add') . " " . translate('employee'); ?></span>
                                </a>
                            </li>
                        <?php } if(get_permission('employee_disable_authentication', 'is_view')) { ?>
                            <li class="<?php if ($sub_page == 'employee/disable_authentication') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('employee/disable_authentication'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('login_deactivate'); ?></span>
                                </a>
                            </li>
                        <?php } ?>
                        </ul>
                    </li>
					<?php } ?>
					
					<?php if(get_permission('vendor', 'is_view') || get_permission('vendor', 'is_add') || get_permission('vendor', 'is_edit') || get_permission('vendor', 'is_delete')) { ?>
					<!-- VENDOR -->
                    <li class="<?php if ($main_menu == 'vendor') echo 'nav-active'; ?>">
                        <a href="<?php echo base_url('vendor'); ?>"><i class="fab fa-dashcube"></i><span>Vendor</span></a>
                    </li>
					<?php } ?>
                    
					<?php if(get_permission('global_setting', 'is_view') || get_permission('database_backup', 'is_view') || get_permission('language', 'is_view') || get_permission('database_restore', 'is_add')) { ?>
                    <!-- Settings -->
                    <li class="nav-parent <?php if ($main_menu == 'settings') echo 'nav-expanded nav-active'; ?>">
                        <a><i class="fas fa-cogs"></i><span><?php echo translate('settings'); ?></span></a>
                        <ul class="nav nav-children">
                        <?php if(get_permission('global_setting', 'is_view')) { ?>
                            <li class="<?php if ($sub_page == 'setting') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('settings'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('global') . " " . translate('setting'); ?></span>
                                </a>
                            </li>
                        <?php } if(loggedin_role_id() == 1) { ?>
                            <li class="<?php if ($sub_page == 'role' || $sub_page == 'role/permission') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('role'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('role') . " " . translate('permission'); ?></span>
                                </a>
                            </li>
                        <?php } if(get_permission('language', 'is_view')) { ?>
                            <li class="<?php if ($sub_page == 'language' || $sub_page == 'language/word_update' || $sub_page == 'language/edit') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('language'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('language') . " " . translate('setting'); ?></span>
                                </a>
                            </li>
                        <?php } if(get_permission('database_backup', 'is_view') || get_permission('database_restore', 'is_add')) { ?>
                            <li class="<?php if ($sub_page == 'backup') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('backup'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('database') . " " . translate('backup'); ?></span>
                                </a>
                            </li>
                        <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
	</div>
</aside>
<!-- end sidebar -->
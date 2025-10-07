<header class="header">
	<div class="logo-env">
		<a href="<?php echo base_url('dashboard'); ?>" class="logo"><img src="<?php echo base_url('uploads/app_image/logo-small.png'); ?>" height="40"></a>
		<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
			<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
		</div>
	</div>

	<div class="header-left hidden-xs">
		<ul class="header-menu">
			<!-- Sidebar Toggle Button -->
			<li>
				<div class="header-menu-icon sidebar-toggle" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
					<i class="fas fa-bars" aria-label="Toggle sidebar"></i>
				</div>
			</li>
			<!-- Full Screen Button -->
			<li>
				<div class="header-menu-icon s-expand"><i class="fas fa-expand"></i></div>
			</li>
		</ul>
	</div>

	<div class="header-right">
		<ul class="header-menu">
			<!-- Languages Switcher -->
			<li>
				<a href="#" class="dropdown-toggle header-menu-icon" data-toggle="dropdown">
					<i class="far fa-flag"></i>
				</a>
				<div class="dropdown-menu header-menubox">
					<div class="notification-title">
						<i class="far fa-flag"></i> <?php echo translate('language'); ?>
					</div>
					<div class="content hbox">
						<div class="scrollable visible-slider" data-plugin-scrollable>
							<div class="scrollable-content">
								<ul>
<?php
$set_lang = $this->session->userdata('set_lang');
$languages = $this->db->select('*')->where('status', 1)->get('language_list')->result();
foreach($languages as $lang) :
?>
									<li>
										<a href="<?php echo base_url('language/set_language/' . $lang->lang_field); ?>">
											<img src="<?php echo html_escape($this->app_lib->get_lang_image_url($lang->id)); ?>" alt="<?php echo html_escape($lang->lang_field); ?>"> <?php echo ucfirst($lang->name); ?> <?php echo ($set_lang == $lang->lang_field ? '<i class="fas fa-check"></i>' : ''); ?>
										</a>
									</li>
<?php endforeach; ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</li>
		</ul>

		<?php
			if (loggedin_role_id() == 7) {
				$userProfileImg = $this->app_lib->get_image_url($this->session->userdata('logger_photo'));
			}else{
				$userProfileImg = $this->app_lib->get_image_url('staff/' . $this->session->userdata('logger_photo'));
			}
		?>
		<!-- Profile Box -->
		<span class="separator"></span>
		<div id="userbox" class="userbox">
			<a href="#" data-toggle="dropdown">
				<figure class="profile-picture">
					<img src="<?php echo html_escape($userProfileImg); ?>" alt="user-image" height="35">
				</figure>
			</a>
			<div class="dropdown-menu">
				<ul class="dropdown-user list-unstyled">
					<li class="user-p-box">
						<div class="dw-user-box">
							<div class="u-img">
								<img src="<?php echo html_escape($userProfileImg); ?>" alt="user">
							</div>
							<div class="u-text">
								<h4><?php echo html_escape($this->session->userdata('name')); ?></h4>
								<p class="text-muted"><?php echo ucfirst(loggedin_role_name()); ?></p>
								<a href="<?php echo base_url('authentication/logout'); ?>" class="btn btn-danger btn-xs"><i class="fas fa-sign-out-alt"></i> <?php echo translate('logout'); ?></a>
							</div>
						</div>
					</li>
					<li role="separator" class="divider"></li>
					<li><a href="<?php echo base_url('profile'); ?>"><i class="fas fa-user-shield"></i> <?php echo translate('profile'); ?></a></li>
					<li><a href="<?php echo base_url('profile/password'); ?>"><i class="fas fa-mars-stroke-h"></i> <?php echo translate('reset_password'); ?></a></li>
				<?php if(get_permission('global_setting', 'is_view')) { ?>
					<li role="separator" class="divider"></li>
					<li><a href="<?php echo base_url('settings'); ?>"><i class="fas fa-toolbox"></i> <?php echo translate('global') . " " . translate('settings'); ?></a></li>
				<?php } ?>
					<li role="separator" class="divider"></li>
					<li><a href="<?php echo base_url('authentication/logout'); ?>"><i class="fas fa-sign-out-alt"></i> <?php echo translate('logout'); ?></a></li>
				</ul>
			</div>
		</div>
	</div>
</header>
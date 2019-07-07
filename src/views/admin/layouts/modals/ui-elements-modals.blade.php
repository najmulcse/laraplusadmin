@extends('admin.layouts.master')


@section('content')

		<!doctype html>
<html class="fixed">
<head>

	<!-- Basic -->
	<meta charset="UTF-8">

	<title>Modals | Porto Admin - Responsive HTML5 Template 2.0.0</title>
	<meta name="keywords" content="HTML5 Admin Template" />
	<meta name="description" content="Porto Admin - Responsive HTML5 Template">
	<meta name="author" content="okler.net">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<!-- Web Fonts  -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="vendor/animate/animate.css">

	<link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.css" />
	<link rel="stylesheet" href="vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

	<!-- Specific Page Vendor CSS -->
	<link rel="stylesheet" href="vendor/select2/css/select2.css" />
	<link rel="stylesheet" href="vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
	<link rel="stylesheet" href="vendor/pnotify/pnotify.custom.css" />

	<!-- Theme CSS -->
	<link rel="stylesheet" href="css/theme.css" />

	<!-- Skin CSS -->
	<link rel="stylesheet" href="css/skins/default.css" />

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="css/custom.css">

	<!-- Head Libs -->
	<script src="vendor/modernizr/modernizr.js"></script>

</head>
<body>
<section class="body">

	<!-- start: header -->
	<header class="header">
		<div class="logo-container">
			<a href="../2.0.0" class="logo">
				<img src="img/logo.png" width="75" height="35" alt="Porto Admin" />
			</a>
			<div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
				<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
			</div>
		</div>

		<!-- start: search & user box -->
		<div class="header-right">

			<form action="pages-search-results.html" class="search nav-form">
				<div class="input-group input-search">
					<input type="text" class="form-control" name="q" id="q" placeholder="Search...">
					<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</span>
				</div>
			</form>

			<span class="separator"></span>

			<ul class="notifications">
				<li>
					<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
						<i class="fa fa-tasks"></i>
						<span class="badge">3</span>
					</a>

					<div class="dropdown-menu notification-menu large">
						<div class="notification-title">
							<span class="float-right badge badge-default">3</span>
							Tasks
						</div>

						<div class="content">
							<ul>
								<li>
									<p class="clearfix mb-1">
										<span class="message float-left">Generating Sales Report</span>
										<span class="message float-right text-dark">60%</span>
									</p>
									<div class="progress progress-xs light">
										<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
									</div>
								</li>

								<li>
									<p class="clearfix mb-1">
										<span class="message float-left">Importing Contacts</span>
										<span class="message float-right text-dark">98%</span>
									</p>
									<div class="progress progress-xs light">
										<div class="progress-bar" role="progressbar" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100" style="width: 98%;"></div>
									</div>
								</li>

								<li>
									<p class="clearfix mb-1">
										<span class="message float-left">Uploading something big</span>
										<span class="message float-right text-dark">33%</span>
									</p>
									<div class="progress progress-xs light mb-1">
										<div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%;"></div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</li>
				<li>
					<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
						<i class="fa fa-envelope"></i>
						<span class="badge">4</span>
					</a>

					<div class="dropdown-menu notification-menu">
						<div class="notification-title">
							<span class="float-right badge badge-default">230</span>
							Messages
						</div>

						<div class="content">
							<ul>
								<li>
									<a href="#" class="clearfix">
										<figure class="image">
											<img src="img/!sample-user.jpg" alt="Joseph Doe Junior" class="rounded-circle" />
										</figure>
										<span class="title">Joseph Doe</span>
										<span class="message">Lorem ipsum dolor sit.</span>
									</a>
								</li>
								<li>
									<a href="#" class="clearfix">
										<figure class="image">
											<img src="img/!sample-user.jpg" alt="Joseph Junior" class="rounded-circle" />
										</figure>
										<span class="title">Joseph Junior</span>
										<span class="message truncate">Truncated message. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet lacinia orci. Proin vestibulum eget risus non luctus. Nunc cursus lacinia lacinia. Nulla molestie malesuada est ac tincidunt. Quisque eget convallis diam, nec venenatis risus. Vestibulum blandit faucibus est et malesuada. Sed interdum cursus dui nec venenatis. Pellentesque non nisi lobortis, rutrum eros ut, convallis nisi. Sed tellus turpis, dignissim sit amet tristique quis, pretium id est. Sed aliquam diam diam, sit amet faucibus tellus ultricies eu. Aliquam lacinia nibh a metus bibendum, eu commodo eros commodo. Sed commodo molestie elit, a molestie lacus porttitor id. Donec facilisis varius sapien, ac fringilla velit porttitor et. Nam tincidunt gravida dui, sed pharetra odio pharetra nec. Duis consectetur venenatis pharetra. Vestibulum egestas nisi quis elementum elementum.</span>
									</a>
								</li>
								<li>
									<a href="#" class="clearfix">
										<figure class="image">
											<img src="img/!sample-user.jpg" alt="Joe Junior" class="rounded-circle" />
										</figure>
										<span class="title">Joe Junior</span>
										<span class="message">Lorem ipsum dolor sit.</span>
									</a>
								</li>
								<li>
									<a href="#" class="clearfix">
										<figure class="image">
											<img src="img/!sample-user.jpg" alt="Joseph Junior" class="rounded-circle" />
										</figure>
										<span class="title">Joseph Junior</span>
										<span class="message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet lacinia orci. Proin vestibulum eget risus non luctus. Nunc cursus lacinia lacinia. Nulla molestie malesuada est ac tincidunt. Quisque eget convallis diam.</span>
									</a>
								</li>
							</ul>

							<hr />

							<div class="text-right">
								<a href="#" class="view-more">View All</a>
							</div>
						</div>
					</div>
				</li>
				<li>
					<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
						<i class="fa fa-bell"></i>
						<span class="badge">3</span>
					</a>

					<div class="dropdown-menu notification-menu">
						<div class="notification-title">
							<span class="float-right badge badge-default">3</span>
							Alerts
						</div>

						<div class="content">
							<ul>
								<li>
									<a href="#" class="clearfix">
										<div class="image">
											<i class="fa fa-thumbs-down bg-danger text-light"></i>
										</div>
										<span class="title">Server is Down!</span>
										<span class="message">Just now</span>
									</a>
								</li>
								<li>
									<a href="#" class="clearfix">
										<div class="image">
											<i class="fa fa-lock bg-warning text-light"></i>
										</div>
										<span class="title">User Locked</span>
										<span class="message">15 minutes ago</span>
									</a>
								</li>
								<li>
									<a href="#" class="clearfix">
										<div class="image">
											<i class="fa fa-signal bg-success text-light"></i>
										</div>
										<span class="title">Connection Restaured</span>
										<span class="message">10/10/2017</span>
									</a>
								</li>
							</ul>

							<hr />

							<div class="text-right">
								<a href="#" class="view-more">View All</a>
							</div>
						</div>
					</div>
				</li>
			</ul>

			<span class="separator"></span>

			<div id="userbox" class="userbox">
				<a href="#" data-toggle="dropdown">
					<figure class="profile-picture">
						<img src="img/!logged-user.jpg" alt="Joseph Doe" class="rounded-circle" data-lock-picture="img/!logged-user.jpg" />
					</figure>
					<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
						<span class="name">John Doe Junior</span>
						<span class="role">administrator</span>
					</div>

					<i class="fa custom-caret"></i>
				</a>

				<div class="dropdown-menu">
					<ul class="list-unstyled mb-2">
						<li class="divider"></li>
						<li>
							<a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fa fa-user"></i> My Profile</a>
						</li>
						<li>
							<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
						</li>
						<li>
							<a role="menuitem" tabindex="-1" href="pages-signin.html"><i class="fa fa-power-off"></i> Logout</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- end: search & user box -->
	</header>
	<!-- end: header -->

	<div class="inner-wrapper">
		<!-- start: sidebar -->
		<aside id="sidebar-left" class="sidebar-left">

			<div class="sidebar-header">
				<div class="sidebar-title">
					Navigation
				</div>
				<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
					<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
				</div>
			</div>

			<div class="nano">
				<div class="nano-content">
					<nav id="menu" class="nav-main" role="navigation">

						<ul class="nav nav-main">
							<li>
								<a class="nav-link" href="layouts-default.html">
									<i class="fa fa-home" aria-hidden="true"></i>
									<span>Dashboard</span>
								</a>
							</li>
							<li class="nav-parent">
								<a class="nav-link" href="#">
									<i class="fa fa-columns" aria-hidden="true"></i>
									<span>Layouts</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a class="nav-link" href="index.html">
											Landing Page
										</a>
									</li>
									<li>
										<a class="nav-link" href="layouts-default.html">
											Default
										</a>
									</li>
									<li class="nav-parent">
										<a>
											Boxed
										</a>
										<ul class="nav nav-children">
											<li>
												<a class="nav-link" href="layouts-boxed.html">
													Static Header
												</a>
											</li>
											<li>
												<a class="nav-link" href="layouts-boxed-fixed-header.html">
													Fixed Header
												</a>
											</li>
										</ul>
									</li>
									<li class="nav-parent">
										<a>
											Horizontal Menu Header
										</a>
										<ul class="nav nav-children">
											<li>
												<a class="nav-link" href="layouts-header-menu.html">
													Pills
												</a>
											</li>
											<li>
												<a class="nav-link" href="layouts-header-menu-stripe.html">
													Stripe
												</a>
											</li>
											<li>
												<a class="nav-link" href="layouts-header-menu-top-line.html">
													Top Line
												</a>
											</li>
										</ul>
									</li>
									<li>
										<a class="nav-link" href="layouts-dark.html">
											Dark
										</a>
									</li>
									<li>
										<a class="nav-link" href="layouts-dark-header.html">
											Dark Header
										</a>
									</li>
									<li>
										<a class="nav-link" href="layouts-two-navigations.html">
											Two Navigations
										</a>
									</li>
									<li class="nav-parent">
										<a>
											Tab Navigation
										</a>
										<ul class="nav nav-children">
											<li>
												<a class="nav-link" href="layouts-tab-navigation-dark.html">
													Tab Navigation Dark
												</a>
											</li>
											<li>
												<a class="nav-link" href="layouts-tab-navigation.html">
													Tab Navigation Light
												</a>
											</li>
											<li>
												<a class="nav-link" href="layouts-tab-navigation-boxed.html">
													Tab Navigation Boxed
												</a>
											</li>
										</ul>
									</li>
									<li>
										<a class="nav-link" href="layouts-light-sidebar.html">
											Light Sidebar
										</a>
									</li>
									<li>
										<a class="nav-link" href="layouts-left-sidebar-collapsed.html">
											Left Sidebar Collapsed
										</a>
									</li>
									<li>
										<a class="nav-link" href="layouts-left-sidebar-scroll.html">
											Left Sidebar Scroll
										</a>
									</li>
									<li class="nav-parent">
										<a>
											Left Sidebar Big Icons
										</a>
										<ul class="nav nav-children">
											<li>
												<a class="nav-link" href="layouts-left-sidebar-big-icons.html">
													Left Sidebar Big Icons Dark
												</a>
											</li>
											<li>
												<a class="nav-link" href="layouts-left-sidebar-big-icons-light.html">
													Left Sidebar Big Icons Light
												</a>
											</li>
										</ul>
									</li>
									<li class="nav-parent">
										<a>
											Left Sidebar Panel
										</a>
										<ul class="nav nav-children">
											<li>
												<a class="nav-link" href="layouts-left-sidebar-panel.html">
													Left Sidebar Panel Dark
												</a>
											</li>
											<li>
												<a class="nav-link" href="layouts-left-sidebar-panel-light.html">
													Left Sidebar Panel Light
												</a>
											</li>
										</ul>
									</li>
									<li class="nav-parent">
										<a>
											Left Sidebar Sizes
										</a>
										<ul class="nav nav-children">
											<li>
												<a class="nav-link" href="layouts-sidebar-sizes-xs.html">
													Left Sidebar XS
												</a>
											</li>
											<li>
												<a class="nav-link" href="layouts-sidebar-sizes-sm.html">
													Left Sidebar SM
												</a>
											</li>
											<li>
												<a class="nav-link" href="layouts-sidebar-sizes-md.html">
													Left Sidebar MD
												</a>
											</li>
										</ul>
									</li>
									<li>
										<a class="nav-link" href="layouts-square-borders.html">
											Square Borders
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-parent">
								<a class="nav-link" href="#">
									<i class="fa fa-copy" aria-hidden="true"></i>
									<span>Pages</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a class="nav-link" href="pages-signup.html">
											Sign Up
										</a>
									</li>
									<li>
										<a class="nav-link" href="pages-signin.html">
											Sign In
										</a>
									</li>
									<li>
										<a class="nav-link" href="pages-recover-password.html">
											Recover Password
										</a>
									</li>
									<li>
										<a class="nav-link" href="pages-lock-screen.html">
											Locked Screen
										</a>
									</li>
									<li>
										<a class="nav-link" href="pages-user-profile.html">
											User Profile
										</a>
									</li>
									<li>
										<a class="nav-link" href="pages-session-timeout.html">
											Session Timeout
										</a>
									</li>
									<li>
										<a class="nav-link" href="pages-calendar.html">
											Calendar
										</a>
									</li>
									<li>
										<a class="nav-link" href="pages-timeline.html">
											Timeline
										</a>
									</li>
									<li>
										<a class="nav-link" href="pages-media-gallery.html">
											Media Gallery
										</a>
									</li>
									<li>
										<a class="nav-link" href="pages-invoice.html">
											Invoice
										</a>
									</li>
									<li>
										<a class="nav-link" href="pages-blank.html">
											Blank Page
										</a>
									</li>
									<li>
										<a class="nav-link" href="pages-404.html">
											404
										</a>
									</li>
									<li>
										<a class="nav-link" href="pages-500.html">
											500
										</a>
									</li>
									<li>
										<a class="nav-link" href="pages-log-viewer.html">
											Log Viewer
										</a>
									</li>
									<li>
										<a class="nav-link" href="pages-search-results.html">
											Search Results
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-parent nav-expanded nav-active">
								<a class="nav-link" href="#">
									<i class="fa fa-tasks" aria-hidden="true"></i>
									<span>UI Elements</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a class="nav-link" href="ui-elements-typography.html">
											Typography
										</a>
									</li>
									<li class="nav-parent">
										<a class="nav-link" href="#">
											Icons <span class="mega-sub-nav-toggle toggled float-right" data-toggle="collapse" data-target=".mega-sub-nav-sub-menu-1"></span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a class="nav-link" href="ui-elements-icons-elusive.html">
													Elusive
												</a>
											</li>
											<li>
												<a class="nav-link" href="ui-elements-icons-font-awesome.html">
													Font Awesome
												</a>
											</li>
											<li>
												<a class="nav-link" href="ui-elements-icons-line-icons.html">
													Line Icons
												</a>
											</li>
											<li>
												<a class="nav-link" href="ui-elements-icons-meteocons.html">
													Meteocons
												</a>
											</li>
										</ul>
									</li>
									<li>
										<a class="nav-link" href="ui-elements-tabs.html">
											Tabs
										</a>
									</li>
									<li>
										<a class="nav-link" href="ui-elements-cards.html">
											Cards
										</a>
									</li>
									<li>
										<a class="nav-link" href="ui-elements-widgets.html">
											Widgets
										</a>
									</li>
									<li>
										<a class="nav-link" href="ui-elements-portlets.html">
											Portlets
										</a>
									</li>
									<li>
										<a class="nav-link" href="ui-elements-buttons.html">
											Buttons
										</a>
									</li>
									<li>
										<a class="nav-link" href="ui-elements-alerts.html">
											Alerts
										</a>
									</li>
									<li>
										<a class="nav-link" href="ui-elements-notifications.html">
											Notifications
										</a>
									</li>
									<li class="nav-active">
										<a class="nav-link" href="ui-elements-modals.html">
											Modals
										</a>
									</li>
									<li>
										<a class="nav-link" href="ui-elements-lightbox.html">
											Lightbox
										</a>
									</li>
									<li>
										<a class="nav-link" href="ui-elements-progressbars.html">
											Progress Bars
										</a>
									</li>
									<li>
										<a class="nav-link" href="ui-elements-sliders.html">
											Sliders
										</a>
									</li>
									<li>
										<a class="nav-link" href="ui-elements-carousels.html">
											Carousels
										</a>
									</li>
									<li>
										<a class="nav-link" href="ui-elements-accordions.html">
											Accordions
										</a>
									</li>
									<li>
										<a class="nav-link" href="ui-elements-toggles.html">
											Toggles
										</a>
									</li>
									<li>
										<a class="nav-link" href="ui-elements-nestable.html">
											Nestable
										</a>
									</li>
									<li>
										<a class="nav-link" href="ui-elements-tree-view.html">
											Tree View
										</a>
									</li>
									<li>
										<a class="nav-link" href="ui-elements-scrollable.html">
											Scrollable
										</a>
									</li>
									<li>
										<a class="nav-link" href="ui-elements-grid-system.html">
											Grid System
										</a>
									</li>
									<li>
										<a class="nav-link" href="ui-elements-charts.html">
											Charts
										</a>
									</li>
									<li class="nav-parent">
										<a class="nav-link" href="#">
											Animations <span class="mega-sub-nav-toggle float-right" data-toggle="collapse" data-target=".mega-sub-nav-sub-menu-2"></span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a class="nav-link" href="ui-elements-animations-appear.html">
													Appear
												</a>
											</li>
											<li>
												<a class="nav-link" href="ui-elements-animations-hover.html">
													Hover
												</a>
											</li>
										</ul>
									</li>
									<li class="nav-parent">
										<a class="nav-link" href="#">
											Loading <span class="mega-sub-nav-toggle float-right" data-toggle="collapse" data-target=".mega-sub-nav-sub-menu-3"></span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a class="nav-link" href="ui-elements-loading-overlay.html">
													Overlay
												</a>
											</li>
											<li>
												<a class="nav-link" href="ui-elements-loading-progress.html">
													Progress
												</a>
											</li>
										</ul>
									</li>
									<li>
										<a class="nav-link" href="ui-elements-extra.html">
											Extra
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-parent">
								<a class="nav-link" href="#">
									<i class="fa fa-list-alt" aria-hidden="true"></i>
									<span>Forms</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a class="nav-link" href="forms-basic.html">
											Basic
										</a>
									</li>
									<li>
										<a class="nav-link" href="forms-advanced.html">
											Advanced
										</a>
									</li>
									<li>
										<a class="nav-link" href="forms-validation.html">
											Validation
										</a>
									</li>
									<li>
										<a class="nav-link" href="forms-layouts.html">
											Layouts
										</a>
									</li>
									<li>
										<a class="nav-link" href="forms-wizard.html">
											Wizard
										</a>
									</li>
									<li>
										<a class="nav-link" href="forms-code-editor.html">
											Code Editor
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-parent">
								<a class="nav-link" href="#">
									<i class="fa fa-table" aria-hidden="true"></i>
									<span>Tables</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a class="nav-link" href="tables-basic.html">
											Basic
										</a>
									</li>
									<li>
										<a class="nav-link" href="tables-advanced.html">
											Advanced
										</a>
									</li>
									<li>
										<a class="nav-link" href="tables-responsive.html">
											Responsive
										</a>
									</li>
									<li>
										<a class="nav-link" href="tables-editable.html">
											Editable
										</a>
									</li>
									<li>
										<a class="nav-link" href="tables-ajax.html">
											Ajax
										</a>
									</li>
									<li>
										<a class="nav-link" href="tables-pricing.html">
											Pricing
										</a>
									</li>
								</ul>
							</li>
							<li>
								<a class="nav-link" href="mailbox-folder.html">
									<span class="float-right badge badge-primary">182</span>
									<i class="fa fa-envelope" aria-hidden="true"></i>
									<span>Mailbox</span>
								</a>
							</li>
							<li class="nav-parent">
								<a class="nav-link" href="#">
									<i class="fa fa-map-marker" aria-hidden="true"></i>
									<span>Maps</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a class="nav-link" href="maps-google-maps.html">
											Basic
										</a>
									</li>
									<li>
										<a class="nav-link" href="maps-google-maps-builder.html">
											Map Builder
										</a>
									</li>
									<li>
										<a class="nav-link" href="maps-vector.html">
											Vector
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-parent">
								<a class="nav-link" href="#">
									<i class="fa fa-asterisk" aria-hidden="true"></i>
									<span>Extra</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a class="nav-link" href="extra-changelog.html">
											Changelog
										</a>
									</li>
									<li>
										<a class="nav-link" href="extra-ajax-made-easy.html">
											Ajax Made Easy
										</a>
									</li>
								</ul>
							</li>
							<li>
								<a class="nav-link" href="http://themeforest.net/item/porto-responsive-html5-template/4106987?ref=Okler">
									<i class="fa fa-external-link" aria-hidden="true"></i>
									<span>Front-End <em class="not-included">(Not Included)</em></span>
								</a>
							</li>
							<li class="nav-parent">
								<a class="nav-link" href="#">
									<i class="fa fa-align-left" aria-hidden="true"></i>
									<span>Menu Levels</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a>
											First Level
										</a>
									</li>
									<li class="nav-parent">
										<a class="nav-link" href="#">
											Second Level
										</a>
										<ul class="nav nav-children">
											<li>
												<a>
													Second Level Link #1
												</a>
											</li>
											<li>
												<a>
													Second Level Link #2
												</a>
											</li>
											<li class="nav-parent">
												<a class="nav-link" href="#">
													Third Level
												</a>
												<ul class="nav nav-children">
													<li>
														<a>
															Third Level Link #1
														</a>
													</li>
													<li>
														<a>
															Third Level Link #2
														</a>
													</li>
												</ul>
											</li>
										</ul>
									</li>
								</ul>
							</li>

						</ul>
					</nav>

					<hr class="separator" />

					<div class="sidebar-widget widget-tasks">
						<div class="widget-header">
							<h6>Projects</h6>
							<div class="widget-toggle">+</div>
						</div>
						<div class="widget-content">
							<ul class="list-unstyled m-0">
								<li><a href="#">Porto HTML5 Template</a></li>
								<li><a href="#">Tucson Template</a></li>
								<li><a href="#">Porto Admin</a></li>
							</ul>
						</div>
					</div>

					<hr class="separator" />

					<div class="sidebar-widget widget-stats">
						<div class="widget-header">
							<h6>Company Stats</h6>
							<div class="widget-toggle">+</div>
						</div>
						<div class="widget-content">
							<ul>
								<li>
									<span class="stats-title">Stat 1</span>
									<span class="stats-complete">85%</span>
									<div class="progress">
										<div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
											<span class="sr-only">85% Complete</span>
										</div>
									</div>
								</li>
								<li>
									<span class="stats-title">Stat 2</span>
									<span class="stats-complete">70%</span>
									<div class="progress">
										<div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
											<span class="sr-only">70% Complete</span>
										</div>
									</div>
								</li>
								<li>
									<span class="stats-title">Stat 3</span>
									<span class="stats-complete">2%</span>
									<div class="progress">
										<div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
											<span class="sr-only">2% Complete</span>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<script>
					// Maintain Scroll Position
					if (typeof localStorage !== 'undefined') {
						if (localStorage.getItem('sidebar-left-position') !== null) {
							var initialPosition = localStorage.getItem('sidebar-left-position'),
									sidebarLeft = document.querySelector('#sidebar-left .nano-content');

							sidebarLeft.scrollTop = initialPosition;
						}
					}
				</script>


			</div>

		</aside>
		<!-- end: sidebar -->

		<section role="main" class="content-body">
			<header class="page-header">
				<h2>Modals</h2>

				<div class="right-wrapper text-right">
					<ol class="breadcrumbs">
						<li>
							<a href="index.html">
								<i class="fa fa-home"></i>
							</a>
						</li>
						<li><span>UI Elements</span></li>
						<li><span>Modals</span></li>
					</ol>

					<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
				</div>
			</header>

			<!-- start: page -->
			<div class="row">
				<div class="col-lg-6">
					<section class="card">
						<header class="card-header">
							<div class="card-actions">
								<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
								<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
							</div>

							<h2 class="card-title">Basic</h2>
							<p class="card-subtitle">Modals are streamlined, but flexible, dialog prompts with the minimum required functionality and smart defaults.</p>
						</header>
						<div class="card-body">

							<!-- Modal Basic -->
							<a class="mb-1 mt-1 mr-1 modal-basic btn btn-default" href="#modalBasic">Basic</a>

							<div id="modalBasic" class="modal-block mfp-hide">
								<section class="card">
									<header class="card-header">
										<h2 class="card-title">Are you sure?</h2>
									</header>
									<div class="card-body">
										<div class="modal-wrapper">
											<div class="modal-text">
												<p class="mb-0">Are you sure that you want to delete this image?</p>
											</div>
										</div>
									</div>
									<footer class="card-footer">
										<div class="row">
											<div class="col-md-12 text-right">
												<button class="btn btn-primary modal-confirm">Confirm</button>
												<button class="btn btn-default modal-dismiss">Cancel</button>
											</div>
										</div>
									</footer>
								</section>
							</div>

							<!-- Modal Icon -->
							<a class="mb-1 mt-1 mr-1 modal-basic btn btn-default" href="#modalIcon">Icon</a>

							<div id="modalIcon" class="modal-block modal-block-primary mfp-hide">
								<section class="card">
									<header class="card-header">
										<h2 class="card-title">Are you sure?</h2>
									</header>
									<div class="card-body">
										<div class="modal-wrapper">
											<div class="modal-icon">
												<i class="fa fa-question-circle"></i>
											</div>
											<div class="modal-text">
												<p class="mb-0">Are you sure that you want to delete this image?</p>
											</div>
										</div>
									</div>
									<footer class="card-footer">
										<div class="row">
											<div class="col-md-12 text-right">
												<button class="btn btn-primary modal-confirm">Confirm</button>
												<button class="btn btn-default modal-dismiss">Cancel</button>
											</div>
										</div>
									</footer>
								</section>
							</div>

							<!-- Modal Center Icon -->
							<a class="mb-1 mt-1 mr-1 modal-basic btn btn-default" href="#modalCenterIcon">Center Icon</a>

							<div id="modalCenterIcon" class="modal-block modal-block-primary mfp-hide">
								<section class="card">
									<div class="card-body text-center">
										<div class="modal-wrapper">
											<div class="modal-icon center">
												<i class="fa fa-question-circle"></i>
											</div>
											<div class="modal-text">
												<h4>Are you sure?</h4>
												<p>Are you sure that you want to delete this image?</p>
											</div>
										</div>
									</div>
									<footer class="card-footer">
										<div class="row">
											<div class="col-md-12 text-right">
												<button class="btn btn-primary modal-confirm">Confirm</button>
												<button class="btn btn-default modal-dismiss">Cancel</button>
											</div>
										</div>
									</footer>
								</section>
							</div>

							<!-- Modal No Title -->
							<a class="mb-1 mt-1 mr-1 modal-basic btn btn-default" href="#modalNoTitle">No Title</a>

							<div id="modalNoTitle" class="modal-block mfp-hide">
								<section class="card">
									<div class="card-body">
										<div class="modal-wrapper">
											<div class="modal-text">
												<p class="mb-0">Are you sure that you want to delete this image?</p>
											</div>
										</div>
									</div>
									<footer class="card-footer">
										<div class="row">
											<div class="col-md-12 text-right">
												<button class="btn btn-primary modal-confirm">Confirm</button>
												<button class="btn btn-default modal-dismiss">Cancel</button>
											</div>
										</div>
									</footer>
								</section>
							</div>

							<!-- Modal No Footer -->
							<a class="mb-1 mt-1 mr-1 modal-basic btn btn-default" href="#modalNoFooter">No Footer</a>

							<div id="modalNoFooter" class="modal-block mfp-hide">
								<section class="card">
									<header class="card-header">
										<h2 class="card-title">Are you sure?</h2>
									</header>
									<div class="card-body">
										<div class="modal-wrapper">
											<div class="modal-text">
												<p class="mb-0">Are you sure that you want to delete this image?</p>
												<button class="btn btn-primary modal-confirm">Confirm</button>
												<button class="btn btn-default modal-dismiss">Cancel</button>
											</div>
										</div>
									</div>
								</section>
							</div>

							<!-- Modal Center -->
							<a class="mb-1 mt-1 mr-1 modal-basic btn btn-default" href="#modalCenter">Center</a>

							<div id="modalCenter" class="modal-block mfp-hide">
								<section class="card">
									<div class="card-body">
										<div class="modal-wrapper">
											<div class="modal-text text-center">
												<p>Are you sure that you want to delete this image?</p>
												<button class="btn btn-primary modal-confirm">Confirm</button>
												<button class="btn btn-default modal-dismiss">Cancel</button>
											</div>
										</div>
									</div>
								</section>
							</div>

							<!-- Modal Bootstrap -->
							<a class="mb-1 mt-1 mr-1 btn btn-default" data-toggle="modal" data-target="#modalBootstrap" href="#">Bootstrap</a>

							<div class="modal" id="modalBootstrap" tabindex="-1" role="dialog">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Are you sure?</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<p>Are you sure that you want to delete this image?</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-primary">Confirm</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
					<section class="card">
						<header class="card-header">
							<div class="card-actions">
								<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
								<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
							</div>

							<h2 class="card-title">Contextual</h2>
							<p class="card-subtitle">You can use any of the avaible contextual classes to create a styled modal.</p>
						</header>
						<div class="card-body">

							<!-- Modal Primary -->
							<a class="mb-1 mt-1 mr-1 modal-basic btn btn-primary" href="#modalPrimary">Primary</a>

							<div id="modalPrimary" class="modal-block modal-block-primary mfp-hide">
								<section class="card">
									<header class="card-header">
										<h2 class="card-title">Are you sure?</h2>
									</header>
									<div class="card-body">
										<div class="modal-wrapper">
											<div class="modal-icon">
												<i class="fa fa-question-circle"></i>
											</div>
											<div class="modal-text">
												<h4>Primary</h4>
												<p>Are you sure that you want to delete this image?</p>
											</div>
										</div>
									</div>
									<footer class="card-footer">
										<div class="row">
											<div class="col-md-12 text-right">
												<button class="btn btn-primary modal-confirm">Confirm</button>
												<button class="btn btn-default modal-dismiss">Cancel</button>
											</div>
										</div>
									</footer>
								</section>
							</div>

							<!-- Modal Success -->
							<a class="mb-1 mt-1 mr-1 modal-basic btn btn-success" href="#modalSuccess">Success</a>

							<div id="modalSuccess" class="modal-block modal-block-success mfp-hide">
								<section class="card">
									<header class="card-header">
										<h2 class="card-title">Success!</h2>
									</header>
									<div class="card-body">
										<div class="modal-wrapper">
											<div class="modal-icon">
												<i class="fa fa-check"></i>
											</div>
											<div class="modal-text">
												<h4>Success</h4>
												<p>This is a successfull message.</p>
											</div>
										</div>
									</div>
									<footer class="card-footer">
										<div class="row">
											<div class="col-md-12 text-right">
												<button class="btn btn-success modal-dismiss">OK</button>
											</div>
										</div>
									</footer>
								</section>
							</div>

							<!-- Modal Info -->
							<a class="mb-1 mt-1 mr-1 modal-basic btn btn-info" href="#modalInfo">Info</a>

							<div id="modalInfo" class="modal-block modal-block-info mfp-hide">
								<section class="card">
									<header class="card-header">
										<h2 class="card-title">Information</h2>
									</header>
									<div class="card-body">
										<div class="modal-wrapper">
											<div class="modal-icon">
												<i class="fa fa-info-circle"></i>
											</div>
											<div class="modal-text">
												<h4>Info</h4>
												<p>This is a information message.</p>
											</div>
										</div>
									</div>
									<footer class="card-footer">
										<div class="row">
											<div class="col-md-12 text-right">
												<button class="btn btn-info modal-dismiss">OK</button>
											</div>
										</div>
									</footer>
								</section>
							</div>

							<!-- Modal Warning -->
							<a class="mb-1 mt-1 mr-1 modal-basic btn btn-warning" href="#modalWarning">Warning</a>

							<div id="modalWarning" class="modal-block modal-block-warning mfp-hide">
								<section class="card">
									<header class="card-header">
										<h2 class="card-title">Warning!</h2>
									</header>
									<div class="card-body">
										<div class="modal-wrapper">
											<div class="modal-icon">
												<i class="fa fa-warning"></i>
											</div>
											<div class="modal-text">
												<h4>Warning</h4>
												<p>This is a warning message.</p>
											</div>
										</div>
									</div>
									<footer class="card-footer">
										<div class="row">
											<div class="col-md-12 text-right">
												<button class="btn btn-warning modal-dismiss">OK</button>
											</div>
										</div>
									</footer>
								</section>
							</div>

							<!-- Modal Danger -->
							<a class="mb-1 mt-1 mr-1 modal-basic btn btn-danger" href="#modalDanger">Danger</a>

							<div id="modalDanger" class="modal-block modal-block-danger mfp-hide">
								<section class="card">
									<header class="card-header">
										<h2 class="card-title">Danger!</h2>
									</header>
									<div class="card-body">
										<div class="modal-wrapper">
											<div class="modal-icon">
												<i class="fa fa-times-circle"></i>
											</div>
											<div class="modal-text">
												<h4>Danger</h4>
												<p>This is a danger message.</p>
											</div>
										</div>
									</div>
									<footer class="card-footer">
										<div class="row">
											<div class="col-md-12 text-right">
												<button class="btn btn-danger modal-dismiss">OK</button>
											</div>
										</div>
									</footer>
								</section>
							</div>
						</div>
					</section>
					<section class="card">
						<header class="card-header">
							<div class="card-actions">
								<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
								<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
							</div>

							<h2 class="card-title">Header Color</h2>
							<p class="card-subtitle">Colored Header Modals</p>
						</header>
						<div class="card-body">

							<!-- Modal Primary -->
							<a class="mb-1 mt-1 mr-1 modal-basic btn btn-primary" href="#modalHeaderColorPrimary">Primary</a>

							<div id="modalHeaderColorPrimary" class="modal-block modal-header-color modal-block-primary mfp-hide">
								<section class="card">
									<header class="card-header">
										<h2 class="card-title">Are you sure?</h2>
									</header>
									<div class="card-body">
										<div class="modal-wrapper">
											<div class="modal-icon">
												<i class="fa fa-question-circle"></i>
											</div>
											<div class="modal-text">
												<h4>Primary</h4>
												<p>Are you sure that you want to delete this image?</p>
											</div>
										</div>
									</div>
									<footer class="card-footer">
										<div class="row">
											<div class="col-md-12 text-right">
												<button class="btn btn-primary modal-confirm">Confirm</button>
												<button class="btn btn-default modal-dismiss">Cancel</button>
											</div>
										</div>
									</footer>
								</section>
							</div>

							<!-- Modal Success -->
							<a class="mb-1 mt-1 mr-1 modal-basic btn btn-success" href="#modalHeaderColorSuccess">Success</a>

							<div id="modalHeaderColorSuccess" class="modal-block modal-header-color modal-block-success mfp-hide">
								<section class="card">
									<header class="card-header">
										<h2 class="card-title">Success!</h2>
									</header>
									<div class="card-body">
										<div class="modal-wrapper">
											<div class="modal-icon">
												<i class="fa fa-check"></i>
											</div>
											<div class="modal-text">
												<h4>Success</h4>
												<p>This is a successfull message.</p>
											</div>
										</div>
									</div>
									<footer class="card-footer">
										<div class="row">
											<div class="col-md-12 text-right">
												<button class="btn btn-success modal-dismiss">OK</button>
											</div>
										</div>
									</footer>
								</section>
							</div>

							<!-- Modal Info -->
							<a class="mb-1 mt-1 mr-1 modal-basic btn btn-info" href="#modalHeaderColorInfo">Info</a>

							<div id="modalHeaderColorInfo" class="modal-block modal-header-color modal-block-info mfp-hide">
								<section class="card">
									<header class="card-header">
										<h2 class="card-title">Information</h2>
									</header>
									<div class="card-body">
										<div class="modal-wrapper">
											<div class="modal-icon">
												<i class="fa fa-info-circle"></i>
											</div>
											<div class="modal-text">
												<h4>Info</h4>
												<p>This is a information message.</p>
											</div>
										</div>
									</div>
									<footer class="card-footer">
										<div class="row">
											<div class="col-md-12 text-right">
												<button class="btn btn-info modal-dismiss">OK</button>
											</div>
										</div>
									</footer>
								</section>
							</div>

							<!-- Modal Warning -->
							<a class="mb-1 mt-1 mr-1 modal-basic btn btn-warning" href="#modalHeaderColorWarning">Warning</a>

							<div id="modalHeaderColorWarning" class="modal-block modal-header-color modal-block-warning mfp-hide">
								<section class="card">
									<header class="card-header">
										<h2 class="card-title">Warning!</h2>
									</header>
									<div class="card-body">
										<div class="modal-wrapper">
											<div class="modal-icon">
												<i class="fa fa-warning"></i>
											</div>
											<div class="modal-text">
												<h4>Warning</h4>
												<p>This is a warning message.</p>
											</div>
										</div>
									</div>
									<footer class="card-footer">
										<div class="row">
											<div class="col-md-12 text-right">
												<button class="btn btn-warning modal-dismiss">OK</button>
											</div>
										</div>
									</footer>
								</section>
							</div>

							<!-- Modal Danger -->
							<a class="mb-1 mt-1 mr-1 modal-basic btn btn-danger" href="#modalHeaderColorDanger">Danger</a>

							<div id="modalHeaderColorDanger" class="modal-block modal-header-color modal-block-danger mfp-hide">
								<section class="card">
									<header class="card-header">
										<h2 class="card-title">Danger!</h2>
									</header>
									<div class="card-body">
										<div class="modal-wrapper">
											<div class="modal-icon">
												<i class="fa fa-times-circle"></i>
											</div>
											<div class="modal-text">
												<h4>Danger</h4>
												<p>This is a danger message.</p>
											</div>
										</div>
									</div>
									<footer class="card-footer">
										<div class="row">
											<div class="col-md-12 text-right">
												<button class="btn btn-danger modal-dismiss">OK</button>
											</div>
										</div>
									</footer>
								</section>
							</div>
						</div>
					</section>
					<section class="card">
						<header class="card-header">
							<div class="card-actions">
								<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
								<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
							</div>

							<h2 class="card-title">Full Color</h2>
							<p class="card-subtitle">Full Colored Modals</p>
						</header>
						<div class="card-body">

							<!-- Modal Primary -->
							<a class="mb-1 mt-1 mr-1 modal-basic btn btn-primary" href="#modalFullColorPrimary">Primary</a>

							<div id="modalFullColorPrimary" class="modal-block modal-full-color modal-block-primary mfp-hide">
								<section class="card">
									<header class="card-header">
										<h2 class="card-title">Are you sure?</h2>
									</header>
									<div class="card-body">
										<div class="modal-wrapper">
											<div class="modal-icon">
												<i class="fa fa-question-circle"></i>
											</div>
											<div class="modal-text">
												<h4>Primary</h4>
												<p>Are you sure that you want to delete this image?</p>
											</div>
										</div>
									</div>
									<footer class="card-footer">
										<div class="row">
											<div class="col-md-12 text-right">
												<button class="btn btn-primary modal-confirm">Confirm</button>
												<button class="btn btn-default modal-dismiss">Cancel</button>
											</div>
										</div>
									</footer>
								</section>
							</div>

							<!-- Modal Success -->
							<a class="mb-1 mt-1 mr-1 modal-basic btn btn-success" href="#modalFullColorSuccess">Success</a>

							<div id="modalFullColorSuccess" class="modal-block modal-full-color modal-block-success mfp-hide">
								<section class="card">
									<header class="card-header">
										<h2 class="card-title">Success!</h2>
									</header>
									<div class="card-body">
										<div class="modal-wrapper">
											<div class="modal-icon">
												<i class="fa fa-check"></i>
											</div>
											<div class="modal-text">
												<h4>Success</h4>
												<p>This is a successfull message.</p>
											</div>
										</div>
									</div>
									<footer class="card-footer">
										<div class="row">
											<div class="col-md-12 text-right">
												<button class="btn btn-default modal-dismiss">Cancel</button>
											</div>
										</div>
									</footer>
								</section>
							</div>

							<!-- Modal Info -->
							<a class="mb-1 mt-1 mr-1 modal-basic btn btn-info" href="#modalFullColorInfo">Info</a>

							<div id="modalFullColorInfo" class="modal-block modal-full-color modal-block-info mfp-hide">
								<section class="card">
									<header class="card-header">
										<h2 class="card-title">Information</h2>
									</header>
									<div class="card-body">
										<div class="modal-wrapper">
											<div class="modal-icon">
												<i class="fa fa-info-circle"></i>
											</div>
											<div class="modal-text">
												<h4>Info</h4>
												<p>This is a information message.</p>
											</div>
										</div>
									</div>
									<footer class="card-footer">
										<div class="row">
											<div class="col-md-12 text-right">
												<button class="btn btn-default modal-dismiss">Cancel</button>
											</div>
										</div>
									</footer>
								</section>
							</div>

							<!-- Modal Warning -->
							<a class="mb-1 mt-1 mr-1 modal-basic btn btn-warning" href="#modalFullColorWarning">Warning</a>

							<div id="modalFullColorWarning" class="modal-block modal-full-color modal-block-warning mfp-hide">
								<section class="card">
									<header class="card-header">
										<h2 class="card-title">Warning!</h2>
									</header>
									<div class="card-body">
										<div class="modal-wrapper">
											<div class="modal-icon">
												<i class="fa fa-warning"></i>
											</div>
											<div class="modal-text">
												<h4>Warning</h4>
												<p>This is a warning message.</p>
											</div>
										</div>
									</div>
									<footer class="card-footer">
										<div class="row">
											<div class="col-md-12 text-right">
												<button class="btn btn-default modal-dismiss">Cancel</button>
											</div>
										</div>
									</footer>
								</section>
							</div>

							<!-- Modal Danger -->
							<a class="mb-1 mt-1 mr-1 modal-basic btn btn-danger" href="#modalFullColorDanger">Danger</a>

							<div id="modalFullColorDanger" class="modal-block modal-full-color modal-block-danger mfp-hide">
								<section class="card">
									<header class="card-header">
										<h2 class="card-title">Danger!</h2>
									</header>
									<div class="card-body">
										<div class="modal-wrapper">
											<div class="modal-icon">
												<i class="fa fa-times-circle"></i>
											</div>
											<div class="modal-text">
												<h4>Danger</h4>
												<p>This is a danger message.</p>
											</div>
										</div>
									</div>
									<footer class="card-footer">
										<div class="row">
											<div class="col-md-12 text-right">
												<button class="btn btn-default modal-dismiss">Cancel</button>
											</div>
										</div>
									</footer>
								</section>
							</div>
						</div>
					</section>
				</div>
				<div class="col-lg-6">
					<section class="card">
						<header class="card-header">
							<div class="card-actions">
								<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
								<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
							</div>

							<h2 class="card-title">Sizes</h2>
							<p class="card-subtitle">Set the size of the modal using a CSS class.</p>
						</header>
						<div class="card-body">

							<!-- Modal XS -->
							<a class="mb-1 mt-1 mr-1 modal-sizes btn btn-default" href="#modalXS">Extra Small</a>

							<div id="modalXS" class="modal-block modal-block-xs mfp-hide">
								<section class="card">
									<header class="card-header">
										<h2 class="card-title">Are you sure?</h2>
									</header>
									<div class="card-body">
										<div class="modal-wrapper">
											<div class="modal-text">
												<p class="mb-0">Are you sure that you want to delete this image?</p>
											</div>
										</div>
									</div>
									<footer class="card-footer">
										<div class="row">
											<div class="col-md-12 text-right">
												<button class="btn btn-primary modal-confirm">Confirm</button>
												<button class="btn btn-default modal-dismiss">Cancel</button>
											</div>
										</div>
									</footer>
								</section>
							</div>

							<!-- Modal SM -->
							<a class="mb-1 mt-1 mr-1 modal-sizes btn btn-default" href="#modalSM">Small</a>

							<div id="modalSM" class="modal-block modal-block-sm mfp-hide">
								<section class="card">
									<header class="card-header">
										<h2 class="card-title">Are you sure?</h2>
									</header>
									<div class="card-body">
										<div class="modal-wrapper">
											<div class="modal-text">
												<p class="mb-0">Are you sure that you want to delete this image?</p>
											</div>
										</div>
									</div>
									<footer class="card-footer">
										<div class="row">
											<div class="col-md-12 text-right">
												<button class="btn btn-primary modal-confirm">Confirm</button>
												<button class="btn btn-default modal-dismiss">Cancel</button>
											</div>
										</div>
									</footer>
								</section>
							</div>

							<!-- Modal MD -->
							<a class="mb-1 mt-1 mr-1 modal-sizes btn btn-default" href="#modalMD">Medium</a>

							<div id="modalMD" class="modal-block modal-block-md mfp-hide">
								<section class="card">
									<header class="card-header">
										<h2 class="card-title">Are you sure?</h2>
									</header>
									<div class="card-body">
										<div class="modal-wrapper">
											<div class="modal-text">
												<p class="mb-0">Are you sure that you want to delete this image?</p>
											</div>
										</div>
									</div>
									<footer class="card-footer">
										<div class="row">
											<div class="col-md-12 text-right">
												<button class="btn btn-primary modal-confirm">Confirm</button>
												<button class="btn btn-default modal-dismiss">Cancel</button>
											</div>
										</div>
									</footer>
								</section>
							</div>

							<!-- Modal LG -->
							<a class="mb-1 mt-1 mr-1 modal-sizes btn btn-default" href="#modalLG">Large</a>

							<div id="modalLG" class="modal-block modal-block-lg mfp-hide">
								<section class="card">
									<header class="card-header">
										<h2 class="card-title">Are you sure?</h2>
									</header>
									<div class="card-body">
										<div class="modal-wrapper">
											<div class="modal-text">
												<p class="mb-0">Are you sure that you want to delete this image?</p>
											</div>
										</div>
									</div>
									<footer class="card-footer">
										<div class="row">
											<div class="col-md-12 text-right">
												<button class="btn btn-primary modal-confirm">Confirm</button>
												<button class="btn btn-default modal-dismiss">Cancel</button>
											</div>
										</div>
									</footer>
								</section>
							</div>

							<!-- Modal Full -->
							<a class="mb-1 mt-1 mr-1 modal-sizes btn btn-default" href="#modalFull">Full</a>

							<div id="modalFull" class="modal-block modal-block-full mfp-hide">
								<section class="card">
									<header class="card-header">
										<h2 class="card-title">Are you sure?</h2>
									</header>
									<div class="card-body">
										<div class="modal-wrapper">
											<div class="modal-text">
												<p class="mb-0">Are you sure that you want to delete this image?</p>
											</div>
										</div>
									</div>
									<footer class="card-footer">
										<div class="row">
											<div class="col-md-12 text-right">
												<button class="btn btn-primary modal-confirm">Confirm</button>
												<button class="btn btn-default modal-dismiss">Cancel</button>
											</div>
										</div>
									</footer>
								</section>
							</div>
						</div>
					</section>
					<section class="card">
						<header class="card-header">
							<div class="card-actions">
								<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
								<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
							</div>

							<h2 class="card-title">Modal with CSS animation</h2>
							<p class="card-subtitle">Animations are added with simple CSS transitions, you can make them look however you wish.</p>
						</header>
						<div class="card-body">
							<div class="row">
								<div class="col-lg-6">
									<a class="mb-1 mt-1 mr-1 modal-with-zoom-anim ws-normal btn btn-default" href="#modalAnim">Open with fade-zoom animation</a>
								</div>
								<div class="col-lg-6">
									<a class="mb-1 mt-1 mr-1 modal-with-move-anim ws-normal btn btn-default" href="#modalAnim">Open with fade-slide animation</a>
								</div>
							</div>

							<!-- Modal Animation -->
							<div id="modalAnim" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
								<section class="card">
									<header class="card-header">
										<h2 class="card-title">Are you sure?</h2>
									</header>
									<div class="card-body">
										<div class="modal-wrapper">
											<div class="modal-icon">
												<i class="fa fa-question-circle"></i>
											</div>
											<div class="modal-text">
												<p class="mb-0">Are you sure that you want to delete this image?</p>
											</div>
										</div>
									</div>
									<footer class="card-footer">
										<div class="row">
											<div class="col-md-12 text-right">
												<button class="btn btn-primary modal-confirm">Confirm</button>
												<button class="btn btn-default modal-dismiss">Cancel</button>
											</div>
										</div>
									</footer>
								</section>
							</div>

						</div>
					</section>
					<section class="card">
						<header class="card-header">
							<div class="card-actions">
								<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
								<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
							</div>

							<h2 class="card-title">Form</h2>
							<p class="card-subtitle">Modal with a form and buttons.</p>
						</header>
						<div class="card-body">
							<a class="modal-with-form btn btn-default" href="#modalForm">Open Form</a>

							<!-- Modal Form -->
							<div id="modalForm" class="modal-block modal-block-primary mfp-hide">
								<section class="card">
									<header class="card-header">
										<h2 class="card-title">Registration Form</h2>
									</header>
									<div class="card-body">
										<form>
											<div class="form-row">
												<div class="form-group col-md-6">
													<label for="inputEmail4">Email</label>
													<input type="email" class="form-control" id="inputEmail4" placeholder="Email">
												</div>
												<div class="form-group col-md-6 mb-3 mb-lg-0">
													<label for="inputPassword4">Password</label>
													<input type="password" class="form-control" id="inputPassword4" placeholder="Password">
												</div>
											</div>
											<div class="form-group">
												<label for="inputAddress">Address</label>
												<input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
											</div>
											<div class="form-group">
												<label for="inputAddress2">Address 2</label>
												<input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
											</div>
											<div class="form-row">
												<div class="form-group col-md-6">
													<label for="inputCity">City</label>
													<input type="text" class="form-control" id="inputCity">
												</div>
												<div class="form-group col-md-4">
													<label for="inputState">State</label>
													<select id="inputState" class="form-control">
														<option selected>Choose...</option>
														<option>...</option>
													</select>
												</div>
												<div class="form-group col-md-2">
													<label for="inputZip">Zip</label>
													<input type="text" class="form-control" id="inputZip">
												</div>
											</div>
										</form>
									</div>
									<footer class="card-footer">
										<div class="row">
											<div class="col-md-12 text-right">
												<button class="btn btn-primary modal-confirm">Submit</button>
												<button class="btn btn-default modal-dismiss">Cancel</button>
											</div>
										</div>
									</footer>
								</section>
							</div>

						</div>
					</section>
					<section class="card">
						<header class="card-header">
							<div class="card-actions">
								<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
								<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
							</div>

							<h2 class="card-title">Ajax</h2>
							<p class="card-subtitle">You have full control of what is displayed in modal, align it to any side via CSS, enable or disable scroll on right side of window.</p>
						</header>
						<div class="card-body">
							<a class="simple-ajax-modal btn btn-default" href="ajax/ui-elements-modals-ajax.html">Load Ajax Content</a>
						</div>
					</section>
				</div>
			</div>
			<!-- end: page -->
		</section>
	</div>

	<aside id="sidebar-right" class="sidebar-right">
		<div class="nano">
			<div class="nano-content">
				<a href="#" class="mobile-close d-md-none">
					Collapse <i class="fa fa-chevron-right"></i>
				</a>

				<div class="sidebar-right-wrapper">

					<div class="sidebar-widget widget-calendar">
						<h6>Upcoming Tasks</h6>
						<div data-plugin-datepicker data-plugin-skin="dark"></div>

						<ul>
							<li>
								<time datetime="2017-04-19T00:00+00:00">04/19/2017</time>
								<span>Company Meeting</span>
							</li>
						</ul>
					</div>

					<div class="sidebar-widget widget-friends">
						<h6>Friends</h6>
						<ul>
							<li class="status-online">
								<figure class="profile-picture">
									<img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
								</figure>
								<div class="profile-info">
									<span class="name">Joseph Doe Junior</span>
									<span class="title">Hey, how are you?</span>
								</div>
							</li>
							<li class="status-online">
								<figure class="profile-picture">
									<img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
								</figure>
								<div class="profile-info">
									<span class="name">Joseph Doe Junior</span>
									<span class="title">Hey, how are you?</span>
								</div>
							</li>
							<li class="status-offline">
								<figure class="profile-picture">
									<img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
								</figure>
								<div class="profile-info">
									<span class="name">Joseph Doe Junior</span>
									<span class="title">Hey, how are you?</span>
								</div>
							</li>
							<li class="status-offline">
								<figure class="profile-picture">
									<img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
								</figure>
								<div class="profile-info">
									<span class="name">Joseph Doe Junior</span>
									<span class="title">Hey, how are you?</span>
								</div>
							</li>
						</ul>
					</div>

				</div>
			</div>
		</div>
	</aside>
</section>

<!-- Vendor -->



<script src="vendor/common/common.js"></script>
<script src="vendor/nanoscroller/nanoscroller.js"></script>
<script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
<script src="vendor/jquery-placeholder/jquery-placeholder.js"></script>

<!-- Specific Page Vendor -->
<script src="vendor/select2/js/select2.js"></script>
<script src="vendor/pnotify/pnotify.custom.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="js/theme.js"></script>

<!-- Theme Custom -->
<script src="js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="js/theme.init.js"></script>

<!-- Examples -->
<script src="js/examples/examples.modals.js"></script>
</body>
</html>
@endsection

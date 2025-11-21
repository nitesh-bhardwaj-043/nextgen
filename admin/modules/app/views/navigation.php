<style>
	.panel-list li ul li {
		padding: 5px 20px 5px 20px;
	}
</style>
<div id="hoeapp-container" hoe-lpanel-effect="default">
	<aside id="hoe-left-panel" hoe-position-type="absolute">
		<div class="profile-box">
			<h5>Welcome! <b style="color: #06f"><?= $this->session->userdata('name'); ?></b></h5>
			<small>Administrator</small>
		</div>

		<ul class="nav panel-list">
			<li><a href="#/home" accesskey="h"><i class="fa fa-dashboard"></i>
					<span class="menu-text">Das<u><b>h</b></u>board</span><span class="selected"></span></a>
			</li>

			<li class="sidepadding"><a href="#/qr" accesskey="n"><i class="fa fa-credit-card"></i>
					<span class="menu-text">QR</span><span class="selected"></span></a>
			</li>

			<li class="sidepadding"><a href="#/request" accesskey="n"><i class="fa fa-tags"></i>
					<span class="menu-text">Request</span><span class="selected"></span></a>
			</li>

			<li class="sidepadding"><a href="#/transactions" accesskey="n"><i class="fa fa-tags"></i>
					<span class="menu-text">Transactions</span><span class="selected"></span></a>
			</li>
			<li class="sidepadding"><a href="#/users" accesskey="n"><i class="fa fa-tags"></i>
					<span class="menu-text">Users</span><span class="selected"></span></a>
			</li>
		</ul>
	</aside>
	<section id="main-content">
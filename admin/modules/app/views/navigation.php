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

			<li class="sidepadding"><a href="#/expenses" accesskey="n"><i class="fa fa-credit-card"></i>
					<span class="menu-text">Expenses</span><span class="selected"></span></a>
			</li>

			<li class="sidepadding"><a href="#/complaints" accesskey="n"><i class="fa fa-tags"></i>
					<span class="menu-text">Pending Complaints</span><span class="selected"></span></a>
			</li>

			<li class="sidepadding"><a href="#/fcomplaints" accesskey="n"><i class="fa fa-tags"></i>
					<span class="menu-text">Complaints</span><span class="selected"></span></a>
			</li>
			<li class="sidepadding"><a href="#/ccomplaints" accesskey="n"><i class="fa fa-tags"></i>
					<span class="menu-text">Completed Complaints</span><span class="selected"></span></a>
			</li>

			<li class="sidepadding"><a href="#/dealership" accesskey="n"><i class="fa fa-tags"></i>
					<span class="menu-text">Dealership</span><span class="selected"></span></a>
			</li>
		</ul>
	</aside>
	<section id="main-content">
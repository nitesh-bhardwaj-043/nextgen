<div class="heading">
	<ol class="breadcrumb">
		<li><a href="#/">Dashboard</a></li>
		<li><a href="javascript:void(0)">request</a></li>
	</ol>
</div>
<div class="col-sm-12 well">
	<div class="row">
		<div class="col-sm-6">
			<h4>Deposit Requests</h4>
			<div class="input-group custom_addon">
				<div class="input-group-addon" style="box-shadow:none; -webkit-box-shadow:none;">
					<i class="fa fa-search"></i>
				</div>
				<input type="text" ng-model="search_deposit" placeholder="Search deposits...">
			</div>
			<div class="table-data">
				<div class="table-responsive-custom">
					<table class="table table-hover">
						<thead>
							<tr class="active">
								<th>Sl No.</th>
								<th>User</th>
								<th>Amount</th>
								<th>UTR</th>
								<th>Photo</th>
								<th>Date</th>
								<th style="width:160px">Action</th>
							</tr>
						</thead>
						<tbody>
							<tr dir-paginate="y in datadb_deposit | filter: search_deposit | itemsPerPage: 10">
								<td>{{$index+1}}</td>
								<td>{{y.user_id}}</td>
								<td>{{y.amount}}</td>
								<td>{{y.utr}}</td>
								<td>
									<a href="javascript:void(0)" ng-if="y.image" ng-click="showImage(y.image)">
										<img ng-src="<?= base_url('uploads/') ?>{{y.image}}" alt="proof" style="height:40px;">
									</a>
								</td>
								<td>{{y.created_at}}</td>
								<td>
									<div ng-if="y.status == '0'">
										<button class="btn btn-success btn-xs" ng-click="approveDeposit(y.req_id)">Approve</button>
										<button class="btn btn-danger btn-xs" ng-click="disapproveDeposit(y.req_id)">Disapprove</button>
									</div>
									<div ng-if="y.status == '1'">
										<span class="label label-success">Approved</span>
									</div>
									<div ng-if="y.status == '2'">
										<span class="label label-danger">Disapproved</span>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<dir-pagination-controls boundary-links="true" template-url="app/pagination"></dir-pagination-controls>
		</div>

		<div class="col-sm-6">
			<h4>Withdraw Requests</h4>
			<div class="input-group custom_addon">
				<div class="input-group-addon" style="box-shadow:none; -webkit-box-shadow:none;">
					<i class="fa fa-search"></i>
				</div>
				<input type="text" ng-model="search_withdraw" placeholder="Search withdrawals...">
			</div>
			<div class="table-data">
				<div class="table-responsive-custom">
					<table class="table table-hover">
						<thead>
							<tr class="active">
								<th>Sl No.</th>
								<th>User</th>
								<th>Amount</th>
								<th>Date</th>
								<th style="width:160px">Action</th>
							</tr>
						</thead>
						<tbody>
							<tr dir-paginate="y in datadb_withdraw | filter: search_withdraw | itemsPerPage: 10">
								<td>{{$index+1}}</td>
								<td>{{y.user_id}}</td>
								<td>{{y.amount}}</td>
								<td>{{y.created_at}}</td>
								<td>
									<div ng-if="y.status == '0'">
										<button class="btn btn-success btn-xs" ng-click="approveWithdraw(y.req_id)">Approve</button>
										<button class="btn btn-danger btn-xs" ng-click="disapproveWithdraw(y.req_id)">Disapprove</button>
									</div>
									<div ng-if="y.status == '1'">
										<span class="label label-success">Approved</span>
									</div>
									<div ng-if="y.status == '2'">
										<span class="label label-danger">Disapproved</span>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<dir-pagination-controls boundary-links="true" template-url="app/pagination"></dir-pagination-controls>
		</div>
	</div>
</div>

<!-- Image Modal -->
<div id="imageModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Proof Image</h4>
			</div>
			<div class="modal-body text-center">
				<img ng-src="<?= base_url('uploads/') ?>{{modalImage}}" alt="proof" style="max-width:100%;">
			</div>
		</div>
	</div>
</div>
<style>
	.table-responsive-custom {
		width: 100%;
		overflow-x: auto;
		-webkit-overflow-scrolling: touch;
	}

	.table-responsive-custom table {
		min-width: 1000px;
	}
</style>
<div class="heading">
	<ol class="breadcrumb">
		<li><a href="#/">Dashboard</a></li>
		<li><a href="javascript:void(0)">Transactions</a></li>
	</ol>
</div>
<div class="col-sm-12 well">
	<div class="table_horizontal">
		<div class="row">
			<div class="col-xs-7 col-md-9">
				<div class="input-group custom_addon">
					<div class="input-group-addon" style="box-shadow:none; -webkit-box-shadow:none;">
						<i class="fa fa-search"></i>
					</div>
					<input type="text" ng-model="search_text" placeholder="Search here...">
				</div>
			</div>
			<div class="col-xs-5 col-md-3 text-right">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#transactionsModal">
					Add Transactions
				</button>
			</div>
		</div>
	</div>
	<div class="table-data">
		<div class="table-responsive-custom">
			<table class="table table-hover">
				<thead>
					<tr class="active">
						<th>Sl No.</th>
						<th>Customer Name</th>
						<th>Firm Name</th>
						<th>City</th>
						<th>Product</th>
						<th>Qty</th>
						<th>Complaint Number</th>
						<th>Date</th>
						<th style="width:85px">Action</th>
					</tr>
				</thead>
				<tbody>
					<tr dir-paginate="y in datadb | filter: search_text | itemsPerPage: 10">
						<td>{{$index+1}}</td>
						<td>{{y.c_name}}</td>
						<td>{{y.f_name}}</td>
						<td>{{y.city}}</td>
						<td>{{y.product}}</td>
						<td>{{y.qty}}</td>
						<td>{{y.c_no}}</td>
						<td>{{y.c_date}}</td>
						<td>
							<div style="height:25px;width:25px;border-radius:50%;background:red" ng-if="y.status == '0'">
							</div>
							<div style="height:25px;width:25px;border-radius:50%;background:green" ng-if="y.status == '1'">
							</div>
						</td>
						<td>
							<a href="javascript:void(0)" ng-click="update_call(y)" data-toggle="modal"
								data-target=".bs-example-modal-sm">
								<span class="fa fa-pencil fa-2x"></span>
							</a>
							&nbsp;&nbsp;
							<a href="javascript:void(0)" style="color:red" ng-click="delete_data(y.c_id)">
								<span class="fa fa-trash fa-2x"></span>
							</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-sm-12">
		<dir-pagination-controls boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)"
			template-url="app/pagination"></dir-pagination-controls>
	</div>
</div>

<div class="modal fade" id="transactionsModal" tabindex="-1" role="dialog" aria-labelledby="transactionsModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" ng-click="close_modal()">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="transactionsModalLabel">Add Transaction</h4>
			</div>

			<div class="modal-body" style="max-height:70vh; overflow-y:auto;">
				<?php $this->load->view('form'); ?>
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
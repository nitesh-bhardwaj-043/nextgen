<div class="heading">
	<ol class="breadcrumb">
		<li><a href="#/">Dashboard</a></li>
		<li><a href="javascript:void(0)">Users</a></li>
	</ol>
</div>
<div class="col-sm-12 well">
	<div class="table_horizontal">
		<div class="row">
			<div class="col-xs-12">
				<div class="input-group custom_addon">
					<div class="input-group-addon" style="box-shadow:none; -webkit-box-shadow:none;">
						<i class="fa fa-search"></i>
					</div>
					<input type="text" ng-model="search_text" placeholder="Search here...">
				</div>
			</div>
		</div>
	</div>
	<div class="table-data">
		<div class="table-responsive-custom">
			<table class="table table-hover">
				<thead>
					<tr class="active">
						<th>Sl No.</th>
						<th>Name</th>
						<th>Phone</th>
						<th>Email</th>
						<th>Wallet</th>
						<th>UPI ID</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
					<tr dir-paginate="y in datadb | filter: search_text | itemsPerPage: 10">
						<td>{{$index+1}}</td>
						<td>{{y.name}}</td>
						<td>{{y.phone}}</td>
						<td>{{y.email}}</td>
						<td>{{y.amount}}</td>
						<td>{{y.upi_id || "-"}}</td>
						<td>{{y.created_at}}</td>
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
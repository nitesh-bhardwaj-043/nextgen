 <div class="col-sm-12 well">
 	<div class="col-sm-12">
 		<form name="form1" id="form1" method="post" action="" autocomplete="off">
 			<input type="text" name="c_id" ng-model="x.c_id" hidden>

 			<div class="col-sm-12 mb-2">
 				<label>Name</label>
 				<input name="c_name" class="form-control" ng-model="x.c_name" autofocus>
 			</div>
 			<div class="col-sm-12 mb-2">
 				<label>Firm Name</label>
 				<input name="f_name" class="form-control" ng-model="x.f_name" autofocus>
 			</div>
 			<div class="col-sm-12 mb-2">
 				<label>City</label>
 				<input name="city" class="form-control" ng-model="x.city" autofocus>
 			</div>
 			<div class="col-sm-12 mb-2">
 				<label>Product</label>
 				<input name="product" class="form-control" ng-model="x.product" autofocus>
 			</div>
 			<div class="col-sm-12 mb-2">
 				<label>Qty</label>
 				<input name="qty" class="form-control" ng-model="x.qty" autofocus>
 			</div>
 			<div class="col-sm-12 mb-2">
 				<label>Complaint Number</label>
 				<input name="c_no" class="form-control" ng-model="x.c_no" autofocus>
 			</div>
 			<div class="col-sm-12 mb-2">
 				<label>Date</label>
 				<input name="c_date" type="date" class="form-control" ng-model="x.c_date" autofocus>
 			</div>

 			<div class="col-sm-12 mb-2">
 				<label for="">Status</label>
 				<div class="form-control" style="height: auto; padding: 8px 12px;">
 					<input type="checkbox" class="form-check-input" id="status" name="status" ng-model="x.status">
 					<label class="form-check-label" for="status">Active</label>
 				</div>
 			</div>

 			<div class="clearfix"></div>

 			<div class="col-sm-12">
 				<div id="webprogress" style="display: none">
 					<img src="<?= base_url() ?>/assets/images/progress/load.gif">
 				</div>
 				<button type="submit" id="submitbtn" accesskey="s" ng-click="save_data(x)" class="btn btn-info"
 					ng-disabled="form1.$invalid">
 					<u><b>S</b></u>ave
 				</button>
 				<a class="btn btn-default" accesskey="c" ng-click="filter_new()"><u><b>C</b></u>lear</a>
 				<br><br>
 			</div>
 		</form>
 	</div>
 </div>

 <style>
 	.form-check {
 		display: block;
 		width: 100%;
 		height: 34px;
 		padding: 6px 12px;
 		font-size: 14px;
 		line-height: 1.42857143;
 		color: #555;
 		background-color: #fff;
 		background-image: none;
 		border: 1px double #fff;
 		border-radius: 4px;
 	}

 	.mb-2 {
 		margin-bottom: 10px;
 	}

 	.star-rating {
 		display: flex;
 		align-items: center;
 		gap: 5px;
 	}

 	.star-rating input[type="radio"] {
 		display: none;
 	}

 	.star-rating label {
 		font-size: 24px;
 		color: #ddd;
 		cursor: pointer;
 		transition: color 0.2s;
 	}

 	.star-rating input[type="radio"]:checked~label,
 	.star-rating label:hover,
 	.star-rating label:hover~label {
 		color: #ffc107;
 	}

 	.star-rating {
 		flex-direction: row-reverse;
 		justify-content: flex-end;
 	}

 	.star-rating input[type="radio"]:checked~label,
 	.star-rating input[type="radio"]:checked~label~label {
 		color: #ffc107;
 	}

 	.star-rating label:hover,
 	.star-rating label:hover~label {
 		color: #ffc107;
 	}
 </style>
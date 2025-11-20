<div class="inner-content">
    <div class="panel theme-panel">
        <div class="panel-heading bg-primary text-white p-3 rounded-top">
            <h2 class="m-0"><i class="fa fa-tachometer-alt me-2"></i> Dashboard</h2>
        </div>
        <div class="panel-body bg-white p-4 rounded-bottom shadow-sm">
            <div class="row g-4">
            
                <!-- Newly Arrived Products -->
                <div class="col-md-3 column" ui-sref="complaints">
                    <div class="feature-box shadow-sm text-center p-4 rounded bg-light-blue">
                        <span class="feature-icon text-blue"><i class="fa fa-archive fa-2x"></i></span>
                        <h5 class="mt-2">Pending Complaints</h5>
                        <label><b>{{complaints}}</b> items</label>
                    </div>
                </div>
                <div class="col-md-3 column" ui-sref="fcomplaints">
                    <div class="feature-box shadow-sm text-center p-4 rounded bg-light-blue">
                        <span class="feature-icon text-blue"><i class="fa fa-archive fa-2x"></i></span>
                        <h5 class="mt-2">Complaints</h5>
                        <label><b>{{complaints}}</b> items</label>
                    </div>
                </div>
                <div class="col-md-3 column" ui-sref="ccomplaints">
                    <div class="feature-box shadow-sm text-center p-4 rounded bg-light-blue">
                        <span class="feature-icon text-blue"><i class="fa fa-archive fa-2x"></i></span>
                        <h5 class="mt-2">Completed Complaints</h5>
                        <label><b>{{ccomplaints}}</b> items</label>
                    </div>
                </div>

                <!-- Company Expenses -->
                <div class="col-md-3 column" ui-sref="expenses">
                    <div class="feature-box shadow-sm text-center p-4 rounded bg-light-blue">
                        <span class="feature-icon text-blue"><i class="fa fa-credit-card fa-2x"></i></span>
                        <h5 class="mt-2">Expenses</h5>
                        <label><b>{{expenses}}</b> items</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Theme Colors */
    .text-blue {
        color: #0d6efd; /* Bootstrap primary blue */
    }
    .bg-light-blue {
        background: #f0f7ff; /* light blue shade */
        transition: 0.3s ease-in-out;
    }
    .bg-light-blue:hover {
        background: #8dbdf7ff; /* slightly darker on hover */
        transform: translateY(-5px);
    }
    .panel {
        border-radius: 12px;
        overflow: hidden;
    }
    .feature-box h5 {
        font-weight: 600;
        color: #0d3c61;
    }
    .feature-box label {
        color: #3b5d7a;
        font-size: 14px;
    }
    .column {
        cursor: pointer;
    }
</style>

<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Weighing | Synctronix - Weighing System</title>
    <?php include 'layouts/title-meta.php'; ?>

    <!-- jsvectormap css -->
    <link href="assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery Validate plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    
    <?php include 'layouts/head-css.php'; ?>

</head>

<?php include 'layouts/body.php'; ?>

<div class="loading" id="spinnerLoading" style="display:none">
  <div class='mdi mdi-loading' style='transform:scale(0.79);'>
    <div></div>
  </div>
</div>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="h-100">
                            <div class="row mb-3 pb-1">
                                <div class="col-12">
                                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                        <div class="flex-grow-1">
                                            <!--h4 class="fs-16 mb-1">Good Morning, Anna!</h4>
                                            <p class="text-muted mb-0">Here's what's happening with your store
                                                today.</p-->
                                        </div>
                                    </div><!-- end card header -->
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->

                            <div class="col-xxl-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="javascript:void(0);">
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="mb-3">
                                                        <label for="fromDateSearch" class="form-label">From Date</label>
                                                        <input type="date" class="form-control flatpickrStart" data-provider="flatpickr" id="fromDateSearch">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="mb-3">
                                                        <label for="toDateSearch" class="form-label">To Date</label>
                                                        <input type="date" class="form-control flatpickrEnd" data-provider="flatpickr" id="toDateSearch">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="mb-3">
                                                        <label for="reportType" class="form-label">Status</label>
                                                        <select id="reportType" name="reportType" class="form-select" data-choices data-choices-sorting="true" >
                                                            <option value="Customer" selected>Customer</option>
                                                            <option value="Driver">Driver</option>
                                                            <option value="Destination">Destination</option>
                                                            <option value="Product">Product</option>
                                                            <option value="Supplier">Supplier</option>
                                                            <option value="Transporter">Transporter</option>
                                                            <option value="Unit">Unit</option>
                                                            <option value="User">User</option>
                                                            <option value="Vehicle">Vehicle</option>
                                                            <option value="Plant">Plant</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-3 inputCode customerInput">
                                                    <div class="mb-3">
                                                        <label for="customerCode" class="form-label">Customer Code</label>
                                                        <input type="text" class="form-control" placeholder="Customer Code" name="customerCode" id="customerCode">
                                                    </div>
                                                </div>
                                                <div class="col-3 inputCode driverInput" style="display:none">
                                                    <div class="mb-3">
                                                        <label for="driverCode" class="form-label">Driver Code</label>
                                                        <input type="text" class="form-control" placeholder="Driver Code" name="driverCode" id="driverCode">
                                                    </div>
                                                </div>
                                                <div class="col-3 inputCode destinationInput" style="display:none">
                                                    <div class="mb-3">
                                                        <label for="destinationCode" class="form-label">Destination Code</label>
                                                        <input type="text" class="form-control" placeholder="Destination Code" name="destinationCode" id="destinationCode">
                                                    </div>
                                                </div>
                                                <div class="col-3 inputCode productInput" style="display:none">
                                                    <div class="mb-3">
                                                        <label for="productCode" class="form-label">Product Code</label>
                                                        <input type="text" class="form-control" placeholder="Product Code" name="productCode" id="productCode">
                                                    </div>
                                                </div>
                                                <div class="col-3 inputCode supplierInput" style="display:none">
                                                    <div class="mb-3">
                                                        <label for="supplierCode" class="form-label">Supplier Code</label>
                                                        <input type="text" class="form-control" placeholder="Supplier Code" name="supplierCode" id="supplierCode">
                                                    </div>
                                                </div>
                                                <div class="col-3 inputCode transporterInput" style="display:none">
                                                    <div class="mb-3">
                                                        <label for="transporterCode" class="form-label">Transporter Code</label>
                                                        <input type="text" class="form-control" placeholder="Transporter Code" name="transporterCode" id="transporterCode">
                                                    </div>
                                                </div>
                                                <div class="col-3 inputCode userInput" style="display:none">
                                                    <div class="mb-3">
                                                        <label for="userCode" class="form-label">User Code</label>
                                                        <input type="text" class="form-control" placeholder="User Code" name="userCode" id="userCode">
                                                    </div>
                                                </div>
                                                <div class="col-3 inputCode unitInput" style="display:none">
                                                    <div class="mb-3">
                                                        <label for="unit" class="form-label">Unit</label>
                                                        <input type="text" class="form-control" placeholder="Unit Code" name="unit" id="unit">
                                                    </div>
                                                </div>
                                                <div class="col-3 inputCode vehicleInput" style="display:none">
                                                    <div class="mb-3">
                                                        <label for="vehicleNo" class="form-label">Vehicle No</label>
                                                        <input type="text" class="form-control" placeholder="Vehicle No" name="vehicleNo" id="vehicleNo">
                                                    </div>
                                                </div>
                                                <div class="col-3 inputCode plantInput" style="display:none">
                                                    <div class="mb-3">
                                                        <label for="plantCode" class="form-label">Plant Code</label>
                                                        <input type="text" class="form-control" placeholder="Plant Code" name="plantCode" id="plantCode">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">  
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                </div>                                                                                                                                                                                                                                                                                                                                        
                                                <div class="col-3">
                                                    <div class="text-end mt-4">
                                                        <button type="button" class="btn btn-success" id="searchLog">
                                                            <i class="bx bx-search-alt"></i>
                                                            Search</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>                                                                        
                                    </div>
                                </div>
                            </div>
                            
                            <button type="button" hidden id="successBtn" data-toast data-toast-text="Welcome Back ! This is a Toast Notification" data-toast-gravity="top" data-toast-position="center" data-toast-duration="3000" data-toast-close="close" class="btn btn-light w-xs">Top Center</button>
                            <button type="button" hidden id="failBtn" data-toast data-toast-text="Welcome Back ! This is a Toast Notification" data-toast-gravity="top" data-toast-position="center" data-toast-duration="3000" data-toast-close="close" class="btn btn-light w-xs">Top Center</button>

                            <div class="row">
                                <div class="col-xl-3 col-md-6 add-new-weight">

                                    <!-- /.modal-dialog -->
                                    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add New Transporter</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" id="transporterForm" class="needs-validation" novalidate autocomplete="off">
                                                        <div class=" row col-12">
                                                            <div class="col-xxl-12 col-lg-12">
                                                                <div class="card bg-light">
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-xxl-12 col-lg-12 mb-3">
                                                                                <div class="row">
                                                                                    <label for="transporterCode" class="col-sm-4 col-form-label">Transporter Code</label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="text" class="form-control" id="transporterCode" name="transporterCode" placeholder="Transporter Code" required>
                                                                                        <div class="invalid-feedback">
                                                                                            Please fill in the field.
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xxl-12 col-lg-12 mb-3">
                                                                                <div class="row">
                                                                                    <label for="companyRegNo" class="col-sm-4 col-form-label">Company Reg No</label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="text" class="form-control" id="companyRegNo" name="companyRegNo" placeholder="Company Reg No">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xxl-12 col-lg-12 mb-3">
                                                                                <div class="row">
                                                                                    <label for="companyName" class="col-sm-4 col-form-label">Company Name</label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Customer Code">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xxl-12 col-lg-12 mb-3">
                                                                                <div class="row">
                                                                                    <label for="addressLine1" class="col-sm-4 col-form-label">Address Line 1</label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="text" class="form-control" id="addressLine1" name="addressLine1" placeholder="Address Line 1">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xxl-12 col-lg-12 mb-3">
                                                                                <div class="row">
                                                                                    <label for="addressLine2" class="col-sm-4 col-form-label">Address Line 2</label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="text" class="form-control" id="addressLine2" name="addressLine2" placeholder="Address Line 2">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xxl-12 col-lg-12 mb-3">
                                                                                <div class="row">
                                                                                    <label for="addressLine3" class="col-sm-4 col-form-label">Address Line 3</label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="text" class="form-control" id="addressLine3" name="addressLine3" placeholder="Address Line 3">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xxl-12 col-lg-12 mb-3">
                                                                                <div class="row">
                                                                                    <label for="phoneNo" class="col-sm-4 col-form-label">Phone No</label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="text" class="form-control" id="phoneNo" name="phoneNo" placeholder="Phone No">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xxl-12 col-lg-12 mb-3">
                                                                                <div class="row">
                                                                                    <label for="faxNo" class="col-sm-4 col-form-label">Fax No</label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="text" class="form-control" id="faxNo" name="faxNo" placeholder="Fax No">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <input type="hidden" class="form-control" id="id" name="id">                                                                                                                                                         
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        
                                                        <div class="col-lg-12">
                                                            <div class="hstack gap-2 justify-content-end">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-success" id="submitTransporter">Submit</button>
                                                            </div>
                                                        </div><!--end col-->                                                               
                                                    </form>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                </div>
                            </div> <!-- end row-->

                            <div class="row">
                                <div class="col">
                                    <div class="h-100">
                                        <!--datatable--> 
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header" style="background-color: #405189;">
                                                        <div class="d-flex justify-content-between">
                                                            <div>
                                                                <h5 class="card-title text-white mb-0">Previous Records</h5>
                                                            </div>
                                                            <!-- <div class="flex-shrink-0">
                                                                <button type="button" id="addTransporter" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addModal">
                                                                <i class="ri-add-circle-line align-middle me-1"></i>
                                                                Add New Transporter
                                                                </button>
                                                            </div>  -->
                                                        </div> 
                                                    </div>
                                                    <div class="card-body">
                                                        <table id="dataTable" class="table table-bordered nowrap table-striped align-middle" style="width:100%">
                                                            <thead>
                                                                <tr id="headerRow">
                                                                <!-- Column names will be dynamically updated here -->
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <!-- Table rows will be dynamically updated here -->
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--end row-->
                                    </div> <!-- end .h-100-->
                                </div> <!-- end col -->
                            </div><!-- container-fluid -->

                        </div> <!-- end .h-100-->
                    </div> <!-- end col -->
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?php include 'layouts/footer.php'; ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->




    <?php include 'layouts/customizer.php'; ?>

    <?php include 'layouts/vendor-scripts.php'; ?>

    <!--Swiper slider js-->
    <script src="assets/libs/swiper/swiper-bundle.min.js"></script>

    <!-- Dashboard init -->
    <script src="assets/js/pages/dashboard-ecommerce.init.js"></script>   
    <script src="assets/js/pages/form-validation.init.js"></script>
    <!-- App js -->
    <script src="assets/js/app.js"></script>

    <!-- prismjs plugin -->
    <script src="assets/libs/prismjs/prism.js"></script>

    <!-- notifications init -->
    <script src="assets/js/pages/notifications.init.js"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="assets/js/pages/datatables.init.js"></script>



<script type="text/javascript">

var table;

$(function () {
    
    $('#reportType').on('change', function(){
        if($(this).val() == "Customer")
        {
            $('.inputCode').hide();
            $('.customerInput').show();
        }
        if($(this).val() == "Driver")
        {
            $('.inputCode').hide();
            $('.driverInput').show();
        }
        else if($(this).val() == "Destination")
        {
            $('.inputCode').hide();
            $('.destinationInput').show();
        }
        else if($(this).val() == "Product")
        {
            $('.inputCode').hide();
            $('.productInput').show();
        }
        else if($(this).val() == "Supplier")
        {
            $('.inputCode').hide();
            $('.productInput').show();
        }
        else if($(this).val() == "Transporter")
        {
            $('.inputCode').hide();
            $('.transporterInput').show();
        }
        else if($(this).val() == "Unit")
        {
            $('.inputCode').hide();
            $('.unitInput').show();
        }
        else if($(this).val() == "User")
        {
            $('.inputCode').hide();
            $('.userInput').show();
        }
        else if($(this).val() == "Vehicle")
        {
            $('.inputCode').hide();
            $('.vehicleInput').show();
        }
        else if($(this).val() == "Plant")
        {
            $('.inputCode').hide();
            $('.plantInput').show();
        }
    });

    var startDate = new Date();
    startDate.setDate(startDate.getDate() - 1);

    $(".flatpickrStart").flatpickr({
        defaultDate: new Date(startDate), 
        dateFormat: "y-m-d"
    });

    $(".flatpickrEnd").flatpickr({
        defaultDate: new Date(), 
        dateFormat: "y-m-d"
    });
    

        // Handle change event of the dropdown list
        $('#searchLog').click(function() {
            var selectedValue = $('#reportType').val();
            // Call a function to update the DataTable based on the selected value
            updateDataTable(selectedValue);
        });

        // Function to update the DataTable
        function updateDataTable(selectedValue) {

                $.ajax({
                    url: "php/filterAuditLog.php",
                    type: "POST",
                    data: { 
                        selectedValue: selectedValue,
                        fromDateSearch: $('#fromDateSearch').val(),
                        toDateSearch: $('#toDateSearch').val(),
                        customerCode: $('#customerCode').val(),
                        destinationCode: $('#destinationCode').val(),
                        driverCode: $('#driverCode').val(),
                        supplierCode: $('#supplierCode').val(),
                        userCode: $('#userCode').val(),
                        productCode: $('#productCode').val(),
                        transporterCode: $('#transporterCode').val(),
                        plantCode: $('#plantCode').val(),
                        unit: $('#unit').val(),
                        vehicleNo: $('#vehicleNo').val(),
                    },
                    success: function(data) {

                        if (table) {
                            table.destroy();
                        }
                        // Once you receive the updated DataTable from the server, update the HTML table
                        var dataTable = data.dataTable;
                        var columnNames = data.columnNames;

                        var headerRow = $("#headerRow");
                        headerRow.empty();

                        // Update the column names
                        $.each(columnNames, function(index, columnName) {
                        var th = $("<th>").text(columnName);
                        headerRow.append(th);
                        });

                        var tableBody = $("#dataTable tbody");
                        tableBody.empty();

                        $.each(dataTable, function(index, item) {
                        var row = $("<tr>");
                        $.each(columnNames, function(index, columnName) {
                            var cell = $("<td>").text(item[columnName]);
                            row.append(cell);
                        });
                        tableBody.append(row);
                        });

                        // table.draw();
                        table = $("#dataTable").DataTable();
                    },
                    error: function(error) {
                        console.log("Error occurred while fetching the updated DataTable.");
                    }
                });
            
        }

});

</script>
    </body>

    </html>
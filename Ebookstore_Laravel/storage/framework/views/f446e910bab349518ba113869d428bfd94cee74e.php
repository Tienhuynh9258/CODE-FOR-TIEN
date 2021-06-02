<?php $__env->startPush('styles'); ?>
<style>
    .header-admin {
        display: flex;
        justify-content: center;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    ul {
        font-size:20px;
    }

    ul > li:hover {
        color: #3490dc;
    }

    ul > li > a{
        display: block;
        text-decoration: none;
    }

    .header {
        border-bottom: 1px solid #636b6f;
    }

</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('title', 'Admin page'); ?>
<?php $__env->startSection('content'); ?>
    <nav class="navbar navbar-expand-lg bg-light p-0">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('home')); ?>">Logout</a>
            </li>
        </ul>
    </nav>
    <div class='container'>
        <h1 class='header-admin'>Admin Dashboard</h1>
        <ul class="list-group">
            <li class="list-group-item"><a href='#import-books'><i class="fas fa-file-import"></i>  Import books</a></li>
            <li class="list-group-item"><a href='#import-wh'><i class="fas fa-file-import"></i>  Import/Export Into Warehouse</a></li>
            <li class="list-group-item"><a href='#process-transaction'><i class="fas fa-file-import"></i> Process Error Online Transaction</a></li>
            <li class="list-group-item"><a href='#report'><i class="fas fa-chart-bar"></i>  Report</a></li>
        </ul>
        <div id='import-books' class='mt-5'>
            <h3 class='header'>Import books</h3>
            <div class='mt-3'>
                <form>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">ISBN</span>
                        </div>
                        <input type="text" class="form-control" placeholder="ISBN" id='isbn'>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Title</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Book title" id='title'>
                    </div>
                   
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Field</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Book field" id='field'>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Price</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Book price" id='price'>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Publisher name</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Publisher name" id='publisher'>
                    </div>    

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Author</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Author" id='author'>
                    </div>    
                    
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Image</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Link image" id='image'>
                    </div>
                    <button class='btn btn-primary float-right' id='save-import-book'>Save</button>
                </form>
            </div>
        </div>

        <div id='import-wh' class='mt-5'>
            <h3 class='header'>Import/Export into Warehouse</h3>
            <div class='mt-3'>
                <form>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Warehouse name</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Warehouse Name" id='WH1'>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Employee ID</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Employee" id='Em1'>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Import Quantity</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Import Quantity" id='Im1'>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Export Quantity</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Export Quantity" id='Ex1'>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">ISBN</span>
                        </div>
                        <input type="text" class="form-control" placeholder="ISBN" id='ISBN1'>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Date Import/Export</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Date" id='Date1'>
                    </div>
                    <button class='btn btn-primary float-right' id='save-import-wh'>Save</button>
                </form>
            </div>
        </div>

        <div id='process-transaction' class='mt-5'>
            <h3 class='header'>Process Error Online Transaction</h3>
            <div class='mt-3'>
                <form>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Transaction Date</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Date" id='Date2'>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Customer ID</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Customer" id='Cus2'>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Status to Edit :WAITING,EXPORT,SUCCESS</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Status" id='Status2'>
                    </div>
                    <button class='btn btn-primary float-right' id='process-trans'>Process</button>
                </form>
            </div>
        </div>
        <div class='clearfix'></div>
        <div id='report' class='mt-4'>
            <h3 class='header'>Reports</h3>
            <form>
                <h5>Xem tất cả các sách tính theo ISBN được mua trong một ngày.</h5>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Date</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Select date" id='date-view-isbn'>
                </div>
                <button class='btn btn-primary' id='b-i4'>View</button>
                <h4 id='i4'></h4>
                <h5>Xem tổng số sách tính theo mỗi ISBN được mua trong một ngày.</h5>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Date</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Select date" id='date-view-isbn5'>
                </div>
                <button class='btn btn-primary' id='b-i5'>View</button>
                <h4 id='i5'></h4>
                <h5>Xem tổng số sách truyền thống tính theo mỗi ISBN được mua trong một ngày.</h5>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Date</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Select date" id='date-view-isbn6'>
                </div>
                <button class='btn btn-primary' id='b-i6'>View</button>
                <h4 id='i6'></h4>
                <h5>Xem tổng số sách điện tử được mua trong một ngày.</h5>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Date</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Select date" id='date-view-isbn7'>
                </div>
                <button class='btn btn-primary' id='b-i7'>View</button>
                <h4 id='i7'></h4>
                <h5>Xem tổng số sách điện tử được thuê trong một ngày.</h5>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Date</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Select date" id='date-view-isbn8'>
                </div>
                <button class='btn btn-primary' id='b-i8'>View</button>
                <h4 id='i8'></h4>
                <h5>Xem danh sách tác giả có số sách được mua nhiều nhất trong một ngày.</h5>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Date</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Select date" id='date-view-isbn9'>
                </div>
                <button class='btn btn-primary' id='b-i9'>View</button>
                <h4 id='i9'></h4>
                <h5>Xem danh sách tác giả có số sách được mua nhiều nhất trong một tháng.</h5>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Month & Year</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Select Month & Year" id='month-year-view-isbn10'>
                </div>
                <button class='btn btn-primary' id='b-i10'>View</button>
                <h4 id='i10'></h4>
                <h5>Xem danh sách sách được mua nhiều nhất trong một tháng.</h5>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Month & Year</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Select Month & Year" id='month-year-view-isbn11'>
                </div>
                <button class='btn btn-primary' id='b-i11'>View</button>
                <h4 id='i11'></h4>
                <h5>Xem danh sách mua hàng được thanh toán bằng thẻ trong một ngày.</h5>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Date</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Select date" id='date-view-isbn12'>
                </div>
                <button class='btn btn-primary' id='b-i12'>View</button>
                <h4 id='i12'></h4>
                <h5>Xem danh sách mua hàng được thanh toán bằng thẻ gặp sự cố trong một ngày.</h5>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Date</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Select date" id='date-view-isbn13'>
                </div>
                <button class='btn btn-primary' id='b-i13'>View</button>
                <h4 id='i13'></h4>
                <h5>Xem danh sách kho hàng có số sách tính theo mỗi ISBN dưới N quyển. </h5>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">ISBN and Quantity</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Select isbn and quantity" id='date-view-isbn14'>
                </div>
                <button class='btn btn-primary' id='b-i14'>View</button>
                <h4 id='i14'></h4>
                <h5>Xem danh sách kho hàng được xuất kho nhiều nhất trong một tháng.</h5>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Date</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Select time range" id='time-view-isbn16'>
                </div>
                <button class='btn btn-primary' id='b-i16'>View</button>
                <h4 id='i16'></h4>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function() {
   
    $('#b-i4').click(function(e){
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('getAllIsbn')); ?>",
            method: "GET",
            data: {
                dateneed: $('#date-view-isbn').val()
            },
            dataType: "json",
            success: function(data) {
                //console.log(data);
                //return;
                if(data.length){
                    let e = `<table class='table table-hover mt-2 table-bordered'>
                                <thead>
                                    <tr>
                                        <td>ISBN</td>
                                        <td>Title</td>
                                    </tr>
                                </thead><tbody>`
                    $.each(data, function(key, val){
                        e += `<tr>
                                <td>${val.ISBN}</td>
                                <td>${val.TITLE}</td>
                            </tr>`;
                    })
                    $('#i4').html(e + '</tbody></table>');
                }
                else
                    $('#i4').html("<div class='mt-2'>Empty!</div>");
            }
        });
    });
    $('#b-i5').click(function(e){
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('getSumOfISBN')); ?>",
            method: "GET",
            data: {
                dateneed: $('#date-view-isbn5').val()
            },
            dataType: "json",
            success: function(data) {
                //console.log(data);
                //return;
                if(data.length){
                    let e = `<table class='table table-hover mt-2 table-bordered'>
                                <thead>
                                    <tr>
                                        <td>ISBN</td>
                                        <td>Sum of quantity</td>
                                    </tr>
                                </thead><tbody>`
                    $.each(data, function(key, val){
                        e += `<tr>
                                <td>${val.ISBN}</td>
                                <td>${val.sum_qty}</td>
                            </tr>`;
                    })
                    $('#i5').html(e + '</tbody></table>');
                }
                else
                    $('#i5').html("<div class='mt-2'>Empty!</div>");
            }
        });
    });
    $('#b-i6').click(function(e){
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('getSumOfTradi')); ?>",
            method: "GET",
            data: {
                dateneed: $('#date-view-isbn6').val()
            },
            dataType: "json",
            success: function(data) {
                if(data.length){
                    let e = `<table class='table table-hover mt-2 table-bordered'>
                                <thead>
                                    <tr>
                                        <td>ISBN</td>
                                        <td>Quantity of traditional books</td>
                                    </tr>
                                </thead><tbody>`
                    $.each(data, function(key, val){
                        e += `<tr>
                                <td>${val.ISBN}</td>
                                <td>${val.sum_qty}</td>
                            </tr>`;
                    })
                    $('#i6').html(e + '</tbody></table>');
                }
                else
                    $('#i6').html("<div class='mt-2'>Empty!</div>");
            }
        });
    });
    $('#b-i7').click(function(e){
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('getSumOfEbookBuy')); ?>",
            method: "GET",
            data: {
                dateneed: $('#date-view-isbn7').val()
            },
            dataType: "json",
            success: function(data) {
                if(data.length){
                    let e = `<table class='table table-hover mt-2 table-bordered'>
                                <thead>
                                    <tr>
                                        <td>ISBN</td>
                                        <td>Quantity of Ebooks Buy</td>
                                    </tr>
                                </thead><tbody>`
                    $.each(data, function(key, val){
                        e += `<tr>
                                <td>${val.ISBN}</td>
                                <td>${val.sum_qty}</td>
                            </tr>`;
                    })
                    $('#i7').html(e + '</tbody></table>');
                }
                else
                    $('#i7').html("<div class='mt-2'>Empty!</div>");
            }
        });
    });
    $('#b-i8').click(function(e){
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('getSumOfEbookBorrow')); ?>",
            method: "GET",
            data: {
                dateneed: $('#date-view-isbn8').val()
            },
            dataType: "json",
            success: function(data) {
                if(data.length){
                    let e = `<table class='table table-hover mt-2 table-bordered'>
                                <thead>
                                    <tr>
                                        <td>ISBN</td>
                                        <td>Quantity of Ebooks Borrow</td>
                                    </tr>
                                </thead><tbody>`
                    $.each(data, function(key, val){
                        e += `<tr>
                                <td>${val.ISBN}</td>
                                <td>${val.sum_qty}</td>
                            </tr>`;
                    })
                    $('#i8').html(e + '</tbody></table>');
                }
                else
                    $('#i8').html("<div class='mt-2'>Empty!</div>");
            }
        });
    });
    $('#b-i9').click(function(e){
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('getAuListDate')); ?>",
            method: "GET",
            data: {
                dateneed: $('#date-view-isbn9').val()
            },
            dataType: "json",
            success: function(data) {
                if(data.length){
                    let e = `<table class='table table-hover mt-2 table-bordered'>
                                <thead>
                                    <tr>
                                        <td>ID of author</td>
                                        <td>Name of author</td>
                                        <td>Totaltransaction of author</td>
                                        <td>Totalbook of author</td>
                                    </tr>
                                </thead><tbody>`
                    $.each(data, function(key, val){
                        e += `<tr>
                                <td>${val.id}</td>
                                <td>${val.aname}</td>
                                <td>${val.total_transaction}</td>
                                <td>${val.quantity_book}</td>
                            </tr>`;
                    })
                    $('#i9').html(e + '</tbody></table>');
                }
                else
                    $('#i9').html("<div class='mt-2'>Empty!</div>");
            }
        });
    });
    $('#b-i10').click(function(e){
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('getAuListMonth')); ?>",
            method: "GET",
            data: {
                monthneed: $('#month-year-view-isbn10').val().split('-')[1],
                yearneed: $('#month-year-view-isbn10').val().split('-')[0]
            },
            dataType: "json",
            success: function(data) {
                if(data.length){
                    let e = `<table class='table table-hover mt-2 table-bordered'>
                                <thead>
                                    <tr>
                                        <td>ID of author</td>
                                        <td>Name of author</td>
                                        <td>Totaltransaction of author</td>
                                        <td>Totalbook of author</td>
                                    </tr>
                                </thead><tbody>`
                    $.each(data, function(key, val){
                        e += `<tr>
                                <td>${val.id}</td>
                                <td>${val.aname}</td>
                                <td>${val.total_transaction}</td>
                                <td>${val.quantity_book}</td>
                            </tr>`;
                    })
                    $('#i10').html(e + '</tbody></table>');
                }
                else
                    $('#i10').html("<div class='mt-2'>Empty!</div>");
            }
        });
    });
    $('#b-i11').click(function(e){
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('getBookListMonth')); ?>",
            method: "GET",
            data: {
                monthneed: $('#month-year-view-isbn11').val().split('-')[1],
                yearneed: $('#month-year-view-isbn11').val().split('-')[0]
            },
            dataType: "json",
            success: function(data) {
                if(data.length){
                    let e = `<table class='table table-hover mt-2 table-bordered'>
                                <thead>
                                    <tr>
                                        <td>ISBN</td>
                                        <td>Title</td>
                                    </tr>
                                </thead><tbody>`
                    $.each(data, function(key, val){
                        e += `<tr>
                                <td>${val.ISBN}</td>
                                <td>${val.TITLE}</td>
                            </tr>`;
                    })
                    $('#i11').html(e + '</tbody></table>');
                }
                else
                    $('#i11').html("<div class='mt-2'>Empty!</div>");
            }
        });
    });
    $('#b-i12').click(function(e){
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('getTransactionCreditDay')); ?>",
            method: "GET",
            data: {
                dateneed: $('#date-view-isbn12').val()
            },
            dataType: "json",
            success: function(data) {
                if(data.length){
                    let e = `<table class='table table-hover mt-2 table-bordered'>
                                <thead>
                                    <tr>
                                        <td>Customer ID</td>
                                        <td>Purchased Date and time</td>
                                        <td>Total Cost</td>
                                    </tr>
                                </thead><tbody>`
                    $.each(data, function(key, val){
                        e += `<tr>
                                <td>${val.CID}</td>
                                <td>${val.PURCHASED_DATE}</td>
                                <td>${val.TOTAL}</td>
                            </tr>`;
                    })
                    $('#i12').html(e + '</tbody></table>');
                }
                else
                    $('#i12').html("<div class='mt-2'>Empty!</div>");
            }
        });
    });
    $('#b-i13').click(function(e){
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('getErrorTransactionDay')); ?>",
            method: "GET",
            data: {
                dateneed: $('#date-view-isbn13').val()
            },
            dataType: "json",
            success: function(data) {
                if(data.length){
                    let e = `<table class='table table-hover mt-2 table-bordered'>
                                <thead>
                                    <tr>
                                        <td>Customer ID</td>
                                        <td>Purchased Date and time</td>
                                        <td>Total Cost</td>
                                    </tr>
                                </thead><tbody>`
                    $.each(data, function(key, val){
                        e += `<tr>
                                <td>${val.CID}</td>
                                <td>${val.PURCHASED_DATE}</td>
                                <td>${val.TOTAL}</td>
                            </tr>`;
                    })
                    $('#i13').html(e + '</tbody></table>');
                }
                else
                    $('#i13').html("<div class='mt-2'>Empty!</div>");
            }
        });
    });
    $('#b-i14').click(function(e){
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('getWHhaveISBNlessthanN')); ?>",
            method: "GET",
            data: {
                ISBN:$('#date-view-isbn14').val().split(',')[0],
                N: $('#date-view-isbn14').val().split(',')[1]
            },
            dataType: "json",
            success: function(data) {
                if(data.length){
                    let e = `<table class='table table-hover mt-2 table-bordered'>
                                <thead>
                                    <tr>
                                        <td>Warehouse Name</td>
                                    </tr>
                                </thead><tbody>`
                    $.each(data, function(key, val){
                        e += `<tr>
                                <td>${val.WNAME}</td>
                            </tr>`;
                    })
                    $('#i14').html(e + '</tbody></table>');
                }
                else
                    $('#i14').html("<div class='mt-2'>Empty!</div>");
            }
        });
    });
    $('#b-i16').click(function(e){
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('getWHExportMost')); ?>",
            method: "GET",
            data: {
                from_time: $('#time-view-isbn16').val().split('/')[0],
                next_time: $('#time-view-isbn16').val().split('/')[1]
            },
            dataType: "json",
            success: function(data) {
                if(data.length){
                    let e = `<table class='table table-hover mt-2 table-bordered'>
                                <thead>
                                    <tr>
                                        <td>Name of warehouse</td>
                                    </tr>
                                </thead><tbody>`
                    $.each(data, function(key, val){
                        e += `<tr>
                                <td>${val.WHNAME}</td>
                            </tr>`;
                    })
                    $('#i16').html(e + '</tbody></table>');
                }
                else
                    $('#i16').html("<div class='mt-2'>Empty!</div>");
            }
        });
    });
    $('#save-import-book').click(function(e){
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('saveImportBooks')); ?>",
            method: "POST",
            data: {
                isbn: $('#isbn').val(),
                title: $('#title').val(),
                field: $('#field').val(),
                price: $('#price').val(),
                publisher: $('#publisher').val(),
                author: $('#author').val(),
                image_url: $('#image_url').val()
            },
            dataType: "json",
            success: function(data) {
                if(data.status){
                    toastr.success('Import success!');
                    $("input").val('');
                }
                else
                    toastr.error('Import fail!');
            }
        });
    });
    $('#save-import-wh').click(function(e){
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('saveImportWH')); ?>",
            method: "POST",
            data: {
                WH: $('#WH1').val(),
                EID: $('#Em1').val(),
                Im_Qty: $('#Im1').val(),
                Ex_Qty: $('#Ex1').val(),
                ISBN_up: $('#ISBN1').val(),
                Date_im_ex: $('#Date1').val()
            },
            dataType: "json",
            success: function(data) {
                if(data.status){
                    toastr.success('Import/Export success!');
                    $("input").val('');
                }
                else
                    toastr.error('Import/Export fail!');
            }
        });
    });
    $('#process-trans').click(function(e){
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('processTransaction')); ?>",
            method: "POST",
            data: {
                pdate: $('#Date2').val(),
                id: $('#Cus2').val(),
                status_in: $('#Status2').val()
            },
            dataType: "json",
            success: function(data) {
                if(data.status){
                    toastr.success('Process success!');
                    $("input").val('');
                }
                else
                    toastr.error('Process fail!');
            }
        });
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Ebookstore_Laravel\resources\views/admin.blade.php ENDPATH**/ ?>
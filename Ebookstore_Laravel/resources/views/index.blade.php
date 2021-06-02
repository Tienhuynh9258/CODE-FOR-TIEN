@extends('layouts.app')
@push('styles')
<style>

</style>
@endpush
@section('title', 'eBookStore')
@section('nav')
    @include('layouts.partials.nav')
@endsection
@section('slider')
    @include('layouts.partials.slider')
@endsection
@section('content')
    <div class="container mt-4" style='min-height:500px'>
        <h3 style='border-bottom:2px solid #636b6f' id='books-header'>All books</h3>
        <div class='d-flex align-items-center mt-4'>
            <span style='width:200px'><i class="fas fa-filter"></i> Filter by:</span>
            <div class="dropdown mr-4">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    Category
                </button>
                <div class="dropdown-menu mt-2" id='filter-by-cate'>
                    <a class="dropdown-item" href="javascript:void(0)">VAN HOC NUOC NGOAI</a>
                    <a class="dropdown-item" href="javascript:void(0)">TIEU THUYET</a>
                    <a class="dropdown-item" href="javascript:void(0)">VAN HOC</a>
                    <a class="dropdown-item" href="javascript:void(0)">CONG NGHE</a>
                    <a class="dropdown-item" href="javascript:void(0)">CODE</a>
                    <a class="dropdown-item" href="javascript:void(0)">KHOA HOC</a>
                    <a class="dropdown-item" href="javascript:void(0)">SACH NGOAI NGU</a>
                    <a class="dropdown-item" href="javascript:void(0)">NAU AN</a>
                    <a class="dropdown-item" href="javascript:void(0)">TRUYEN TRANH</a>
                    <a class="dropdown-item" href="javascript:void(0)">GIAO DUC</a>
                    <a class="dropdown-item" href="javascript:void(0)">LICH SU</a>
                    <a class="dropdown-item" href="javascript:void(0)">CON NGUOI</a>
                    <a class="dropdown-item" href="javascript:void(0)">KHTN</a>
                </div>
            </div>
            <div class="dropdown mr-4">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    Author
                </button>
                <div class="dropdown-menu mt-2" id='filter-by-author'>
                    <a class="dropdown-item" href="javascript:void(0)">Robert Martin</a>
                    <a class="dropdown-item" href="javascript:void(0)">J. K. Rowling</a>
                    <a class="dropdown-item" href="javascript:void(0)">Fujiko F Fujio</a>
                    <a class="dropdown-item" href="javascript:void(0)">Stephen Hawking</a>
                    <a class="dropdown-item" href="javascript:void(0)">Richard Dawkins</a>
                    <a class="dropdown-item" href="javascript:void(0)">Dr Alice Roberts</a>
                    <a class="dropdown-item" href="javascript:void(0)">Anthony Molinaro</a>
                </div>
            </div>
            <div class="dropdown mr-4">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    Publish year
                </button>
                <div class="dropdown-menu mt-2" id='filter-by-publish-year'>
                    <a class="dropdown-item" href="javascript:void(0)">2007</a>
                    <a class="dropdown-item" href="javascript:void(0)">2008</a>
                    <a class="dropdown-item" href="javascript:void(0)">2010</a>
                    <a class="dropdown-item" href="javascript:void(0)">2013</a>
                    <a class="dropdown-item" href="javascript:void(0)">2015</a>
                    <a class="dropdown-item" href="javascript:void(0)">2017</a>
                    <a class="dropdown-item" href="javascript:void(0)">2018</a>
                    <a class="dropdown-item" href="javascript:void(0)">2019</a>
                    <a class="dropdown-item" href="javascript:void(0)">2020</a>
                    <a class="dropdown-item" href="javascript:void(0)">2021</a>
                </div>
            </div>
            <div class="dropdown mr-4">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    Authors by cate
                </button>
                <div class="dropdown-menu mt-2" id='filter-author-by-cate'>
                <a class="dropdown-item" href="javascript:void(0)">VAN HOC NUOC NGOAI</a>
                    <a class="dropdown-item" href="javascript:void(0)">TIEU THUYET</a>
                    <a class="dropdown-item" href="javascript:void(0)">VAN HOC</a>
                    <a class="dropdown-item" href="javascript:void(0)">CONG NGHE</a>
                    <a class="dropdown-item" href="javascript:void(0)">CODE</a>
                    <a class="dropdown-item" href="javascript:void(0)">KHOA HOC</a>
                    <a class="dropdown-item" href="javascript:void(0)">SACH NGOAI NGU</a>
                    <a class="dropdown-item" href="javascript:void(0)">NAU AN</a>
                    <a class="dropdown-item" href="javascript:void(0)">TRUYEN TRANH</a>
                    <a class="dropdown-item" href="javascript:void(0)">GIAO DUC</a>
                    <a class="dropdown-item" href="javascript:void(0)">LICH SU</a>
                    <a class="dropdown-item" href="javascript:void(0)">CON NGUOI</a>
                    <a class="dropdown-item" href="javascript:void(0)">KHTN</a>
                </div>
            </div>
            <div class='w-100'>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search books" id='keyword'>
                    <div class="input-group-append">
                        <span class="input-group-text" id='search-bar' style='cursor: pointer'>
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div id='list-books'>
            @foreach($books as $key => $book)
                @if($key%2==0)
                    <div class="row mt-5">
                        <div class="col-sm-6">
                            <div class="card shadow">
                                <div class="card-body" data-isbn="{{$book->ISBN}}">
                                    <img class="card-img-top" src="{{$book->IMAGE_URL}}" alt="Harry Potter" height='700' width='400'>
                                    <h5 class="card-title mt-3"><strong>{{$book->TITLE}}</strong></h5>
                                    <p class="card-text">Publisher: {{$book->PUBLISHER_NAME}}</p>
                                    <p class="card-text">Description: test</p>
                                    <p class="card-text">Price: <strong>{{$book->PRICE}}</strong> VND</p>
                                    <a href="javascript:void(0)" class="btn btn-danger add-to-cart"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                                </div>
                            </div>
                        </div>
                @else
                        <div class="col-sm-6">
                            <div class="card shadow">
                                <div class="card-body" data-isbn="{{$book->ISBN}}">
                                    <img class="card-img-top" src="{{$book->IMAGE_URL}}" alt="Harry Potter" height='700' width='400'>
                                    <h5 class="card-title mt-3"><strong>{{$book->TITLE}}</strong></h5>
                                    <p class="card-text">Publisher: {{$book->PUBLISHER_NAME}}</p>
                                    <p class="card-text">Description: test</p>
                                    <p class="card-text">Price: <strong>{{$book->PRICE}}</strong> VND</p>
                                    <a href="javascript:void(0)" class="btn btn-danger add-to-cart"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class='float-right mt-5 pagination'>
            {{ $books->links() }}
        </div>
    </div>
@endsection
@push('scripts')
<script>
$(document).ready(function() {
    function renderFilterResult(data){
        let e = `<h4 class='mt-4'>Found ${data.length} result.</h4>`;
        if(data.length==1){
            e += `<div class="row mt-5">
                    <div class="col-sm-6">
                        <div class="card shadow">
                            <div class="card-body" data-isbn=${data[0].ISBN}>
                                <img class="card-img-top" src="${data[0].IMAGE_URL}" alt="Harry Potter" height='700' width='400'>
                                <h5 class="card-title mt-3"><strong>${data[0].TITLE}</strong></h5>
                                <p class="card-text">Publisher: ${data[0].PUBLISHER_NAME}</p>
                                <p class="card-text">Description: test</p>
                                <p class="card-text">Price: <strong>${data[0].PRICE}</strong> VND</p>
                                <a href="javascript:void(0)" class="btn btn-danger add-to-cart"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>`;
        }
        else{
            $.each(data, function(key, val){
                if(key%2==0)
                    e += `<div class="row mt-5">
                            <div class="col-sm-6">
                                <div class="card shadow">
                                    <div class="card-body" data-isbn=${val.ISBN}>
                                        <img class="card-img-top" src="${val.IMAGE_URL}" alt="Harry Potter" height='700' width='400'>
                                        <h5 class="card-title mt-3"><strong>${val.TITLE}</strong></h5>
                                        <p class="card-text">Publisher: ${val.PUBLISHER_NAME}</p>
                                        <p class="card-text">Description: test</p>
                                        <p class="card-text">Price: <strong>${val.PRICE}</strong> VND</p>
                                        <a href="javascript:void(0)" class="btn btn-danger add-to-cart"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                                    </div>
                                </div>
                            </div>`;
                else
                    e += `<div class="col-sm-6">
                                <div class="card shadow">
                                    <div class="card-body" data-isbn=${val.ISBN}>
                                        <img class="card-img-top" src="${val.IMAGE_URL}" alt="Harry Potter" height='700' width='400'>
                                        <h5 class="card-title mt-3"><strong>${val.TITLE}</strong></h5>
                                        <p class="card-text">Publisher: ${val.PUBLISHER_NAME}</p>
                                        <p class="card-text">Description: test</p>
                                        <p class="card-text">Price: <strong>${val.PRICE}</strong> VND</p>
                                        <a href="javascript:void(0)" class="btn btn-danger add-to-cart"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>`;
            });
        }
        $('.pagination').remove();
        return e;
    }

    $('#filter-by-cate a').click(function(){
        const bfield = $(this).text();
        $.ajax({
            url: "{{ route('getAllByCategory') }}",
            method: "GET",
            data: {
                bfield
            },
            dataType: "json",
            success: function(data) {
                $('#list-books').html(renderFilterResult(data));
            }
        });
    });

    $('#filter-by-author a').click(function(){
        const aname = $(this).text();
        $.ajax({
            url: "{{ route('getAllByAuthor') }}",
            method: "GET",
            data: {
                aname
            },
            dataType: "json",
            success: function(data) {
                $('#list-books').html(renderFilterResult(data));
            }
        });
    });

    $('#filter-by-publish-year a').click(function(){
        const pyear = $(this).text();
        $.ajax({
            url: "{{ route('getAllByPublishYear') }}",
            method: "GET",
            data: {
                pyear
            },
            dataType: "json",
            success: function(data) {
                $('#list-books').html(renderFilterResult(data));
            }
        });
    });

    $('#filter-author-by-cate a').click(function(){
        const bfield = $(this).text();
        $.ajax({
            url: "{{ route('getAllAuthorByCate') }}",
            method: "GET",
            data: {
                bfield
            },
            dataType: "json",
            success: function(data) {//$('#list-books').html(renderFilterResult(data));
                $('.pagination').remove();
                let e = `<h4 class='mt-4'>Found ${data.length} author.</h4>`;
                e += `<table class='table table-hover mt-2 table-bordered'>
                            <thead>
                                <tr>
                                    <td>Author</td>
                                    <td>Book title</td>
                                    <td>Publisher name</td>
                                </tr>
                            </thead><tbody>`;
                $.each(data, function(key, val){
                    e += `<tr>
                            <td>${val.ANAME}</td>
                            <td>${val.TITLE}</td>
                            <td>${val.PUBLISHER_NAME}</td>
                        </tr>`;
                });
                $('#list-books').html(e + '</tbody></table>');
            }
        });
    });

    $('#search-bar').click(function(){
        const keyword = $('#keyword').val();;
        $.ajax({
            url: "{{ route('getAllByKey') }}",
            method: "GET",
            data: {
                keyword
            },
            dataType: "json",
            success: function(data) {
                $('#list-books').html(renderFilterResult(data));
            }
        });
    });

    $('.shop-now').click(function(){
        $('#books-header')[0].scrollIntoView({
            behavior: "smooth",
            block: "start"
        });
    });

    $(document).on('click', '.add-to-cart', function(){
        let isLogin = 0;
        @if(session()->has('cid'))
            isLogin = 1;
        @endif
        if(!isLogin)
            $('#login-form').modal('show');
        else{
            toastr.success('Add success!');
            $('#lblCartCount').text(parseInt($('#lblCartCount').text()) + 1);
            let data = $(this).parent().children();
            let isbn = $(this).parent().attr('data-isbn');
            var sub = parseInt($('#totalLabel').text());
            var len = data.eq(4).text().length;
            var bprice = parseInt(data.eq(4).text().substr(7,len-11));
            $('#totalLabel').text(sub+bprice);
            let e = `<div class='d-flex mb-4'>
                        <img src=${data.eq(0).attr('src')} style='width:200px;height:150px'>
                        <div class='w-75 ml-3 mr-3' style='overflow:hidden'>
                            <h5><strong>${data.eq(1).text()}</strong></h5>
                            <h6><strong>${data.eq(4).text()}</strong></h6>
                            <a href="javascript:void(0)" id="remove-${isbn}">Remove</a>
                        </div>
                        <div class='w-25 mr-3 d-flex align-items-center justify-content-center'>
                            <div class="input-group" style='width:120px'>
                                <div class="input-group-prepend" style='cursor:pointer' onclick="decTotal(this)">
                                    <span class="input-group-text">-</span>
                                </div>
                                <input type="text" class="form-control" value='1' id="totalBuy">
                                <div class="input-group-append" style='cursor:pointer' onclick="incTotal(this)">
                                    <span class="input-group-text">+</span>
                                </div>
                            </div>
                        </div>
                        <input type='hidden' value=${isbn} id="isbn">
                    </div>`;
            $('#cart > div > div > div.modal-body').append(e);
        }
    });
    $('#payment').click(function(e){
        e.preventDefault();
        // let isbnList = [];
        $.ajax({
            url: "{{ route('payment') }}",
            method: "POST",
            data: {
                isbn: $('#isbn').val(),
                total: $('#totalBuy').val(),
                cid: "{{session()->get('cid')}}", 
                _token : $('meta[name="csrf-token"]').attr('content')
            },
            dataType: "json",
            success: function(data) {
                if(data.status)
                    toastr.success('Thank you!');
                else
                    toastr.error('Something error!');
            }
        });
    });
    $(document).on('click', "[id^='remove']", function(){
        $('.cart-header').text(`Your cart (0)`);
        $('#lblCartCount').text(0);
        $('#payment').prop('disabled', true);
        $(this).parent().parent().remove();
    });
});
function decTotal(t){
    $(t).parent().children().eq(1).val($(t).parent().children().eq(1).val() - 1);

}
function incTotal(t){
    $(t).parent().children().eq(1).val(parseInt($(t).parent().children().eq(1).val()) + 1);
}
</script>
@endpush

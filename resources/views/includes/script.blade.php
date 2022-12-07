<!-- JAVASCRIPT -->
<script src="{{ asset('/') }}assets/libs/jquery/jquery.min.js"></script>
<script src="{{ asset('/') }}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/') }}assets/libs/metismenu/metisMenu.min.js"></script>
<script src="{{ asset('/') }}assets/libs/simplebar/simplebar.min.js"></script>
<script src="{{ asset('/') }}assets/libs/node-waves/waves.min.js"></script>

<!-- apexcharts -->
<script src="{{ asset('/') }}assets/libs/apexcharts/apexcharts.min.js"></script>

<script src="{{ asset('/') }}assets/js/pages/dashboard.init.js"></script>

<!-- Required datatable js -->
<script src="{{ asset('/') }}assets//libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('/') }}assets//libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="{{ asset('/') }}assets//libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('/') }}assets//libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}assets//libs/jszip/jszip.min.js"></script>
<script src="{{ asset('/') }}assets//libs/pdfmake/build/pdfmake.min.js"></script>
<script src="{{ asset('/') }}assets//libs/pdfmake/build/vfs_fonts.js"></script>
<script src="{{ asset('/') }}assets//libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('/') }}assets//libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('/') }}assets//libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="{{ asset('/') }}assets//libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('/') }}assets//libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="{{ asset('/') }}assets//js/pages/datatables.init.js"></script>
<script src="{{ asset('/') }}assets/libs/select2/js/select2.min.js"></script>
<script src="{{ asset('/') }}assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('/') }}assets/libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="{{ asset('/') }}assets/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="{{ asset('/') }}assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="{{ asset('/') }}assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="{{ asset('/') }}assets/libs/%40chenfengyuan/datepicker/datepicker.min.js"></script>
<!-- Summernote js -->
<script src="{{ asset('/') }}assets/libs/summernote/summernote-bs4.min.js"></script>
<!-- init js -->
<script src="{{ asset('/') }}assets/js/pages/form-editor.init.js"></script>
<!-- form advanced init -->
<script src="{{ asset('/') }}assets/js/pages/form-advanced.init.js"></script>

<!-- App js -->
<script src="{{ asset('/') }}assets/js/app.js"></script>

<script>
    {{--$('.select2').select2({--}}
    {{--    width: '100%',--}}
    {{--});--}}
    {{--var colorSizeIndex = 1;--}}
    {{--$(document).on('click', '#sizeColorAddNewButton', function (){--}}
    {{--    $.ajax({--}}
    {{--        type: 'GET',--}}
    {{--        url: "{{ url('get-all-color-and-size') }}",--}}
    {{--        data: '',--}}
    {{--        dataType: 'json',--}}
    {{--        success: function (res) {--}}
    {{--            var tr = '';--}}
    {{--            tr += '<tr>';--}}
    {{--            tr += '<td>';--}}
    {{--            tr += '<select class="form-control" name="color_size['+colorSizeIndex+'][size]">';--}}
    {{--            tr += '<option value="" disabled selected>---Select Size---</option>';--}}
    {{--            $.each(res.sizes, function (key, value) {--}}
    {{--                tr += '<option value="'+value.id+'">'+value.name+'</option>';--}}
    {{--            });--}}
    {{--            tr += '</select>';--}}
    {{--            tr += '</td>';--}}

    {{--            tr += '<td>';--}}
    {{--            tr += '<select class="select2 form-control select2-multiple my-select2" name="color_size['+colorSizeIndex+'][color][]" multiple="multiple" data-placeholder="Select Product Color">';--}}
    {{--            $.each(res.colors, function (key, value) {--}}
    {{--                tr += '<option value="'+value.id+'">'+value.name+'</option>';--}}
    {{--            });--}}
    {{--            tr += '</select>';--}}
    {{--            tr += '</td>';--}}

    {{--            tr += '<td>';--}}
    {{--            tr += '<button  type="button" class="btn btn-danger size-color-remove-button">remove</button>';--}}
    {{--            tr += '</td>';--}}
    {{--            tr += '</tr>';--}}
    {{--            $('#tbodyRes').append(tr);--}}
    {{--            $('.my-select2').select2({--}}
    {{--                width: '100%',--}}
    {{--            });--}}
    {{--            colorSizeIndex++;--}}
    {{--        }--}}
    {{--    });--}}
    {{--});--}}

    $(document).on('change', '#categoryId', function (){
        var categoryId = $(this).val();
        $.ajax({
            type: 'GET',
            url: "{{ url('get-sub-category-by-category') }}",
            data: {id: categoryId},
            dataType: 'json',
            success: function (res) {
                var selectElement = $('#subCategoryId');
                selectElement.empty();
                var option = '';
                option += '<option value="" selected disabled>---Select Sub Category---</option>';
                $.each(res, function (key, value) {
                    option += '<option value="'+value.id+'">'+value.name+'</option>';
                });
                selectElement.append(option);
            }
        });
    });
    var stockAddIndex = 500;
    $(document).on('click', '#addStockBtn', function (){
        $.ajax({
            type: 'GET',
            url: "{{ url('get-all-data-for-stock') }}",
            data: '',
            dataType: 'json',
            success: function (res) {
                var tr = '';
                tr += '<tr>';
                tr += '<td>';
                tr += '<select class="form-control select2 my-select2" name="stock['+stockAddIndex+'][supplier]">';
                tr += '<option value="" disabled selected>---Select Supplier---</option>';
                $.each(res.suppliers, function (key, value) {
                    tr += '<option value="'+value.id+'">'+value.company_name+'</option>';
                });
                tr += '</select>';
                tr += '</td>';

                tr += '<td>';
                tr += '<select class="form-control select2 my-select2 inventory-itm-select" name="stock['+stockAddIndex+'][product]" data-id="'+stockAddIndex+'">';
                tr += '<option value="" disabled selected>---Select Product---</option>';
                $.each(res.products, function (key, value) {
                    tr += '<option value="'+value.id+'">'+value.name+'</option>';
                });
                tr += '</select>';
                tr += '</td>';

                tr += '<td>';
                tr += '<select class="select2 form-control select2-multiple my-select2" id="size'+stockAddIndex+'" name="stock['+stockAddIndex+'][size][]" multiple="multiple" data-placeholder="Select Product Size">';
                $.each(res.sizes, function (key, value) {
                    tr += '<option value="'+value.id+'">'+value.name+'</option>';
                });
                tr += '</select>';
                tr += '</td>';

                tr += '<td>';
                tr += '<select class="select2 form-control select2-multiple my-select2" id="color'+stockAddIndex+'" name="stock['+stockAddIndex+'][color][]" multiple="multiple" data-placeholder="Select Product Color">';
                $.each(res.colors, function (key, value) {
                    tr += '<option value="'+value.id+'">'+value.name+'</option>';
                });
                tr += '</select>';
                tr += '</td>';

                tr += '<td>';
                tr += '<input type="number" class="form-control inventory-unit-price" data-id="'+stockAddIndex+'" name="stock['+stockAddIndex+'][unit_price]" min="1" id="unitPrice'+stockAddIndex+'"/>';
                tr += '</td>';
                tr += '<td>';
                tr += '<input type="number" class="form-control inventory-take-amount" data-id="'+stockAddIndex+'" name="stock['+stockAddIndex+'][stock_amount]" min="1" id="stockAmount'+stockAddIndex+'"/>';
                tr += '</td>';
                tr += '<td>';
                tr += '<input type="number" class="form-control inventory-total-amount" data-id="'+stockAddIndex+'" name="stock['+stockAddIndex+'][total_price]" min="1" readonly id="totalPrice'+stockAddIndex+'" />';
                tr += '</td>';

                tr += '<td>';
                tr += '<button  type="button" class="btn btn-danger btn-sm stock-remove-button">-</button>';
                tr += '</td>';
                tr += '</tr>';
                $('#stockTbody').append(tr);
                $('.my-select2').select2({
                width: '100%',
                });
                stockAddIndex++;
            }
        });
    });
    $(document).on('click', '.stock-remove-button', function () {
        $(this).closest('tr').remove();
    });
    $(document).on('change', '.inventory-itm-select', function () {
        var id = $(this).val();
        var dataid = $(this).attr('data-id');
        $.ajax({
            type: 'GET',
            url: "{{ url('get-product-data-for-stock') }}",
            data: {id: id},
            dataType: 'json',
            success: function (res) {
                var sizeSelect = $('#size'+dataid);
                var colorSelect = $('#color'+dataid);
                var unitPrice = $('#unitPrice'+dataid);
                sizeSelect.empty();
                colorSelect.empty();

                var optionSize = '';
                $.each(res.sizes, function (key, value) {
                    optionSize += '<option value="'+value.id+'">'+value.name+'</option>';
                });
                sizeSelect.append(optionSize);


                var optionColor = '';
                $.each(res.colors, function (key, value) {
                    optionColor += '<option value="'+value.id+'">'+value.name+'</option>';
                });
                colorSelect.append(optionColor);

                unitPrice.val(res.price);
            }
        });
    });

    $(document).on('keyup', '.inventory-take-amount', function () {
        var dataId = $(this).attr('data-id');
        var stockAmount = $(this).val();

        var unitPrice = $('#unitPrice'+dataId).val();
        var itmTotalPrice = stockAmount * unitPrice;
        $('#totalPrice'+dataId).val(itmTotalPrice);
    });

    $(document).on('keyup', '.inventory-unit-price', function () {
        var dataId = $(this).attr('data-id');
        var unitPrice = $(this).val();

        var stockAmount = $('#stockAmount'+dataId).val();
        var itmTotalPrice = unitPrice * stockAmount;
        $('#totalPrice'+dataId).val(itmTotalPrice);
    });

</script>

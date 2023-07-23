


var Roles = function () {
    var view_tbl;
    var view_url = base_url + prefix + '/academic_years';
    var list_url = base_url + prefix + '/academic_years/list';
    var get_url = base_url + prefix + '/academic_years/get-school-rates';
    var post_url = base_url + prefix + '/academic_years/update-school-rates';
    var table_id = '#academic_years_table';
    /////////////////// View //////////////////
    ///////////////////////////////////////////
    var viewTable = function () {
        var link = list_url;
        var columns = [
            {"data": "index", "title": "#", "orderable": false, "searchable": false},
            {"data": "name", "orderable": true, "searchable": true},
            {"data": "actions", "orderable": false, "searchable": false, "class" : "text-center"}
        ];
        var perPage = 25;
        var order = [[1, 'desc']];

        var ajaxFilter = function (d) {
            d.name = $('#name').val();
        };

        view_tbl = DataTable.init($(table_id), link, columns, order, ajaxFilter, perPage);
    };
    /////////////////// ADD ///////////////////
    ///////////////////////////////////////////
    var add = function () {
        $('#frmAdd').submit(function(e) {
            e.preventDefault();
            var link = $(this).attr('action');
            var formData = $(this).serialize();
            var method = $(this).attr('method');

            Forms.doAction(link, formData, method, null, addCallBack);
        });
    };

    var addCallBack = function (obj) {
        if(obj.code === 200) {
            var delay = 1750;

            setTimeout(function () {
                window.location = view_url;
            }, delay);
        }
    };
    /////////////////// EDIT //////////////////
    ///////////////////////////////////////////
    var edit = function () {
        $('#frmEdit').submit(function(e) {
            e.preventDefault();
            var link = $(this).attr('action');
            var formData = $(this).serialize();
            var method = $(this).attr('method');
            Forms.doAction(link, formData, method, null, editCallBack);
        });
    };

    var editCallBack = function (obj) {
        if(obj.code === 200) {
            var delay = 1750;

            setTimeout(function () {
                window.location = view_url;
            }, delay);
        }
    };
    //////////////// DELETE ///////////////////
    ///////////////////////////////////////////
    var deleteItem = function () {
        $(document).on('click', '.delete_btn', function (e) {
            e.preventDefault();
            var btn = $(this);

            Common.confirm(function() {
                var link = btn.data('url');
                var formData = {};
                var method = "GET";

                Forms.doAction(link, formData, method, view_tbl);
            });
        });
    };
    //////////////// Search ///////////////////
    ///////////////////////////////////////////
    var search = function () {
        $('.searchable').on('input change', function (e) {
            e.preventDefault();
            view_tbl.draw(false);
        });

        $('.search').on('click', function (e) {
            e.preventDefault();
            view_tbl.draw(false);
        });

        $('#frmSearch').keydown(function (e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                view_tbl.draw(false);
            }
        });
    };
    /////////////////// Get Acceptance Rates By School ///////////////////
    ///////////////////////////////////////////
    var fetchRates = function () {
        let year_id = $('#id').val();
        $('#school_id').on('change', function (){
            let school_id = $(this).val();
            $('.acceptance_rates_table input').val('');
            var formData = new FormData();
            formData.append('school_id', school_id);
            formData.append('year_id', year_id);
            $.ajax({
                type: 'post',
                url: get_url,
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
            }).done(function (data) {
                data.data.forEach(element => $('#grade_' + element.grade_id).val(element.accept_avg));
                notify(data.title, Common.getNotificationType(data.code), data.message);
            });
        });
        $('#school_id').change();
    };
    /////////////////// Submit School Acceptance Rates ///////////////////
    ///////////////////////////////////////////
    var submitRates = function () {
        let year_id = $('#id').val();
        $('.save').on('click', function (){
            let school_id = $(this).val();
            var formData = new FormData();
            var rates = new Array();
            $('.acceptance_rates_table tbody tr').each(function (){
                var year_id = $('#id').val();
                var school_id = $('#school_id').val();
                var grade_id = $(this).find('input').data('grade-id');
                var accept_avg = $(this).find('input').val();
                var item = {
                    year_id: year_id,
                    school_id: school_id,
                    grade_id: grade_id,
                    accept_avg: accept_avg,
                }
                rates.push(item);
            });
            formData.append('rates', JSON.stringify(rates));

            $.ajax({
                type: 'post',
                url: post_url,
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
            }).done(function (data) {
                notify(data.title, Common.getNotificationType(data.code), data.message);

                console.log(data);
            });
        });
    };
    ///////////////// INITIALIZE //////////////
    ///////////////////////////////////////////
    return {
        init: function () {
            viewTable();
            add();
            edit();
            deleteItem();
            search();
            fetchRates();
            submitRates();
        }
    }
}();

$(document).ready(function() {
    Roles.init();
});

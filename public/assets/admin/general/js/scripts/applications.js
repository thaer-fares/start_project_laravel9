


var Users = function () {

    var view_tbl;
    var view_url = base_url + prefix + '/applications';
    var list_url = base_url + prefix + '/applications/list';
    var status_url = base_url + prefix + '/applications/status';
    var table_id = '#applications_table';
    /////////////////// View //////////////////
    ///////////////U////////////////////////////
    var viewTable = function () {
        var link = list_url;
        var columns = [
            {"data": "index", "title": "#", "orderable": false, "searchable": false},
            // {"data": "created_at", "orderable": true, "searchable": true},
            {"data": "identity_no", "orderable": true, "searchable": true},
            {"data": "full_name", "orderable": true, "searchable": true},
            {"data": "father_mobile", "orderable": false, "searchable": true},
            {"data": "email", "orderable": false, "searchable": false},
            {"data": "status", "orderable": false, "searchable": false},
            {"data": "actions", "orderable": false, "searchable": false, "class" : "text-center"}
        ];
        var perPage = 25;
        var order = [[1, 'desc']];

        var ajaxFilter = function (d) {
            d.identity_no = $('#identity_no').val();
            // d.status = $('#status').val();
        };

        view_tbl = DataTable.init($(table_id), link, columns, order, ajaxFilter, perPage);
    };
    /////////////////// ADD ///////////////////
    ///////////////////////////////////////////
    var add = function () {
        $('#frmAdd').submit(function(e) {
            e.preventDefault();
            var link = $(this).attr('action');
            // var formData = $(this).formData();
            var formData = new FormData(this);
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
            // var formData = $(this).serialize();
            // var formData = $(this).formData();
             var formData = new FormData(this);
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

    //////////////// Accept ///////////////////
    ///////////////////////////////////////////
    var itemStatus = function () {
        $(document).on('click', '.btn-status', function (e) {
            e.preventDefault();
            var btn = $(this);
            var id = btn.data('id');
            var status = btn.data('status');

            swal.fire({
                title: "هل أنت متأكد؟",
                text: "لا يمكن التراجع لاحقا!",
                buttonsStyling: false,
                confirmButtonText: Common.getCurrentLanguage() === 'ar' ? "<i class=\"la la-thumbs-up\"></i>نعم, موافق" : "<i class=\"la la-thumbs-up\"></i> Yes, delete it",
                confirmButtonClass: "btn btn-success",
                showCancelButton: true,
                cancelButtonText: Common.getCurrentLanguage() === 'ar' ? "<i class=\"la la-thumbs-down\"></i> لا, إلغاء" : "<i class=\"la la-thumbs-down\"></i> No, thanks",
                cancelButtonClass: "btn btn-light btn-elevate",
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        type: "POST",
                        url: status_url,
                        data: {"id": id, "status": status}
                    }).done(function (data) {
                        if (data != "") {
                            notify(data.title, Common.getNotificationType(data.code), data.message);
                            view_tbl.draw(false);
                        }
                    });
                }
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
    ///////////////// INITIALIZE //////////////
    ///////////////////////////////////////////
    return {
        init: function () {
            viewTable();
            add();
            edit();
            deleteItem();
            search();
            itemStatus();
        }
    }
}();

$(document).ready(function() {
    Users.init();
});

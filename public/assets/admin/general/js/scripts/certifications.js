
var Certifications = function () {
  var view_tbl;
  var view_url = base_url + prefix + '/certifications';
  var list_url = base_url + prefix + '/certifications/by_employee';
  var table_id = '#certifications_table';
  /////////////////// View //////////////////
  ///////////////////////////////////////////
  var viewTable = function () {
    var link = list_url;
    var columns = [
      {"data": "index", "title": "#", "orderable": false, "searchable": false},
      {"data": "type.Name", "orderable": false, "searchable": true},
      {"data": "institution.Name", "orderable": false, "searchable": true},
      {"data": "Specialization", "orderable": true, "searchable": true},
      {"data": "Title", "orderable": false, "searchable": true},
      {"data": "Average", "orderable": false, "searchable": true},
      {"data": "StatusID", "orderable": false, "searchable": true},
      {"data": "CertificateDate", "orderable": false, "searchable": true},
      {"data": "actions", "orderable": false, "searchable": false, "class" : "text-center"}
    ];
    var perPage = 25;
    var order = [[1, 'desc']];

    var ajaxFilter = function (d) {
      d.id = $('#EmpID').val();
      // d.id = $('#searchByIdOrEmpNo').val();
    };

    view_tbl = DataTable.init($(table_id), link, columns, order, ajaxFilter, perPage);
  };
  /////////////////// SAVE ///////////////////
  ///////////////////////////////////////////
  var save = function () {

    $("#btnAddCertificate").on("click",
      function (event) {
        $("#loading_certificate").show();
        $.ajax({
          type: "POST",
          url: view_url + "/save",
          data: {
            "ID": $("#EmpID").val(),
            // "EmployeeID": $("#id").val(),
            "CertTypeID": $("#CertTypeID").val(),
            "InstitutionID": $("#InstitutionID").val(),
            "Specialization": $("#Specialization").val(),
            "Average": $("#Average").val(),
            "CertificationTitle": $("#CertificationTitle").val(),
            "StatusID": $("#CertificationStatusID").val(),
            "CertificateDate": $("#CertificateDate").val()
          }
        }).done(function (data) {
          $("#loading_certificate").hide();
          //toastr[data.status](data.message);
          Forms.notify(data.title, data.code,data.message);
          if (data.status == "success") {
            $("#EmployeeCertifications").append(
              "<tr><td>" +
              $("#img").select2('data').text +
              "</td><td>" +
              $("#InstitutionID").select2('data').text +
              "</td><td>" +
              $("#Specialization").val() +
              "</td><td>" +
              $("#CertificationTitle").val() +
              "</td><td>" +
              $("#Average").val() +
              "</td><td>" +
              $("#CertificationStatusID option:selected").text() +
              "</td><td>" +
              $("#CertificateDate").val() +
              "</td><td><button class='btn default btn-xs blue btnEditCertification' data-id='" +
              data.id +
              "'><i class='fa fa-edit'></i></button><button class='btn default btn-xs red btnDeleteCertification' data-id='" +
              data.id +
              "'><i class='fa fa-trash-o'></i></button></td></tr>"
            );
            $("#Specialization").val("");
            $("#Average").val("");
            $("#CertificationTitle").val("");
            $("#CertificateDate").val("");
          }

        });
        return false;
      });

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
  /////////// Change Password ///////////////
  ///////////////////////////////////////////
  var changePassword = function () {
    $('#frmChangePassword').submit(function(e) {
      e.preventDefault();
      var link = $(this).attr('action');
      var formData = $(this).serialize();
      var method = $(this).attr('method');
      Forms.doAction(link, formData, method, null, changePasswordCallBack);
    });
  };

  var changePasswordCallBack = function (obj) {
    if(obj.code === 200) {
      var delay = 1750;

      setTimeout(function () {
        window.location = view_url;
      }, delay);
    }
  };
  /////////// Role Permissions ///////////////
  ///////////////////////////////////////////
  var permissions = function () {
    $('#frmPermissions').submit(function(e) {
      e.preventDefault();
      var link = $(this).attr('action');
      var formData = $(this).serialize();
      var method = $(this).attr('method');
      Forms.doAction(link, formData, method, null, permissionsCallBack);
    });
  };

  var permissionsCallBack = function (obj) {
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
  var openPortlet = function (){
    $('#certifications-protlet .protlet-toggle').on('click', function () {
      var fresh = $('#certifications-protlet .fresh').val();
      if(fresh == 1 && $('#searchByIdOrEmpNo').val() != ''){
        viewTable();
        $('#certifications-protlet .fresh').val(0);
      }
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
      //viewTable();
      save();
      edit();
      changePassword();
      permissions();
      deleteItem();
      search();
      openPortlet();
    }
  }
}();

$(document).ready(function() {
  Certifications.init();
});

$(document).ready(function() {
  //alert slidding
  $('div.alert').not('.alert-important').delay(3000).slideUp(300);

  //hapus select dengan empty value dari url
  $("#form-cari").submit(function() {
    $("#id_item option[value='']").attr("disabled", "disabled");
    $("#kata_kunci option[value='']").attr("disabled", "disabled");
    return true;
  });
});

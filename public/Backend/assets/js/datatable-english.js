// $(document).ready(function() {
//     $('#example').DataTable({
//       scrollY:        300,
//       scrollX:        true,
//       scrollCollapse: true,
//       paging:         true,
//       fixedColumns:   true,
//       // https://cdn.datatables.net/plug-ins/1.11.5/i18n/ar.json
//     });
// } );

$(document).ready(function() {
    // فحص ما إذا كان الجدول تم تشغيله مسبقاً من ملف datatable-english.js
    if ($.fn.DataTable.isDataTable('#example')) {
          // تدمير النسخة القديمة للسماح بإنشاء نسخة جديدة بإعداداتك
          $('#example').DataTable().destroy();
    }

    $('#example').DataTable({
        retrieve: true,
        // ضع إعداداتك الخاصة هنا
    });
});

<script src="{{ url('backend/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ url('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ url('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ url('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ url('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ url('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ url('backend/dist/js/adminlte.min.js')}}"></script>
<script src="{{ url('backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
  $(function () {
    $("#list-data").DataTable({
    "responsive": true,
    "autoWidth": false,
  });
  });
</script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote({
      toolbar: [
          // ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
    })
  })
</script>
<script type="text/javascript">
  var i = 0;
  $("#add").click(function(){
      ++i;
      $("#list-harga-paket").append('<div class="list-harga-paket"><hr><div class="form-group"><label for="price_title">Hari / Tempat / Keterangan*</label><div class="btn btn-danger btn-sm btn-tambah float-right mb-1 remove-list" ><i class="fa fa-times"></i></div><input type="text" name="price_title[]" id="" class="form-control form-control-sm" placeholder="Hari / Tempat / Keterangan"><small class="text-muted">Contoh : weekday, weekend, pelajar, umum, hotel</small></div><div class="row"><div class="col-md-4"><div class="form-group"><label for="seat_59">Seat 59*</label><input type="number" name="seat_59[]" id="" class="form-control form-control-sm" placeholder="Inputkan Harga" value=""></div></div><div class="col-md-4"><div class="form-group"><label for="seat_47">Seat 47*</label><input type="number" name="seat_47[]" id="" class="form-control form-control-sm" placeholder="Inputkan Harga" value=""></div></div><div class="col-md-4"><div class="form-group"><label for="seat_30">Seat 30*</label><input type="number" name="seat_30[]" id="" class="form-control form-control-sm" placeholder="Inputkan Harga" value=""></div></div></div></div>');
  });
  $(document).on('click', '.remove-list', function(){  
      $(this).parents('.list-harga-paket').remove();
  });  
</script>
<script type="text/javascript">
  var i = 0;
  $("#add").click(function(){
      ++i;
      $("#url-video").append('<div class="url-video"><div class="row"><div class="col-md-6"><div class="form-group"><label for="title">Title</label><input type="text" class="form-control" name="title[]" placeholder="Title" value=""></div></div><div class="col-md-6"><div class="form-group"><label for="url">Url</label><div class="btn btn-danger btn-sm btn-tambah float-right mb-1 remove-list" ><i class="fa fa-times"></i></div><input type="text" class="form-control" name="url[]" placeholder="Url" value=""></div></div></div></div>');
  });
  $(document).on('click', '.remove-list', function(){  
      $(this).parents('.url-video').remove();
  });  
</script>
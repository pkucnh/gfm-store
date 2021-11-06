<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">adminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
</footer>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="{{asset('admin/dist/js/pages/dashboard.js')}}"></script>
<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/dist/js/demo.js')}}"></script>
<!-- Sweet-alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  
  $('.img_preview').click(function(){
      $('.img').click();
    })

   //select cate
    $('#select_cate').change(function(){
      var _token = $('input[name="_token"]').val();
      var id_cate = $('#select_cate').val();

    

     $.ajax({
        url: "{{url('admin/select-category')}}",
        method: 'POST',
        data: {
          id_cate:id_cate, _token:_token,
        },
        success:function(data){
          $('#chid_cate').html(data);
        }
     });
    })


    //chọn ảnh liên quan
    
    $('.img_preview_gallery').click(function(){
      var id = $(this).data('id');
      $('.input_file_'+id).click();

      $('.input_file_'+id).change(function(){
        previewURL(this)
      })

      function previewURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('.img_preview_gallery_'+id).attr('src',e.target.result)
            }
            reader.readAsDataURL(input.files[0]);
        }
      }
    })

    function changeImg(input){
      //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
      if(input.files && input.files[0]){
          var reader = new FileReader();
          //Sự kiện file đã được load vào website
          reader.onload = function(e){
              //Thay đổi đường dẫn ảnh
              $('#avatar').attr('src',e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
      }
    }

    $(document).ready(function() {
        $('#avatar').click(function(){
            $('#img').click();
        });
    });
</script>

</body>
</html>

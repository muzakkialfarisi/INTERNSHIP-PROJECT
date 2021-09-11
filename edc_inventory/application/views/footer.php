    <script type="text/javascript">
      $(document).ready(function() {
        $('#posisi_kanwil').change(function(){
          var posisi_kanwil = $(this).val();
          $.ajax({
            type : 'post',
            data : 'posisi_kanwil='+posisi_kanwil,
            url  : '<?=site_url("uker/getuker");?>',
            beforeSend:function(){
            },
            error:function(xhr, status, error){
              alert('Gagal request data');
            },
            success: function(data){
              var data_arr = jQuery.parseJSON(data);
              if (data_arr.length > 0){
                var str_form = '<select name="posisi_kanwil">';
                for (var key in data_arr){
                    str_form += '<option value="'+data_arr[key]['kode_branch']+'">'+data_arr[key]['nama_uker']+'</option>';
                }
                $('#posisi_uker').html(str_form);
              }else{
                alert('Pilih nama kanwil')
              }
            }
          });
        });
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password input').attr("type") == "text"){
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password a').addClass( "fa-eye-slash" );
                $('#show_hide_password a').removeClass( "fa-eye" );
            }else if($('#show_hide_password input').attr("type") == "password"){
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password a').removeClass( "fa-eye-slash" );
                $('#show_hide_password a').addClass( "fa-eye" );
            }
        });
          $('#password, #confirm_password').on('keyup', function () {
            if ($('#password').val() == $('#confirm_password').val()) {
                $('#message').html('Matching').css('color', 'green');
            } else {
                $('#message').html('Not Matching').css('color', 'red');
            }
        });
          $('#mid_check').on('keyup', function () {
            if ($('#mid_check').val().length == 12) {
              $('#message_mid').html('Matching').css('color', 'green');
            } else {
              $('#message_mid').html('Inputan harus 12 karatker').css('color', 'red');
            }
        });
          $('#tid_check').on('keyup', function () {
            if ($('#tid_check').val().length == 8) {
              $('#message_tid').html('Matching').css('color', 'green');
            } else {
              $('#message_tid').html('Inputan harus 8 karatker').css('color', 'red');
            }
        });
          $("#datepicker").datepicker({
            dateFormat: 'yy-mm-dd'
        });
          $("#datepickers").datepicker({
            dateFormat: 'yy'
        });
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
          $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
        
      });
        
        
    </script>
  </body>
</html>
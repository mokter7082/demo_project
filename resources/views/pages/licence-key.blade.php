@include('includeFile.headerArea')

<div class="wrap">
    <div class="page-body animated slideInDown">
        <div class="logo">
            <h2 class="text-center">Licence Key</h2>
        </div>
        <div class="box">
            <table class="table" style="display: none">

                <tbody id="rep">


                </tbody>
            </table>
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form >
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="hidden" id="client-id" class="form-control" name="client_id" placeholder="Client ID" value="{{ Session::get('id') }}">
                                  <input type="text" readonly id="client-name" class="form-control" name="client_id" placeholder="Client ID" value="{{ Session::get('first_name') }}">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" id="licence_key" name="licence_key" placeholder="Licence Key">
                                <i class="fa fa-key"></i>
                            </span>
                        </div>

                        <div class="form-group">
                          <button class="btn btn-primary btn-block save" type="button">save</button>
                        </div>
                        <div class="form-group">
                            <hr/>
                            <select name="" id="month" class="btn btn-mini" style="margin-left:100px;">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                            </select>month
                        </div>
                    </form>
                    <div class="form-group">
                      <a href="#" class="btn btn-dark btn-sm pull-right create_key">Create Key</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>


<script type="text/javascript">
  $(document).ready(function(){

      $(document).on('keypress',function(e) {
          var id = $('#client-id').val();
          var html = '';
          var data = {
              "_token": "{{ csrf_token() }}",
              'id' : id
          }
          if(e.which == 13) {
              $('.table').show();
              $.ajax({
                  type: 'POST',
                  url: "{{route('user_data')}}",
                  data: data,
                  dataType: "json",
                  success: function(datum) {
                      html +='<tr>';
                      html += '<th scope="row">'+ 'First Name' +'</th>';
                      html += '<th scope="row">'+ datum.first_name +'</th>';
                      html += '</tr>';
                        html +='<tr>';
                      html += '<th scope="row">'+ 'Last Name' +'</th>';
                      html += '<th scope="row">'+ datum.last_name +'</th>';
                      html += '</tr>';
                      $('#rep').append(html);
                    //  console.log(datum);
                  }
              });

          }
      });

  $('.create_key').on('click',function(){
      var id = $('#client-id').val();
      var mon = $('#month').val();
      var data = {
          "_token": "{{ csrf_token() }}",
          'id' : id,
          'month' : mon
      }
      $.ajax({
          type: 'POST',
          url: "{{route('encrypt-user_data')}}",
          data: data,
          dataType: "json",
          success: function(datum) {
              $('#licence_key').val(datum);
          }
      });

    });

    $('.save').on('click',function(e){
      e.preventDefault()
      var id = $('#client-id').val();
      var licence_val = $('#licence_key').val();
      var month = $('#month').val();
      var data = {
          "_token": "{{ csrf_token() }}",
          'licence_key' : licence_val,
          'month' : month,
          'id' : id
      }
      $.ajax({
          type: 'POST',
          url: "{{route('save_licence')}}",
          data: data,
          dataType: "json",
          success: function(data) {


          }
      });
    });
  });
</script>

@include('includeFile.footerArea')

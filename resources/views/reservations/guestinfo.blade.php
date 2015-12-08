<div class="panel panel-info">
    <div class="panel-heading">
        Guest Details
        <button class="btn btn-xs pull-right" type="button" id="setguest">
            <span class="glyphicon glyphicon-ok-circle"></span>
        </button>
        <input type="hidden" name="guest_id" id="guest_id" value="{{$reservation->guest_id or ''}}" />
    </div>
    <div class="panel-body">
        <div class="form-group form-group-sm col-sm-12">
            <label for="firstname" class="col-sm-5 control-label">First Name</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="firstname" placeholder="First Name" value="{{$reservation->guest->firstname or ''}}">
            </div>
        </div>
        <div class="form-group form-group-sm col-sm-12">
            <label for="lastname" class="col-sm-5 control-label">Last Name</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="lastname" placeholder="Last Name" value="{{$reservation->guest->lastname or ''}}">
            </div>
        </div>

    </div>
    <div class="guest-footer"></div>
</div>
<script>
    $(document).ready(function(){
       $('#setguest').on('click', function(e){
           e.preventDefault();
           if($('#firstname').val()=='' && $('#lastname').val()=='') {
               $('.guest-footer').html(addAlert('Please enter a valid guest name'));
               return;
           }


           var url = '{{url('reservations/guest')}}';
           $.get(url,
               {
                   firstname: $('#firstname').val(),
                   lastname: $('#lastname').val()
               },
               function(resp){
                    console.log(resp.guest_id);
                   $('.guest-footer').html(addAlert('Guest information created.'));
                   $('#guest_id').val(resp.guest_id);
               }
           );

           function addAlert(msg) {
               return '<div class="alert alert-warning">' + msg + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>';
           }
       });
    });
</script>
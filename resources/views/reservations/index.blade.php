@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            @include('reservations.calendar')
        </div>
        <div class="col-md-6">
            @include('reservations.details')
        </div>
    </div>

    @include('reservations.summary')


    <script>
        $(document).ready(function(){
            $("#clock").jclock({foreground:'yellow',background:'green',fontSize:'20px',timeNotation:'24h'});
            $('.reserve').on('click', function(e){
                e.preventDefault();
                var url = '{{ url('api/v1/reservation/detail') }}' + '/' + $(this).data('rrid');
                $.get(url, function(resp){
                    $('#myModalLabel').html('Reservation Code: ' + resp.reserve_code);
                    $('#checkin').html(resp.checkin);
                    $('#checkout').html(resp.checkout);
                    $('#deposit').html(resp.deposit);
                    $('#status').html(resp.status);
                    $('#rrid').html(resp.rr_id);
                    $('#myModal').modal('show');
                });
            });
            $('label.btn').on('click', function(e){
                e.preventDefault();
                var status = $(this).data('status');
                $('.reserve.' + status).toggle();
            });


            $( ".rescal tr" ).selectable({
                filter: '.reserve-btn',
                stop: function() {
                    var result = $( "#select-result" ).empty();
                    $( ".ui-selected", this ).each(function() {
                        var door = $(this);
                        result.append( " Room #" + door.data('day') );

                    });
                },
                unselected: function(event, ui) {
                    var door = $(ui.unselected).data('door');

                }
            });
        });
    </script>
@endsection
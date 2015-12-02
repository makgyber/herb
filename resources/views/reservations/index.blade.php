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
        var rrooms = {};
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
                    if ($( ".ui-selected", this).length > 0) {
                        var door = {}, days = [];
                        $( ".ui-selected", this ).each(function() {
                            door = $(this).data('door');
                            days.push($(this).data('day'));
                        });
                        rrooms[door] = days;
                    }
                    buildRoomList();
                },
                unselected: function(event, ui) {
                    var door = $(ui.unselected).data('door');
                    if (rrooms[door] !== undefined) {
                        delete rrooms[door];
                    }
                }
            });


            function buildRoomList() {
                var rrlist = $('#rroomlist').empty();
                var ctr = 1;
                $.each(rrooms, function(x, y){
                    if (x !== undefined) {
                        rrlist.append('<tr><td>' + ctr + '</td><td>' + x + '</td><td>' + y[0] + '</td><td>' + y[y.length - 1] + '</td><td></tr>');
                        ctr++;
                    }
                });
            }



        });
        function SelectSelectableElement(selectableContainer, elementsToSelect) {
            // add unselecting class to all elements in the styleboard canvas except the ones to select
            $(".ui-selected", selectableContainer).not(elementsToSelect).removeClass("ui-selected").addClass("ui-unselecting");

            // add ui-selecting class to the elements to select
            $(elementsToSelect).not(".ui-selected").addClass("ui-selecting");

            // trigger the mouse stop event (this will select all .ui-selecting elements, and deselect all .ui-unselecting elements)
            selectableContainer.data('ui-selectable')._mouseStop(null);
            $('.rescal tr').trigger('selectablestart');
        }
    </script>
@endsection
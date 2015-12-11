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

        function reloadPageWithParameters(reservecode) {
            var params=[
                'startdate=' + $('#startdate').val(),
                'enddate=' + $('#enddate').val(),
                'room_type_id=' + $('#room_type_id').val(),
                'reserve_code=' + reservecode
            ];
            document.location.href = '{{url("reservations")}}' + '?' + params.join('&');
        }

        $(document).ready(function(){
            $("#clock").jclock({foreground:'yellow',background:'green',fontSize:'20px',timeNotation:'24h'});
            $('.reserve').on('click', function(e){
                e.preventDefault();
                var params=[
                        'startdate=' + $('#startdate').val(),
                        'enddate=' + $('#enddate').val(),
                        'room_type_id=' + $('#room_type_id').val(),
                        'reserve_code=' + $(this).data('reserve')
                    ];
                document.location.href = '{{url("reservations")}}' + '?' + params.join('&');
            });
            $('label.btn').on('click', function(e){
                e.preventDefault();
                var status = $(this).data('status');
                $('.reserve.' + status).toggle();
            });


            $( ".rm-row" ).selectable({
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
                    if (ui !== undefined) {
                        var door = $(ui.unselected).data('door');
                        if (rrooms[door] !== undefined) {
                            delete rrooms[door];
                        }
                    }
                }
            });

            $('#removerooms').on('click', function(e){
                e.preventDefault();
                SelectSelectableElement($('.rm-row'), $('x', $('.rm-row')))
            });

            function buildRoomList() {
                var rrlist = $('#rroomlist').empty();
                var ctr = 1;
                if (rrooms !== undefined) {
                    $.each(rrooms, function(x, y){
                        if (x !== undefined) {
                            rrlist.append('<tr><td>' + ctr + '</td><td>' + x + '</td><td>' + y[0] + '</td><td>' + y[y.length - 1] + '</td><td></tr>');
                            ctr++;
                        }
                    });
                }
            }

            $('.resform-btn').on('click', function(e){

                var act = $(this).attr('id');

                if (act == 'new') {
                    e.preventDefault();
                    {{--document.location.href='{{url("reservations")}}';--}}
                    reloadPageWithParameters('');
                } else if(act == 'search') {
                    e.preventDefault();
                    {{--document.location.href='{{url("reservations")}}' + '?reserve_code=' + $('#reserve_code').val();--}}
                    reloadPageWithParameters($('#reserve_code').val());
                } else if(act == 'save') {
                    e.preventDefault();
                    if ($('#guest_id').val() == '') {
                        alert('Please enter a valid guest');
                    } else {
                        $('#rrooms').val( JSON.stringify(rrooms) );
                        $('#reserveform').submit();
                    }
                }
            });

            $('.checkin-icon').on('click', function(e){
                e.preventDefault();
                var act = $(this).attr('id');
                if (act == 'checkin') {
                    var params = [
                        'rrid=' + $(this).data('rrid'),
                        'code=' + $('#reserve_code').val(),
                        'fn=' + $('#firstname').val(),
                        'ln=' + $('#lastname').val(),
                        'room=' + $(this).data('roomid'),
                        'dep=' + $('#reserve_fee').val()
                    ];
                    window.location.href='http://fds2.shogun/fds/ajax/checkinform.php?' + params.join('&');
                } else if (act == 'checkinclose') {
                    var params = [
                        'close=1',
                        'rrid=' + $(this).data('rrid'),
                        'code=' + $('#reserve_code').val(),
                        'fn=' + $('#firstname').val(),
                        'ln=' + $('#lastname').val(),
                        'room=' + $(this).data('roomid'),
                        'dep=' + $('#reserve_fee').val()
                    ];
                    window.location.href='http://fds2.shogun/fds/ajax/checkinform.php?' + params.join('&');
                } else if (act == 'rrdel') {

                }
            });
        });

        function SelectSelectableElement(selectableContainer, elementsToSelect) {
            $.each(selectableContainer, function(i, j) {
                var selectableContainer = $(j);
                $(".ui-selected", selectableContainer).not(elementsToSelect).removeClass("ui-selected").addClass("ui-unselecting");
                $(elementsToSelect).not(".ui-selected").addClass("ui-selecting");
                selectableContainer.data('ui-selectable')._mouseStop();
            });
        }


    </script>
@endsection

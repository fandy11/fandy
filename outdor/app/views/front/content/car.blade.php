<div class="col-md-4">
</div>
<div class="col-md-8">
</div>
<div class="col-md-4">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Lokasi Penyewaan</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class=" col-md-9 col-lg-9">
                    <table class="table table-user-information">
                        <tbody>
                            <tr>
                                <td>Tanggal Sewa:</td>
                                <td>
                                    <p>{{ $locpickup->address.','.$locpickup->city }} </p>
                                    <p>{{ $loc['pickup'] }}</p>
                                    <input type="hidden" name="pickup" value="{{ $locpickup->id }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Kembali</td>
                                <td>
                                    <p>{{ $locreturn->address.','.$locreturn->city }} </p>
                                    <input type="hidden" name="locreturnid" value="{{ $locreturn->id }}" />
                                    <p>{{ $loc['return'] }}</p>
                                    <input type="hidden" name="return" value="{{ $loc['return'] }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>Durasi Penyewaan</td>
                                <td>{{ $diff->days.' Hari '.($diff->h > 0 ? $diff->h.' Hours' : '') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-8">
    @foreach($cars as $car)
    @foreach($car->type as $type)
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <img class="img-circle"
                         src="{{ asset('assets/img/type/'.$type->image) }}" alt="{{ $car->make.' '.$car->model }}" style="width: 140px; height: 140px;">
                </div>
                <div class=" col-md-9 col-lg-9">
                    <?php
                    $rental_fee = intval(intval($diff->days * $type->price_day) + intval($diff->h * $type->price_hour));
                    if (getOptions('rental', 'calculate_rental_fee') == 'd') {
                        $rental_fee = intval(intval($diff->days * $type->price_day));
                    } elseif (getOptions('rental', 'calculate_rental_fee') == 'h') {
                        $hours = $diff->h + ($diff->days * 24);
                        $rental_fee = intval($hours * $type->price_hour);
                    }
                    ?>
                    <strong>{{ $type->type }} <span class="pull-right"> Total Harga : $ {{ $rental_fee }}</span></strong><br>
                    <table class="table table-user-information">
                        <tbody>
                            <tr>
                                <td>Nomor Tas</td>
                                <td>{{ $type->bags }}</td>
                            </tr>
                            <tr>
                                <td>Transmissions</td>
                                <td>{{ $type->transmission }}</td>
                            </tr>
                        </tbody>
                    </table>
                    (Example of this range: {{ $car->make.' '.$car->model }})
                </div>
            </div>

            <span class="pull-right">
                <button class="btn btn-sm btn-warning" type="button"
                        data-toggle="tooltip"
                        data-original-title="Edit this user" value="{{$type->id.'-'.$car->id}}">Masuk</button>
            </span>
        </div>
    </div>
    @endforeach
    @endforeach
</div>
<script>
    $(function() {
        $("button").on('click', function(e) {
            var data = {
                'car_id': $(this).val(),
                'locpickup_id': "{{ $locpickup->id }}",
                'locreturn_id': "{{ $locpickup->id }}",
                'pickup': $('#pickup').val(),
                'return': $('#return').val(),
            };
            $.post('selectcar', data).done(function(data) {
                $('#myTab a[href="#extra"]').tab('show');
                $('#extra').html(data);
            });
            e.preventDefault();
        });
    });
</script>
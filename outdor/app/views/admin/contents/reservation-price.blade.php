<dl class="dl-horizontal">
    <dt>Rental Duration</dt>
    <dd>{{ $total_day }}
        <p>
            {{ Form::hidden('total_day',$days); }}
            {{ Form::hidden('total_hours',$hours); }}
        </p>
    </dd>
    <dt>Price Per Day
    <p>
        <small>{{ $days }} x Rp. {{ $price_day }}</small>
        {{ Form::hidden('price_per_day',$price_day * $days); }}
        {{ Form::hidden('price_per_day_details',$days.' x Rp.'.$price_day); }}
    </p>
    </dt>
    <dd>Rp. {{ $days * $price_day }}
    </dd>
    <dt>Price Per Hour
    <p>
        <small>{{ $hours }} x Rp. {{ $price_hour }}</small>
        {{ Form::hidden('price_per_hour',$price_hour * $hours); }}
        {{ Form::hidden('price_per_hour_details',$hours.' x Rp.'.$price_hour); }}
    </p>
    </dt>
    <dd>Rp. {{ $hours * $price_hour }}
    </dd>
    <hr>
    <dt>Car Rental Fee
    <p>
        {{ Form::hidden('rental_fee',$rental_fee); }}
    </p>
    </dt>
    <dd>Rp. {{ $rental_fee }}</dd>
    <dt>Extras Fee
    <p>
        {{ Form::hidden('extra_fee',$price_ex); }}    
    </p>
    </dt>
    <dd>
        @if($price_ex != '')
        Rp. {{ $price_ex }}
        @endif
    <dd>
    <dt>Insurance
    @if ($insurance_type == 'r' )
    <p> <small> Rp. {{ $insurance_val }} per Reservation </small></p>
    @elseif ($insurance_type == 'd')
    <p> <small> Rp. {{ $insurance_val }} per Day </small></p>
    @elseif ($insurance_type == '%')
    <p> <small>  {{ $insurance_val }} % of Rp. {{ $rental_fee }} </small></p>
    @endif
    </dt>
    <dd>
        @if ($insurance_type == 'd')
        <?php $insurance_val = $insurance_val * ($days == 0 ? '1' : $days); ?>
        @elseif ($insurance_type == '%')
        <?php $insurance_val = ($insurance_val / 100) * $rental_fee; ?>
        @endif
        Rp. {{ $insurance_val }}
        {{ Form::hidden('insurance_val',$insurance_val) }}
    </dd>
    <hr>
    <dt>Sub Total
    <p></p></dt>
    <?php $sub_total = $rental_fee + $price_ex + $insurance_val; ?>
    {{ Form::hidden('sub_total',$sub_total) }}
    <dd>Rp. {{ $sub_total }}</dd>
    <dt>Tax
    @if ($tax_type == '%' )
    <p> <small> {{ $tax_val }} % of Rp. {{ $sub_total }}  </small></p>
    @elseif ($insurance_type == 'A')
    <p> <small> Rp. {{ $tax_val }} </small></p>
    @endif
    </dt>
    <dd>
        @if ($tax_type == '%')
        <?php $tax_val = ($tax_val / 100) * $sub_total; ?>
        @endif
        Rp. {{ $tax_val }}
        {{ Form::hidden('tax_val',$tax_val) }}
    </dd>
    <hr>
    <dt>Total Price
    <p></p></dt>
    <?php $total_price = $sub_total + $tax_val; ?>
    {{ Form::hidden('total_price',$total_price) }}
    <dd>Rp. {{ $total_price }}</dd>
    <hr>
    <dt>Required deposit
    <p>
        <small>{{ $deposit_payment }} % of {{ $total_price }}</small>
    </p>
    </dt>
    <?php $deposit_payment= floatval(($deposit_payment/100) * $total_price); ?>
    {{ Form::hidden('deposit_payment',$deposit_payment) }}
    <dd>Rp. {{ $deposit_payment }}</dd>
</dl>
<table id="{{ $id }}" class="{{ $class }} extra">
    <colgroup>
        @for ($i = 0; $i < count($columns); $i++)
        <col class="con{{ $i }}" />
        @endfor
    </colgroup>
    <thead>
    <tr>
        @foreach($columns as $i => $c)
        @if($i == 1)
        <th class="checkbox-column"">{{ $c }}</th>
        @else 
        <th>{{ $c }}</th>
        @endif
        @endforeach
    </tr>
    </thead>
    <tbody id="extra">
    @foreach($data as $d)
    <tr>
        @foreach($d as $dd)
        <td>{{ $dd }}</td>
        @endforeach
    </tr>
    @endforeach
    </tbody>
</table>

@if (!$noScript)
    @include('datatable::javascript', array('id' => $id, 'options' => $options, 'callbacks' =>  $callbacks))
@endif
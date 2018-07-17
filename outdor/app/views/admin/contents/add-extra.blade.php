<div class="form-group" id='add-{{ $idadd }}'>
    <div class="col-md-9" id="extras-add">
        <div class="input-group">
            <select class="form-control" id="ex-option" name="extras[]">
                <option value="">Choose Extras</option>
                @if($extra)
                @foreach($extra as $ex)
                <option value="{{ $ex['id'] }}">{{ $ex['name'] }}</option>
                @endforeach
                @endif
            </select>
            <span class="input-group-btn">
                <button class="btn btn-default delex" type="button" id="del-{{ $idadd }}">X</button>
            </span>
        </div>
    </div>
</div>
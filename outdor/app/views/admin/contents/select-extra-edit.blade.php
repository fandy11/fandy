<div class="form-group" id="default">
    <div class="col-md-9" id="extras">
            <select class="form-control" id="ex-option" name="extras[]">
                <option value="">Choose Extras</option>
                @if(isset($extra))
                @if(count($extra) > 0)
                @foreach($extra as $ex)
                <option value="{{ $ex['id'] }}">{{ $ex['name'] }}</option>
                @endforeach
                @endif
                @endif
            </select>
    </div>
</div>
<div class="form-actions" id="button-ex">
    @if(!empty($extra))
    <a href="#" id="add-ex" class='btn' id="telo">Add</a>
    {{ Form::submit('Save',array('class' => 'btn btn-primary')) }}
    @endif
</div>
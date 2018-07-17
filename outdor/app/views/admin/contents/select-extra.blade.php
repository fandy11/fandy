@if(isset($reg_extra))
    @if(count($reg_extra) > 0)
        @foreach($reg_extra as $regex)
            <div class="form-group" id='ex-{{ $regex->id }}'>
                <div class="col-md-9" id="extra-edit">
                    <div class="input-group">
                        <select class="form-control" id="ex-option" name="extras[]">
                            <option value="">Choose Extras</option>
                                @if(isset($extra))
                                    @if(count($extra) > 0)
                                        @foreach($extra as $ex)
                                            @if($ex['id'] == $regex->id)
                                                <option value="{{ $ex['id'] }}" selected>{{ $ex['name'] }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                @endif
                        </select>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@else 
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
@endif
@if(!isset($reg_extra))
<div class="form-actions" id="button-ex">
    @if(!empty($extra))
    <a href="#" id="addex-new" class='btn' id="telo">Add</a>
    {{ Form::submit('Save',array('class' => 'btn btn-primary')) }}
    @endif
</div>
@else
<div class="form-actions" id="buttonex-edit">
    @if(!empty($extra))
    <a href="#" id="addex-edit" class='btn' id="telo">Add</a>
    {{ Form::submit('Save',array('class' => 'btn btn-primary')) }}
    @endif
</div>
@endif
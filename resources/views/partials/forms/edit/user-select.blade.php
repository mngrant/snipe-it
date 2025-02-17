<div id="assigned_user">
    <div class="form-group{{ $errors->has($fieldname) ? ' has-error' : '' }}"{!!  (isset($style)) ? ' style="'.e($style).'"' : ''  !!}>

        {{ Form::label($fieldname, $translated_name, array('class' => 'col-md-3 control-label')) }}

        <div class="col-md-6{{  ((isset($required)) && ($required=='true')) ? ' required' : '' }}">
            <select class="js-data-ajax" data-endpoint="users" data-placeholder="{{ trans('general.select_user') }}" name="{{ $fieldname }}" style="width: 100%" id="assigned_user_select" aria-label="{{ $fieldname }}">
                @if ($user_id = old($fieldname, (isset($item)) ? $item->{$fieldname} : ''))
                    <option value="{{ $user_id }}" selected="selected" role="option" aria-selected="true"  role="option">
                        {{ (\App\Models\User::find($user_id)) ? \App\Models\User::find($user_id)->present()->fullName : '' }}
                    </option>
                @else
                    <option value=""  role="option">{{ trans('general.select_user') }}</option>
                @endif
            </select>
        </div>

        <div class="col-md-1 col-sm-1 text-left">
            @can('create', \App\Models\User::class)
                @if ((!isset($hide_new)) || ($hide_new!='true'))
                    <a href='{{ route('modal.show', 'user') }}' data-toggle="modal"  data-target="#createModal" data-select='assigned_user_select' class="btn btn-sm btn-primary">New</a>
                @endif
            @endcan
        </div>

        {!! $errors->first($fieldname, '<div class="col-md-8 col-md-offset-3"><span class="alert-msg" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i> :message</span></div>') !!}

    </div>

    <div class="form-group {{ $errors->has('checkout_at') ? 'error' : '' }}">
        {{ Form::label('send_notification', trans('admin/hardware/form.send_notification'), array('class' => 'col-md-3 control-label')) }}
        <div class="col-md-8">
            <select name="send_notification" class="form-control">
                <option value="no">No</option>
                <option value="yes-new-hardware">Yes, New Hardware</option>
                <option value="yes-upgraded-hardware">Yes, Upgraded Hardware</option>
            </select>
        </div>
    </div>
</div>

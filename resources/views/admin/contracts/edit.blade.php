@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.contract.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.contracts.update", [$contract->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="client_id">{{ trans('cruds.contract.fields.client') }}</label>
                <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client_id" id="client_id">
                    @foreach($clients as $id => $client)
                        <option value="{{ $id }}" {{ (old('client_id') ? old('client_id') : $contract->client->id ?? '') == $id ? 'selected' : '' }}>{{ $client }}</option>
                    @endforeach
                </select>
                @if($errors->has('client'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.client_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contract_date">{{ trans('cruds.contract.fields.contract_date') }}</label>
                <input class="form-control date {{ $errors->has('contract_date') ? 'is-invalid' : '' }}" type="text" name="contract_date" id="contract_date" value="{{ old('contract_date', $contract->contract_date) }}">
                @if($errors->has('contract_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contract_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.contract_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subject">{{ trans('cruds.contract.fields.subject') }}</label>
                <input class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}" type="text" name="subject" id="subject" value="{{ old('subject', $contract->subject) }}">
                @if($errors->has('subject'))
                    <div class="invalid-feedback">
                        {{ $errors->first('subject') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.subject_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="full_text">{{ trans('cruds.contract.fields.full_text') }}</label>
                <textarea class="form-control {{ $errors->has('full_text') ? 'is-invalid' : '' }}" name="full_text" id="full_text">{{ old('full_text', $contract->full_text) }}</textarea>
                @if($errors->has('full_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('full_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.full_text_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_signed') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_signed" value="0">
                    <input class="form-check-input" type="checkbox" name="is_signed" id="is_signed" value="1" {{ $contract->is_signed || old('is_signed', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_signed">{{ trans('cruds.contract.fields.is_signed') }}</label>
                </div>
                @if($errors->has('is_signed'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_signed') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.is_signed_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
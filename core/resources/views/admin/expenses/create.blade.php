@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10">
                <form action="{{ route('admin.expenses.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label>@lang('Title')</label>
                                <input class="form-control" name="title" type="text" value="{{ old('title') }}" required>
                            </div>

                            <div class="form-group col-lg-4">
                                <label>@lang('Amount')</label>
                                <div class="input-group">
                                    <input class="form-control" name="amount" type="number" value="{{ old('amount') }}" step="any" required>
                                    <span class="input-group-text">@lang($general->cur_text)</span>
                                </div>
                            </div>

                            <div class="form-group col-lg-4">
                                <label>@lang('Expense At')</label>
                                <input name="expense_at" type="text" data-language="en" class="datepicker-here form-control" data-position='bottom right' placeholder="@lang('Expense at')" autocomplete="off" value="{{ old('expense_at', today()->format('m/d/Y')) }}">
                            </div>
                        </div>

                        <h6 class="my-3 text-center">
                            @lang('Note')
                        </h6>

                        <div class="form-group">
                            <textarea name="note" id="note" class="form-control" cols="30" rows="10">{{ old('note') }}</textarea>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button class="btn btn--primary w-100 h-45" type="submit">@lang('Submit')</button>
                    </div>
                </form>
            </div><!-- card end -->
        </div>
    </div>
    <x-form-generator />
@endsection

@push('breadcrumb-plugins')
    <x-back route="{{ route('admin.plans.dps.index') }}" />
@endpush

@push('style-lib')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/datepicker.min.css') }}">
@endpush

@push('script-lib')
    <script src="{{ asset('assets/admin/js/vendor/datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/datepicker.en.js') }}"></script>
@endpush

@push('script')
    <script>
        (function($) {
            "use strict";
            if (!$('.datepicker-here').val()) {
                $('.datepicker-here').datepicker();
            }
        })(jQuery)
    </script>
@endpush

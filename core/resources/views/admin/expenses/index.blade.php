@extends('admin.layouts.app')

@section('panel')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card b-radius--10">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table--light style--two table">
                            <thead>
                                <tr>
                                    <th>@lang('ID')</th>
                                    <th>@lang('Title')</th>
                                    <th>@lang('Date')</th>
                                    <th>@lang('Amount')</th>
                                    <th>@lang('Note')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($expenses as $expense)
                                    <tr>
                                        <td>
                                            <span class="fw-bold">{{ $expense->id }}</span>
                                        </td>

                                        <td>
                                            <span>{{ $expense->title }}</span>
                                        </td>

                                        <td>
                                            {{ showDateTime($expense->created_at) }}<br>{{ diffForHumans($expense->created_at) }}
                                        </td>

                                        <td>
                                            {{ __($general->cur_sym) }}{{ showAmount($expense->amount) }}</span>
                                        </td>

                                        <td>
                                            <p>{!! $expense->note !!}</p>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                @if ($expenses->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($expenses) }}
                    </div>
                @endif
            </div><!-- card end -->
        </div>
    </div>
@endsection

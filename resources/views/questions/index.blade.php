@extends('layouts.master')

@push('styles')
    @livewireStyles
@endpush

@section('content')
    @livewire('question')
@endsection

@push('scripts')
    @livewireScripts
@endpush

@extends('layouts.web.app')

@section('title', 'Enrollment Card - Empex')

@section('navbar')
@parent
@endsection

@section('content')
<div class="w-full py-5">
  <div class="px-4 mx-auto max-w-7xl">
    <div class="grid w-full grid-cols-1 md:grid-cols-3 md:gap-4 md:border md:bg-white md:rounded md:p-5">
      @livewire('web.enrollment-card')
      <div class="grid grid-cols-3 col-span-2 mt-5 md:gap-3">
        <div class="text-center">
          <div class="py-8">
            <img src="/images/auth/card.svg" alt="pocket card" class="mx-auto">
          </div>
          <div class="mt-2 mb-4 text-gray-400">Pocket Card</div>
          <a href="{{ route('auth.employee.pdf.card') }}"
            class="px-3 py-1 text-white uppercase rounded bg-empex-green hover:bg-green-500">Download</a>
        </div>
        <div class="text-center">
          <div>
            <img src="/images/auth/pdf.svg" alt="pdf" class="mx-auto">
          </div>
          <div class="mt-2 mb-4 text-gray-400">A4 document</div>
          <a href="{{ route('auth.employee.pdf.a4') }}"
            class="px-3 py-1 text-white uppercase rounded bg-empex-green hover:bg-green-500" target="blank">Download</a>
        </div>

        {{-- Payment Reciept --}}
        <div class="text-center">
          <div>
            <img src="/images/auth/pdf.svg" alt="pdf" class="mx-auto ">
          </div>
          <div class="mt-2 mb-4 text-gray-400">Payment Reciept</div>
          <a href="{{ route('auth.employee-payment-receipt.pdf.a4') }}"
            class="px-3 py-1 text-white uppercase rounded bg-empex-green hover:bg-green-500" target="blank">Download</a>
        </div>
      </div>
    </div>

    <div x-show="employeeDetail">
      @livewire('web.auth.employee-detail')
    </div>
  </div>
</div>
@endsection

@section('footer')
@parent
@endsection

@section('copyright')
@parent
@endsection

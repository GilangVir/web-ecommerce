<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg flex flex-col gap-y-5">

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li class="py-5 bg-red-500 text-white font-bold">
                                {{$error}}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <div class="item-product flex flex-col gap-y-5">
                        <img src="{{ Storage::url($value->product->cover) }}" class="h-[auto] w-[300px]" alt="">
                        <div class="gap-x-3">
                            <h3>{{ $value->product->name }}</h3>
                            <p>{{ $value->product->category->name }}</p>
                        </div>
                        <div class="flex flex-row gap-x-5 items-center">
                            <p>Rp. {{ $value->total_price }}</p>
                            @if($value->is_paid)
                                <span class="py-2 px-5 rounded-full bg-green-500 text-white font-bold text-sm">
                                    PAID
                                </span>
                            @else
                                <span class="py-2 px-5 rounded-full bg-orange-500 text-white font-bold text-sm">
                                    PENDING
                                </span>
                            @endif
                        </div>
                        <p>Bukti Pembayaran :</p>
                        <img src="{{ Storage::url($value->proof) }}" class="h-auto w-[300px]">
                        <div class="flex flex-row gap-x-3">
                            @if($value->is_paid)
                                <a href="{{ route('admin.product_orders.download.file', $value) }}" class="py-3 px-5 bg-indigo-500 text-white">
                                    Download
                                </a>
                            @endif
                        </div>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Transactions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                @forelse ($transactions as $order)
                    <div class="item-product flex flex-row justify-between items-center">
                        <div class="item-product flex flex-row justify-between items-center">
                            <div class="flex flex-row items-center gap-x-5">
                                <img src="{{ Storage::url($order->product->cover) }}" class="rounded-2xl h-[100px] w-auto" alt="">
                                    <div class="gap-x-3">
                                        <h3 class="text-indigo-950 font-bold text-xl">{{ $order->product->name }}</h3>
                                        <p class="text-slate-500 text-sm">{{ $order->product->category->name }}</p>
                                    </div>
                            </div>
                        </div>

                            <div>
                                 <p class="text-indigo-950 font-bold text-xl">Rp. {{ $order->total_price }}</p>
                            </div>
                            <div class="flex flex-row gap-x-5 items-center">
                                @if($order->is_paid)
                                    <span class="py-2 px-5 rounded-full bg-green-500 text-white font-bold text-sm">
                                        PAID
                                    </span>
                                @else
                                    <span class="py-2 px-5 rounded-full bg-orange-500 text-white font-bold text-sm">
                                        PENDING
                                    </span>
                                @endif
                            </div>
                        <div class="flex flex-row gap-x-3">
                            <a href="{{ route('admin.product_orders.transaction.detail', $order) }}" class="rounded-full py-3 px-5 bg-indigo-500 text-white">
                                Details
                            </a>
                        </div>
                    </div>
                @empty
                    <p>transaksi anda belum tersedia</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>

                
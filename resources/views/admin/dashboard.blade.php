<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg flex flex-col gap-y-5">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li class="py-5 bg-red-500 text-white font-bold">
                                {{$error}}
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="flex flex-row justify-between items-center mb-5">
                        <h3 class="text-indigo-950 font-bold text-2xl">Overview</h3>
                    </div>

                    <div class="flex flex-row justify-between">
                        <div>
                            <p class="text-slate-500">Total Product:</p>
                            <p class="text-indigo-950 font-bold text-xl">{{ count($my_product) }}</p>
                        </div>
    
                        <div>
                            <p class="text-slate-500">Total Order:</p>
                            <p class="text-indigo-950 font-bold text-xl">{{ count($total_order_success) }}</p>
                        </div>

                        <div>
                            <p class="text-slate-500">Product yang belum laku:</p>
                            <p class="text-indigo-950 font-bold text-xl">{{ count($total_order_success) }}</p>
                        </div>
    
                        <div>
                            <p class="text-slate-500">Total Revenue:</p>
                            <p class="text-indigo-950 font-bold text-xl">Rp. {{ number_format($my_revenue) }}</p>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>

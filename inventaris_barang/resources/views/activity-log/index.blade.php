@extends('layouts.app')

@section('title', 'Activity Log')

@section('content')
    <div class="py-12 bg-pink-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-3 mt-1 mb-5">
            <div class="bg-gradient-to-br from-pink-200 via-pink-100 to-purple-100 p-8 rounded-2xl shadow-lg">

                <!-- Header -->
                <div class="space-y-3 mb-10 text-center">
                    <h1 class="text-3xl font-bold text-purple-700 tracking-tight">
                        Activity Log 📋
                    </h1>
                    <p class="text-lg text-purple-500">Daftar aktivitas sistem terbaru</p>
                </div>

                <!-- Activity List -->
                <div class="bg-white border border-pink-300 rounded-2xl p-6 shadow-md">
                    @if ($activities->isEmpty())
                        <p class="text-center text-purple-500">Tidak ada aktivitas yang ditemukan.</p>
                    @else
                        <div class="space-y-4">
                            @foreach ($activities as $activity)
                                <div
                                    class="flex items-start p-4 bg-gradient-to-br from-white to-pink-50 rounded-xl border border-pink-200 hover:shadow-lg transition duration-300">
                                    <div class="flex-shrink-0">
                                        <div class="w-8 h-8 rounded-full bg-pink-200 flex items-center justify-center">
                                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-4 flex-1">
                                        <div class="flex items-center justify-between">
                                            <p class="text-sm font-medium text-purple-800">
                                                {{ $activity->description }}
                                            </p>
                                            <span
                                                class="text-xs text-purple-500">{{ $activity->created_at->diffForHumans() }}</span>
                                        </div>
                                        <div class="mt-2 text-xs text-purple-500 flex items-center">
                                            <span class="inline-block w-2 h-2 rounded-full bg-purple-600 mr-2"></span>
                                            Oleh: {{ $activity->causer->name ?? 'System' }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
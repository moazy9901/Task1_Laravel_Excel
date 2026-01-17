@extends('layouts.app')

@section("content")
    <div class="max-w-6xl mx-auto p-6 space-y-6">

        <!-- Import Excel Form -->
        <form action="{{ route('clients.import') }}" method="POST" enctype="multipart/form-data"
            class="flex items-center gap-4 bg-white p-4 rounded-lg shadow-md">
            @csrf
            <input type="file" name="file" required
                class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
                Import Excel
            </button>
        </form>



        <!-- Clients Table -->
        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
            <table class="min-w-full border-collapse">
                <thead class="bg-indigo-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left">Sheet Name</th>
                        @if($clients->count())
                            @foreach(array_keys(json_decode($clients->first()->data, true)) as $column)
                                <th class="px-6 py-3 text-left">{{ $column }}</th>
                            @endforeach
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                        @php
                            $data = json_decode($client->data, true);
                        @endphp
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-3">{{ $client->sheet_name }}</td>
                            @foreach($data as $value)
                                <td class="px-6 py-3">{{ $value }}</td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                @if($clients->isEmpty())
                <div class="p-4 text-center text-gray-500">No data available.</div>
                @endif
            </div>
            
        </div>
        {{ $clients->links() }}

@endsection
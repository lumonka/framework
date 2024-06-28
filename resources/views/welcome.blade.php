@extends('layouts.app')
@section('content')
    <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gray-100 justify-evenly">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <div>
                    <x-input-label for="name" :value="__('Введите задачу')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4 gap-2">
                    <x-primary-button class="ms-3">
                        {{ __('Добавить задачу') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-300 shadow-md">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                <tr>
                    <th scope="row" class="px-6 py-3 w-full">
                        Задача
                    </th>
                    <th scope="row" class="px-6 py-3 w-full">
                        Действие
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                    <tr class="odd:bg-white">
                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                            {{ $task->name }}
                        </th>
                        <td class="px-6 py-4 text-center">
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-solid fa-xmark text-red-400"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

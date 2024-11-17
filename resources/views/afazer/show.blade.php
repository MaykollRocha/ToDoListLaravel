<?php
    $data_final = \Carbon\Carbon::parse($todo->data_final)->startOfDay();
    $data_inicial = \Carbon\Carbon::now()->startOfDay();
    $diferenca = $data_inicial->diff($data_final);
    $dias_restantes = $data_inicial->diffInDays($data_final, false);
?>
@extends('afazer.layouts.main')

@section('content')
    <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400 mb-6">
        <li>Titulo: {{ $todo->titulo }}</li>
        <li>Descrição: {{ $todo->descricao }}</li>
        <li>Data Final: {{ $todo->data_final }}</li>
        <li>Dias ate a entrega: {{ $dias_restantes }}</li>
        <li>Status: {{ $todo->concluido? 'Sim' : 'Nao' }}</li>
    </ul>
    @if (!$todo->concluido)
        <form action="{{route('afazer.update', $todo->id)}}" method="POST">
            @csrf
            @method('PUT')
            <input type="radio" id="concluido" name="concluido" value="1">
            <label for="concluido">Ja concluido</label>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-3">Atualizar</button>
        </form>
    @endif
    <form action="{{ route('afazer.delete', $todo->id) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit"
            class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Deletar</button>
    </form>

@endsection

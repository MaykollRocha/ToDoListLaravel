@extends('afazer.layouts.main')

@section('content')
    <form action="{{route('afazer.store')}}" method="POST">
        @csrf
        <label for="titulo" class="bg-blue-500 text-white px-4 py-2 rounded block mb-3">Título *</label>
        <input type="text" name="titulo" id="titulo" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>

        <label for="descricao" class="bg-blue-500 text-white px-4 py-2 rounded block mb-3">Descrição</label>
        <textarea name="descricao" id="descricao" cols="110" rows="5" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>

        <label for="data_final" class="bg-blue-500 text-white px-4 py-2 rounded block mb-3">Data de Limite</label>
        <input type="date" name="data_final" id="data_final" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

        <label for="prioridade" class="bg-blue-500 text-white px-4 py-2 rounded block mb-3">Tipo</label>
        <div class="mb-5">
            <select name="tipo"
                class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                <option value="trabalho" {{ old('tipo') == 'trabalho' ? 'selected' : '' }}>trabalho</option>
                <option value="estudo" {{ old('tipo') == 'estudo' ? 'selected' : '' }}>estudo</option>
                <option value="casa" {{ old('tipo') == 'casa' ? 'selected' : '' }}>casa</option>
                <option value="outro" {{ old('tipo') == 'outro' ? 'selected' : '' }}>Outro</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-3">Criar</button>
    </form>
@endsection

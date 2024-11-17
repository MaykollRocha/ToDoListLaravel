@extends('afazer.layouts.main')

@section('content')

    @if($todos && $todos->count() > 0)
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
            <form action="{{ route('afazer.index') }}" method="get">
                <select name="tipo" class="p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" {{ old('tipo') == 'trabalho' ? 'selected' : '' }}>TIPO?</option>
                    <option value="trabalho" {{ old('tipo') == 'trabalho' ? 'selected' : '' }}>trabalho</option>
                    <option value="estudo" {{ old('tipo') == 'estudo' ? 'selected' : '' }}>estudo</option>
                    <option value="casa" {{ old('tipo') == 'casa' ? 'selected' : '' }}>casa</option>
                    <option value="outro" {{ old('tipo') == 'outro' ? 'selected' : '' }}>Outro</option>
                </select>
                <select name="concluido" class="p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Concluido?</option>
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-3">Buscar</button>
            </form>
        </div>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-4">Titulo</th>
                        <th scope="col" class="px-6 py-4">Conluido</th>
                        <th scope="col" class="px-6 py-4">Dias Faltando</th>
                        <th scope="col" class="px-6 py-4">Açãoes</th>
                    </tr>
                </thead>
                <tbody class="text-gray-100 text-sm font-light">
                    @foreach($todos as $todo)
                        <tr>
                            <td class="px-6 py-4 ">{{$todo->titulo}}</td>
                            <td class="px-6 py-4 {{ $todo->concluido ? 'text-blue-500' : 'text-red-500' }}">
                                {{ $todo->concluido ? 'Sim' : 'Nao' }}
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $data_final = \Carbon\Carbon::parse($todo->data_final)->startOfDay();
                                    $data_inicial = \Carbon\Carbon::now()->startOfDay();
                                    $diferenca = $data_inicial->diff($data_final);
                                    $dias_restantes = $data_inicial->diffInDays($data_final, false);
                                @endphp

                                @if ($dias_restantes > 0)
                                    <span class="text-green-500">{{ $diferenca->format('%d dias') }}</span>
                                @elseif ($dias_restantes == 0)
                                    <span class="text-yellow-500">Hoje</span>
                                @else
                                    <span class="text-red-500">Atrasado</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('afazer.edit', $todo->id) }}" class="text-blue-500">Editar</a>
                                <a href="{{route('afazer.show', $todo->id)}}" class="text-blue-500">Detalhes</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="py-4">
            {{ $todos->links() }}
        </div>
    @else
        <p>Nenhuma Tarefa Fora Informada</p>
    @endif
@endsection


@extends('dashboard.layouts.main')

@section('content')
    @php
        $countGeral = 0;
        $countConcluido = 0;
        $countNaoConcluido = 0;
        $countTrabalho = 0;
        $countEstudo = 0;
        $countCasa = 0;
        $countOutro = 0;
        $atrasada = 0;
        $hoje = 0;
        $comtempo = 0;
        foreach ($todos as $todo) {
            $countGeral++;
            $data_final = \Carbon\Carbon::parse($todo->data_final)->startOfDay();
            $data_inicial = \Carbon\Carbon::now()->startOfDay();
            $diferenca = $data_inicial->diff($data_final);
            $dias_restantes = $data_inicial->diffInDays($data_final, false);
            if ($todo->concluido) {
                $countConcluido++;
            } else {
                $countNaoConcluido++;
            }
            if ($todo->tipo == 'trabalho') {
                $countTrabalho++;
            } elseif ($todo->tipo == 'estudo') {
                $countEstudo++;
            } elseif ($todo->tipo == 'casa') {
                $countCasa++;
            } else {
                $countOutro++;
            }

            if ($dias_restantes < 0) {
                $atrasada++;
            } elseif ($dias_restantes == 0) {
                $hoje++;
            } else {
                $comtempo++;
            }
        }

    @endphp
    <h1 class="my-4">Informações:</h1>
    <h1 class="my-4">Total de Tarefas: {{$countGeral}}</h1>
    <div class="mb-4">
        <p><strong>Total de Tarefas Concluídas:</strong>
            <span class="badge bg-success">
                {{$countConcluido  }}
            </span>
        </p>
        <p><strong>Total de Tarefas Não Concluídas:</strong>
            <span class="badge bg-danger">
                {{$countNaoConcluido }}
            </span>
        </p>
    </div>

    <h3 class="mt-4">Tarefas por Tipo:</h3>
    <ul class="list-group mb-4">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <strong>Trabalho:</strong>
                <span class="badge bg-primary">
                    {{ $countTrabalho}}
                </span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <strong>Estudo:</strong>
                <span class="badge bg-info">
                    {{ $countEstudo }}
                </span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <strong>Casa:</strong>
                <span class="badge bg-warning">
                    {{ $countCasa }}
                </span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <strong>Outro:</strong>
                <span class="badge bg-secondary">
                    {{ $countOutro }}
                </span>
            </li>
    </ul>
    <h3 class="mt-4">Tempo para Entregas:</h3>
    <ul class="list-group mb-4">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <strong>Com tempo:</strong>
                <span class="badge bg-primary">
                    {{ $comtempo }}
                </span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <strong>Hoje:</strong>
                <span class="badge bg-info">
                    {{ $hoje }}
                </span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <strong>Atrasada:</strong>
                <span class="badge bg-warning">
                    {{ $atrasada }}
                </span>
            </li>
    </ul>
@endsection

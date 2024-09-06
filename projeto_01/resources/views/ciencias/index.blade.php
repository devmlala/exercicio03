@extends('layouts.app')

@section('content')
    <x-section-container 
        :title="'Climatologia'" 
        :description="'Bem-vindo à seção de Climatologia. Aqui você encontrará diversos materiais e recursos sobre climatologia.'"
        :items="[
            ['image' => 'path/to/image1.jpg', 'title' => 'Material 1', 'description' => 'Descrição breve do material 1.'],
            ['image' => 'path/to/image2.jpg', 'title' => 'Material 2', 'description' => 'Descrição breve do material 2.'],
            // Adicione mais itens conforme necessário
        ]"
    />

    <x-section-container 
        :title="'Geomorfologia'" 
        :description="'Bem-vindo à seção de Geomorfologia. Aqui você encontrará diversos materiais e recursos sobre geomorfologia.'"
        :items="[
            ['image' => 'path/to/image1.jpg', 'title' => 'Material 1', 'description' => 'Descrição breve do material 1.'],
            ['image' => 'path/to/image2.jpg', 'title' => 'Material 2', 'description' => 'Descrição breve do material 2.'],
            // Adicione mais itens conforme necessário
        ]"
    />
@endsection

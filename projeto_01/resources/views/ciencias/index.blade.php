<!-- resources/views/ciencias/index.blade.php -->

@extends('layouts.app')

@section('content')
    @foreach($categories as $category)
        <x-section-container 
            :title="$category->name" 
            :description="'Bem-vindo à seção de ' . $category->name . '. Aqui você encontrará diversos materiais e recursos sobre ' . $category->name . '.'"
            :items="$category->materials->map(function($material) {
                return [
                    'image' => $material->image ?? 'path/to/default_image.jpg', // Substitua pelo caminho da imagem ou uma imagem padrão
                    'title' => $material->title,
                    'description' => $material->content,
                ];
            })->toArray()"
        />
    @endforeach
@endsection

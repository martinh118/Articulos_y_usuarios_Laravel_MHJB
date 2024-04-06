<head>
    <link rel="stylesheet" href="/css/dashboard.css">

</head>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Articulos
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <button class="btnCrearArt">
                    <a href="{{route('dashboard.showCreate')}}">
                        Crear articulo
                    </a>
                </button>

                <div class="container mt-16 ">
                    <div class="row">
                        <div class="col">

                            @csrf
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            <section class='articles'>
                                <ul>
                                    @forelse($arts as $articulo)

                                    <li class="articulo">
                                        <b>{{ $articulo->{'id'} }}</b>: "{{ $articulo->{'article'} }}"
                                        -
                                        {{ $articulo->{'autor'} }}
                                        <!-- Button trigger modal -->
                                        <a href="{{route('dashboard.edit', $articulo->{'id'})}}" class="editButton">
                                            Edit
                                        </a>

                                    </li>
                                    @empty
                                    <li>Ningún articulo a mostrars!!!</li>
                                    @endforelse
                                </ul>
                            </section>

                            <section class='paginacio'>
                                <ul>
                                    {{ $arts->links() }}
                                </ul>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
<head>
    <link rel="stylesheet" href="/css/dashboard.css">
</head>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Articulos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="container mt-16">
                    <div class="row">
                        <div class="col">

                            @csrf
                            <section class='articles'>
                                <ul>
                                    @forelse($arts as $articulo)
                                    <li class="articulo">
                                        <b>{{ $articulo->{'ID'} }}</b>: "{{ $articulo->{'article'} }}"

                                        

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
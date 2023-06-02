<div>
    <!-- Alerts -->
    @include('partials.alerts')
    <!-- Alerts End -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="form-floating mb-3">
                        {!! Form::text('search', null, [
                            'class' => 'form-control' . ($errors->has('search') ? ' is-invalid' : ''),
                            'wire:model' => 'search',
                            'placeholder' => 'search',
                        ]) !!}
                        <label for="search">Buscar</label>
                    </div>
                    @can('crear usuarios')
                    <div>
                        <button type="button" class="btn btn-outline btn-outline-primary btn-active-primary" data-bs-toggle="modal"
                            data-bs-target="#modalForm">
                            Nuevo
                        </button>
                    </div>
                    @endcan

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table border text-nowrap text-md-nowrap table-striped mb-0"
                            id="datatable-product">
                            <thead>
                                <tr>
                                    <th class="">Código</th>
                                    <th class="">Nombre</th>
                                    <th class="">Stock</th>
                                    <th class="">Precio de Compra</th>
                                    <th class="">Precio de Venta</th>
                                    {{-- <th class="">Descripcion</th> --}}
                                    @can('editar usuarios')
                                        <th class="">Acciones</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>
                                            {{ $product->code}}
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->product }}</td>
                                        <td>{{ $product->purchase_price }}</td>
                                        <td>{{ $product->sale_price }}</td>
                                        @can('editar usuarios')
                                            <td>

                                                <button type="button" class="btn btn-active-icon-primary btn-text-primary" data-bs-toggle="modal"
                                                    data-bs-target="#modalForm" wire:click="edit({{ $product->id }})">
                                                    <i class="fa fa-pencil"></i>
                                                </button>

                                                @can('eliminar usuarios')
                                                    <button type="button" class="btn btn-active-icon-danger btn-text-danger" data-bs-toggle="modal"
                                                        data-bs-target="#modalForm" wire:click="delete({{ $product->id }})">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                @endcan
                                            </td>
                                        @endcan
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center py-4">No hay productos registrados</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="card-footer">
                    @include('partials.pagination', ['paginator' => $products])
                </div>
            </div>
        </div>
    </div>
    @include('inventory::livewire.product.form')

</div>

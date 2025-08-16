@extends('admin.layout')

@section('title', 'Equipment List')

@section('content')

    <x-page-header 
        title="Equipment List" 
        subtitle="Manage your sports equipment inventory"
        icon="fas fa-cogs"
        :breadcrumbs="['Equipment', 'List']">
    </x-page-header>

    <div class="table-container">
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr></tr>
                    <tr>
                        <th>Asset Tag</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Condition</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Serial Number</th>
                        <th>Purchase Price</th>
                        <th>Purchase Date</th>
                        <th>Specifications</th>
                        <th>Notes</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($equipments as $equipment)
                        <tr>
                            <td>{{ $equipment->asset_tag }}</td>
                            <td>{{ $equipment->name }}</td>
                            <td>{{ $equipment->category->name ?? 'N/A' }}</td>
                            <td>{{ $equipment->status }}</td>
                            <td>{{ $equipment->condition }}</td>
                            <td>{{ $equipment->brand}}</td>
                            <td>{{ $equipment->model}}</td>
                            <td>{{ $equipment->serial_number}}</td>
                            <td>{{ $equipment->purchase_price}}</td>
                            <td>{{ $equipment->purchase_date}}</td>
                            <td>{{ $equipment->specifications}}</td>
                            <td>{{ $equipment->notes}}</td>
                            <td>
                                <div class="action-buttons">
                                    {{-- View Button --}}
                                    {{-- <a href="{{ route('equipmentshow', $equipment->id) }}" 
                                        class="btn btn-sm btn-info" 
                                        title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </a> --}}
                                    
                                    {{-- Edit Button --}}
                                    <a href="{{ route('admin/equipment/edit', $equipment->id) }}" 
                                       class="btn btn-sm btn-warning" 
                                       title="Edit Equipment">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    
                                    {{-- Delete Button with Confirmation --}}
                                    <form action="{{ route('admin/equipment/destroy', $equipment->id) }}" 
                                          method="POST" 
                                          style="display: inline-block;"
                                          onsubmit="return confirm('Are you sure you want to delete {{ addslashes($equipment->name) }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-danger" 
                                                title="Delete Equipment">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

{{-- <th>
    <div class="icon-dropdown">
        <i class="fa-solid fa-filter dropdown-icon" id="filter-icon"></i>
        <div class="dropdown-menu" id="dropdown-menu">
            <a href="#" data-value="asset-tag">Asset Tag</a>
            <a href="#" data-value="category">Category</a>
            <a href="#" data-value="status">Status</a>
            <a href="#" data-value="condition">Condition</a>
            <a href="#" data-value="brand">Brand</a>
            <a href="#" data-value="model">Model</a>
            <a href="#" data-value="purchase-date">Purchase Date</a>
        </div>
    </div>
</th>
<th>
    <input type="text" class="table__filter-search" name="filter_search" id="filter-search" >
</th> --}}
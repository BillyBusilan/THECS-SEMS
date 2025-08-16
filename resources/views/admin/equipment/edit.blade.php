@extends('admin.layout')

@section('title', 'Edit Equipment')

@section('content')

    <x-page-header 
        title="Edit Equipment" 
        subtitle="Update equipment information"
        icon="fas fa-edit"
        :breadcrumbs="['Equipment', 'Edit']">
    </x-page-header>

    <div class="form-container">
        <div class="form-wrapper">
            <form action="{{ route('admin/equipment/update', $equipment->id) }}" method="POST" class="equipment-form">
                @csrf
                @method('PUT')
                
                <div class="form-grid">
                    {{-- Basic Information --}}
                    <div class="form-section">
                        <h3>Basic Information</h3>
                        
                        <div class="form-group">
                            <label for="asset_tag">Asset Tag *</label>
                            <input type="text" 
                                   id="asset_tag" 
                                   name="asset_tag" 
                                   value="{{ old('asset_tag', $equipment->asset_tag) }}" 
                                   class="form-control @error('asset_tag') is-invalid @enderror"
                                   required>
                            @error('asset_tag')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Equipment Name *</label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name', $equipment->name) }}" 
                                   class="form-control @error('name') is-invalid @enderror"
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category_id">Category *</label>
                            <select id="category_id" 
                                    name="category_id" 
                                    class="form-control @error('category_id') is-invalid @enderror"
                                    required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" 
                                            {{ old('category_id', $equipment->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Status Information --}}
                    <div class="form-section">
                        <h3>Status & Condition</h3>
                        
                        <div class="form-group">
                            <label for="status">Status *</label>
                            <select id="status" 
                                    name="status" 
                                    class="form-control @error('status') is-invalid @enderror"
                                    required>
                                <option value="Available" {{ old('status', $equipment->status) == 'Available' ? 'selected' : '' }}>Available</option>
                                <option value="In Use" {{ old('status', $equipment->status) == 'In Use' ? 'selected' : '' }}>In Use</option>
                                <option value="Maintenance" {{ old('status', $equipment->status) == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
                                <option value="Retired" {{ old('status', $equipment->status) == 'Retired' ? 'selected' : '' }}>Retired</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="condition">Condition *</label>
                            <select id="condition" 
                                    name="condition" 
                                    class="form-control @error('condition') is-invalid @enderror"
                                    required>
                                <option value="Excellent" {{ old('condition', $equipment->condition) == 'Excellent' ? 'selected' : '' }}>Excellent</option>
                                <option value="Good" {{ old('condition', $equipment->condition) == 'Good' ? 'selected' : '' }}>Good</option>
                                <option value="Fair" {{ old('condition', $equipment->condition) == 'Fair' ? 'selected' : '' }}>Fair</option>
                                <option value="Poor" {{ old('condition', $equipment->condition) == 'Poor' ? 'selected' : '' }}>Poor</option>
                                <option value="Damaged" {{ old('condition', $equipment->condition) == 'Damaged' ? 'selected' : '' }}>Damaged</option>
                            </select>
                            @error('condition')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Product Details --}}
                    <div class="form-section">
                        <h3>Product Details</h3>
                        
                        <div class="form-group">
                            <label for="brand">Brand</label>
                            <input type="text" 
                                   id="brand" 
                                   name="brand" 
                                   value="{{ old('brand', $equipment->brand) }}" 
                                   class="form-control @error('brand') is-invalid @enderror">
                            @error('brand')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="model">Model</label>
                            <input type="text" 
                                   id="model" 
                                   name="model" 
                                   value="{{ old('model', $equipment->model) }}" 
                                   class="form-control @error('model') is-invalid @enderror">
                            @error('model')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="serial_number">Serial Number</label>
                            <input type="text" 
                                   id="serial_number" 
                                   name="serial_number" 
                                   value="{{ old('serial_number', $equipment->serial_number) }}" 
                                   class="form-control @error('serial_number') is-invalid @enderror">
                            @error('serial_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Purchase Information --}}
                    <div class="form-section">
                        <h3>Purchase Information</h3>
                        
                        <div class="form-group">
                            <label for="purchase_price">Purchase Price</label>
                            <input type="number" 
                                   id="purchase_price" 
                                   name="purchase_price" 
                                   step="0.01"
                                   value="{{ old('purchase_price', $equipment->purchase_price) }}" 
                                   class="form-control @error('purchase_price') is-invalid @enderror">
                            @error('purchase_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="purchase_date">Purchase Date</label>
                            <input type="date" 
                                   id="purchase_date" 
                                   name="purchase_date" 
                                   value="{{ old('purchase_date', $equipment->purchase_date) }}" 
                                   class="form-control @error('purchase_date') is-invalid @enderror">
                            @error('purchase_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Additional Information --}}
                    <div class="form-section full-width">
                        <h3>Additional Information</h3>
                        
                        <div class="form-group">
                            <label for="specifications">Specifications</label>
                            <textarea id="specifications" 
                                      name="specifications" 
                                      rows="3"
                                      class="form-control @error('specifications') is-invalid @enderror">{{ old('specifications', $equipment->specifications) }}</textarea>
                            @error('specifications')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="notes">Notes</label>
                            <textarea id="notes" 
                                      name="notes" 
                                      rows="3"
                                      class="form-control @error('notes') is-invalid @enderror">{{ old('notes', $equipment->notes) }}</textarea>
                            @error('notes')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Equipment
                    </button>
                    <a href="{{ route('admin/equipment/index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
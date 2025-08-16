@extends('admin.layout')

@section('title', 'Create Equipment')

@section('content')
    <x-page-header 
        title="Add Equipment" 
        subtitle="Add sports equipment to the inventory"
        icon="fas fa-cogs"
        :breadcrumbs="['Equipment', 'Add']">
    </x-page-header>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Display success message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{route('admin/equipment/store')}}" class="equipment-form" method="POST" enctype="multipart/form-data">
        @csrf
        
        <label for="name">Asset Tag:</label>
        <input type="text" class="primary-input" name="asset_tag" id="asset_tag" required>

        <label for="name">Name:</label>
        <input type="text" class="primary-input" name="name" id="name" value="{{ old('name') }}" required>
        
        <label for="category_id">Category:</label>
        <select class="primary-input" name="category_id" id="category_id" required>
            <option value="">Select Category</option>
            <option value="1" {{ old('category_id') == '1' ? 'selected' : '' }}>Basketball</option>
        </select>
        
        <label for="condition">Condition:</label>
        <select class="primary-input" name="condition" id="condition" required>
            <option value="">Select Condition</option>
            <option value="excellent" {{ old('condition') == 'excellent' ? 'selected' : '' }}>Excellent</option>
            <option value="good" {{ old('condition') == 'good' ? 'selected' : '' }}>Good</option>
            <option value="fair" {{ old('condition') == 'fair' ? 'selected' : '' }}>Fair</option>
            <option value="poor" {{ old('condition') == 'poor' ? 'selected' : '' }}>Poor</option>
            <option value="damaged" {{ old('condition') == 'damaged' ? 'selected' : '' }}>Damaged</option>
        </select>

        <label for="brand">Brand:</label>
        <input type="text" class="primary-input" name="brand" id="brand" value="{{ old('brand') }}" required>

        <label for="model">Model:</label>
        <input type="text" class="primary-input" name="model" id="model" value="{{ old('model') }}" required>

        <label for="serial_number">Serial Number:</label>
        <input type="text" class="primary-input" name="serial_number" id="serial_number" value="{{ old('serial_number') }}" required>

        <label for="purchase_price">Purchase Price:</label>
        <input type="number" step="0.01" class="primary-input" name="purchase_price" id="purchase_price" value="{{ old('purchase_price') }}">

        <label for="purchase_date">Purchase Date:</label>
        <input type="date" class="primary-input" name="purchase_date" id="purchase_date" value="{{ old('purchase_date') }}">

        <label for="notes">Notes:</label>
        <textarea class="primary-input" name="notes" id="notes" rows="3">{{ old('notes') }}</textarea>

        <label for="image">Image:</label>
        <input type="file" class="primary-input" name="image" id="image" accept="image/jpeg,image/png,image/jpg,image/gif">
        
        <button type="submit">Add Equipment</button>
    </form>           
@endsection
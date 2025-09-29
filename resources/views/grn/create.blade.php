@section('content')
<div class="container">
    <h2>GRN Entry</h2>

    @if(session('success'))
    <div style="color:green">{{ session('success') }}</div>
    @endif



    <form action="{{ route('grn.store') }}" method="POST">
        @csrf
        <div>
            <label for="material_name">Material Name:</label>
            <select name="material_name" id="material_name" class="form-control">
                <option value="">Select Material</option>
                @foreach($materials as $material)
                <option value="{{ $material->id }}">{{ $material->item_name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Batch Number:</label>
            <input type="text" name="batch_number" required>
        </div>
        <div>
            <label>Quantity:</label>
            <input type="number" name="quantity" required>
        </div>
        <div>
            <label>Supplier:</label>
            <input type="text" name="supplier" required>
        </div>
        <div>
            <label>Manufacture Date:</label>
            <input type="date" name="manufacture_date" required>
        </div>
        <div>
            <label>Expiry Date:</label>
            <input type="date" name="expiry_date" required>
        </div>
        <button type="submit">Save GRN</button>
    </form>
</div>
@endsection
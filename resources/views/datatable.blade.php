@extends('layouts.app')

@section('title', '- Datatables')

@push('css-stack')
<link href="{{ asset('/plugins/datatables/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
@endpush


@section('content')

@php
    $vegetables = \App\Models\Vegetable::pluck('name','id')->toArray();
@endphp

<div class="container">

  <div class="row">

    <select id="vegetable" class="form-control show-tick">
        <option value selected="selected">-- Pilih Sayuran --</option>
        @foreach($vegetables as $key => $value)
            <option value="{{ $key }}"> {{ ucfirst($value) }}</option>
        @endforeach
    </select>

     <div class="col-md-10 col-md-offset-3">
      <table id="vegetable-datatables">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAMA MASAKAN</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
   </div>
  </div>
</div>

@endsection


@push('js-stack')
<script src="{{ asset('/plugins/datatables/datatables/js/jquery.dataTables.min.js')}}"></script>

<script>



// $(function() {
//     $("#vegetable-datatables").DataTable({
//         "processing": true,
//         "serverSide": true,
//         "responsive": true,
//         "ajax": {
//             "url": "/get/food",
//             "type": "POST"
//         },
//         "columns": [
//                { "data": "id" },
//                { "data": "name" }
//            ]
//     });
// });
</script>
@endpush

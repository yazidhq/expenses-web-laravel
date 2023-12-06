@extends('dashboard.layouts.template')

@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">
    <h2>Section title</h2>
    <a href="{{ route('income.create') }}" class="btn btn-dark my-3">Add New</a>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($income as $row)
                <tr>
                    <td>{{ $row->title }}</td>
                    <td>Rp. {{ number_format((float)$row->amount, 0, ',', '.') }}</td>
                    <td>{{ $row->date }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('income.edit', $row->slug) }}" class="btn btn-sm btn-warning rounded-0"><i
                                    class="bi bi-pencil-square"></i></a>
                            <button class="btn btn-sm btn-primary rounded-0" data-bs-toggle="modal"
                                data-bs-target="#incomeModal{{ $row->id }}"><i class="bi bi-eye"></i></button>
                            <!-- Modal -->
                            <div class="modal fade" id="incomeModal{{ $row->id }}" tabindex="-1"
                                aria-labelledby="incomeModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="incomeModalLabel">{{ $row->title }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Description: {{ $row->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('income.destroy', $row->slug) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger rounded-0"><i class="bi bi-trash3"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</main>

@stop
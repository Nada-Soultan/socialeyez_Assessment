@extends('layouts.app')

@section('adminContent')
    <div class="card mb-3">
        <div class="row flex-between-center">

            <div class="col-8 col-sm-auto text-end ps-3 ">

                <a href="{{ route('tasks.create') }}" class="btn btn-falcon-default btn-sm" type="button"><span
                        class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span><span
                        class="d-none d-sm-inline-block ms-1"> Add New Task</span></a>

            </div>
        </div>

        <div class="card-body p-0">

            <div class="table-responsive scrollbar">
                @if ($tasks->count() > 0)
                    <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                        <thead class="bg-200 text-900">
                            <tr>
                                <th class="sort pe-5 align-middle white-space-nowrap" data-sort="title">Title</th>
                                <th class="sort pe-5 align-middle white-space-nowrap" data-sort="completed">completed</th>
                                <th class="sort pe-5 align-middle white-space-nowrap" style="min-width: 100px;"
                                    data-sort="joined">Created at</th>
                                <th class="align-middle no-sort">Description</th>
                                <th class="sort pe-5 align-middle white-space-nowrap" style="min-width: 100px;"
                                    data-sort="joined">Action</th>
                            </tr>
                        </thead>
                        <tbody class="list" id="table-customers-body">
                            @foreach ($tasks as $task)
                                <tr class="btn-reveal-trigger">
                                    <td class="name align-middle white-space-nowrap py-2">
                                        <div class="d-flex d-flex align-items-center">
                                            <div class="flex-1">
                                                <h5 class="mb-0 fs--1">{{ $task->title }}</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="name align-middle white-space-nowrap py-2">
                                        <div class="d-flex d-flex align-items-center">
                                            <div class="flex-1">
                                                <h5 class="mb-0 fs--1">{{ $task->completed ? 'Yes' : 'No' }}</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="joined align-middle py-2">{{ $task->created_at }} <br>
                                        {{ interval($task->created_at) }}</td>
                                    <td class="joined align-middle py-2">
                                        @if ($task->title != null)
                                            <button class="btn btn-outline-success me-1 mb-1" type="button"
                                                data-bs-toggle="modal"
                                                data-bs-target="#show-task-{{ $task->id }}">Show</button>
                                        @endif
                                    </td>
                                    <td class="align-middle white-space-nowrap py-2 text-end">
                                        <div class="dropdown font-sans-serif position-static">
                                            <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal"
                                                type="button" id="customer-dropdown-{{ $task->id }}"
                                                data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                                aria-expanded="false">
                                                <span class="fas fa-ellipsis-h fs--1"></span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end border py-0"
                                                aria-labelledby="customer-dropdown-{{ $task->id }}">
                                                <div class="bg-white py-2">
                                                    <a class="dropdown-item"
                                                        href="{{ route('tasks.edit', ['task' => $task->id]) }}">Edit</a>
                                                    <form method="POST"
                                                        action="{{ route('tasks.destroy', ['task' => $task->id]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item text-danger"
                                                            type="submit">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @foreach ($tasks as $task)
                        <div class="modal fade" id="show-task-{{ $task->id }}" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
                                <div class="modal-content position-relative">
                                    <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                        <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-0">
                                        <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                            <h4 class="mb-1" id="modalExampleDemoLabel">Details</h4>
                                        </div>
                                        <div class="p-4 pb-0">
                                            <div class="table-responsive scrollbar">
                                                <table class="table table-bordered overflow-hidden">
                                                    <colgroup>
                                                        <col class="bg-soft-primary" />
                                                        <col />
                                                    </colgroup>
                                                    <tbody>
                                                        <tr class="btn-reveal-trigger">
                                                            <td>Description</td>
                                                            <td>{{ $task->description }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h3 class="p-4">No tasks to show</h3>
                @endif
            </div>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-center ">
            {{ $tasks->appends(request()->query())->links() }}
        </div>
    </div>

@endsection

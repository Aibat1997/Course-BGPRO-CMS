@extends('admin.layouts.layout')

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<style>
    .card-header{
        display: flex;
        justify-content: space-between;
    }
    .links{
        color:#ffff;
    }
</style>
@endpush

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Все вопросы</h5>
                                    <div class="links">
                                        <a href="/admin/{{ $lesson->id }}/questions/create" class="btn btn-primary m-b-0">Добавить</a>
                                        <a href="/admin/{{ $lesson->id }}/questions/create/excel" class="btn btn-warning m-b-0">Добавить Excel-файлом</a>
                                        <a href="/admin/{{ $lesson->course->id }}/lessons/{{ $lesson->id }}/edit" class="btn btn-primary m-b-0">Редактировать урок</a>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="order-table"
                                            class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Название</th>
                                                    <th>Сортировка</th>
                                                    <th>Перейти к ответам</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($questions as $item)
                                                <tr>
                                                    <td>{{ $item->name_ru }}</td>
                                                    <td>{{ $item->sort_num }}</td>
                                                    <td>
                                                        <a href="/admin/{{ $item->id }}/answers" class="btn btn-primary m-b-0">Ответы</a>
                                                    </td>
                                                    <td>
                                                      <a href="javascript:void(0)" onclick="remove(this,'{{ $item->id }}','{{ $lesson->id }}/questions')">
                                                        <i class="fa fa-trash"></i>
                                                      </a>
                                                    </td>
                                                    <td><a href="/admin/{{ $lesson->id }}/questions/{{ $item->id }}/edit"><i class="fa fa-pencil"></i></a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#order-table').DataTable();
    });

    function remove(ob, id, model) {
        var answ = confirm("Вы действительно хотите удалить?");
        if (answ) {
            $.ajax({
                url: "/admin/" + model + "/" + id,
                type: 'DELETE',
                dataType: 'json',
                data: {
                    _token: '{{csrf_token()}}'
                },
                success: function(response) {
                    $(ob).closest('tr').remove();
                },
                error: function(response) {
                    console.log(response);
                }
            });
        }
    }
</script>
@endpush
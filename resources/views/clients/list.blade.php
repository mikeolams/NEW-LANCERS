@extends('layouts.auth')
@section('style')

@endsection


@section('main-content')
    <section class="">
        <div class="container-fluid">
            <h4 class="mt-0 text-primary">Clients</h4>
            <div class="">
                <div class="">
                    <form class="form-inline" method="GET" >
                    <select class="form-control" id="select-filter">
                        <option value="all" @if (Request()->filter) {{ 'selected' }} @endif >All</option>
                        <option value="pending" @if (Request()->filter && Request()->filter == 'pending') {{ 'selected' }} @endif>Pending</option>
                        <option value="active" @if (Request()->filter && Request()->filter == 'active') {{ 'selected' }} @endif>Active</option>
                        <option value="completed" @if (Request()->filter && Request()->filter == 'completed') {{ 'selected' }} @endif>Completed</option>
                    </select>
                </form>
                <!-- <form class="form-inline" method="GET" >
                       
                    <select class="form-control" id="select-filter">
                        <option value="all" @if (Request()->filter) {{ 'selected' }} @endif ><a href="clients?filter=all">All</a></option>
                        <option value="pending" @if (Request()->filter && Request()->filter == 'pending') {{ 'selected' }} @endif><a href="clients?filter=pending">Pending</a></option>
                        <option value="active" @if (Request()->filter && Request()->filter == 'active') {{ 'selected' }} @endif><a href="clients?filter=active">Active</a></option>
                        <option value="completed" @if (Request()->filter && Request()->filter == 'completed') {{ 'selected' }} @endif><a href="clients?filter=completed">Completed</a></option>
                    </select>
                </form> -->






                </div>
                <div class="table-responsive">
                    <table class="table project-table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Title</th>
                                <th scope="col">Start Date</th>
                                <th class="text-right" scope="col">Paid</th>
                                <th class="text-right" scope="col">Due</th>
                                <th scope="col">Status</th>
                                <th scope="col"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($projects) && count($projects) < 1)
                            <tr class="py-2">

                                <td colspan="7">No project found</td>
                            </tr>
                            @else
                                @foreach($projects as $project)
                                <tr class="py-2">
                                    <td scope="row" class="rounded-left border border-right-0">
                                        <span class="text-small text-muted mr-2">
                                            <i class="fas fa-circle"></i>
                                        </span> 
                                        <span class="">{{$project->created_at}}</span>
                                    </td>
                                    <td class="border-top border-bottom titles">{{$project->title}}</td>
                                    <td class="border-top border-bottom">{{$project->start}}</td>
                                    <td class="border-top border-bottom text-right">{{$project->invoice_currency == null ? $project->estimate_currency : $project->invoice_currency}}{{$project->amount == null ? 0 : $project->amount}}</td>
                                    <td class="border-top border-bottom text-right">{{$project->invoice_currency == null ? $project->estimate_currency : $project->invoice_currency}}{{$project->amount_paid == null ? 0 : $project->amount_paid}}</td>
                                    <td class="border-top border-bottom">
                                        <span class="alert alert-primary py-0 px-2 small m-0 pending">{{$project->status}}</span>
                                    </td>
                                    <td class="rounded-right border border-left-0">
                                        <div class="dropdown dropleft">
                                            <a class="btn btn-white btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item text-success" href="#"><i class="fas fa-binoculars"></i> View</a>
                                                <a class="dropdown-item text-secondary" href="#"><i class="fas fa-edit"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="#"><i class="fas fa-trash-alt"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                        
                    </table>
                </div>

<!-- <div class="container">
    <section class="">
        <div class="container-fluid">
            <h4 class="mt-0 text-primary">Client</h4>
            <div class="">
                <div class="">
                    <form class="form-inline">
                        <select class="form-control status">
                            <option value="All">All</option>
                            <option value="Completed">Completed</option>
                            <option value="Pending">Pending</option>
                            <option value="Active">Active</option>
                        </select>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table project-table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Company</th>
                                <th scope="col">Name</th>
                                <th scope="col">Project</th>
                                <th scope="col">Progress</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="py-2">
                                <td scope="row" class="rounded-left border border-right-0">
                                    <span class="text-small text-muted mr-2">
                                        <i class="fas fa-circle"></i>
                                    </span> 
                                    <span class="">Mar. 10, 2019</span>
                                </td>
                                <td class="border-top border-bottom titles">Naijacrawl</td>
                                <td class="border-top border-bottom">Adike Kizito</td>
                                <td class="border-top border-bottom text-right">Build App</td>
                                <td class="border-top border-bottom">
                                    <span class="alert alert-primary py-0 px-2 small m-0 pending">Pending</span>
                                </td>
                                <td class="rounded-right border border-left-0">
                                    <div class="dropdown dropleft">
                                        <a class="btn btn-white btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item text-success" href="#"><i class="fas fa-binoculars"></i> View</a>
                                            <a class="dropdown-item text-secondary" href="#"><i class="fas fa-edit"></i> Edit</a>
                                            <a class="dropdown-item text-danger" href="#"><i class="fas fa-trash-alt"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="py-2">
                                <td scope="row" class="rounded-left border border-right-0">
                                    <span class="text-small text-muted mr-2">
                                        <i class="fas fa-circle"></i>
                                    </span> 
                                    <span class="">Mar. 10, 2019</span>
                                </td>
                                <td class="border-top border-bottom titles">Naijacrawl</td>
                                <td class="border-top border-bottom">Adike Kizito</td>
                                <td class="border-top border-bottom text-right">Build App</td>
                                <td class="border-top border-bottom">
                                    <span class="alert alert-primary py-0 px-2 small m-0 pending">Pending</span>
                                </td>
                                <td class="rounded-right border border-left-0">
                                    <div class="dropdown dropleft">
                                        <a class="btn btn-white btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item text-success" href="#"><i class="fas fa-binoculars"></i> View</a>
                                            <a class="dropdown-item text-secondary" href="#"><i class="fas fa-edit"></i> Edit</a>
                                            <a class="dropdown-item text-danger" href="#"><i class="fas fa-trash-alt"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="py-2">
                                <td scope="row" class="rounded-left border border-right-0">
                                    <span class="text-small text-muted mr-2">
                                        <i class="fas fa-circle"></i>
                                    </span> 
                                    <span class="">Mar. 10, 2019</span>
                                </td>
                                <td class="border-top border-bottom titles">Naijacrawl</td>
                                <td class="border-top border-bottom">Adike Kizito</td>
                                <td class="border-top border-bottom text-right">Build App</td>
                                <td class="border-top border-bottom">
                                    <span class="alert alert-primary py-0 px-2 small m-0 pending">Pending</span>
                                </td>
                                <td class="rounded-right border border-left-0">
                                    <div class="dropdown dropleft">
                                        <a class="btn btn-white btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item text-success" href="#"><i class="fas fa-binoculars"></i> View</a>
                                            <a class="dropdown-item text-secondary" href="#"><i class="fas fa-edit"></i> Edit</a>
                                            <a class="dropdown-item text-danger" href="#"><i class="fas fa-trash-alt"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>  -->


            </div>
        </div>
    </section>
@endsection


@section('others')
    <button  onclick="window.location.assign('/clients/add')" class="btn btn-secondary text-white rounded-circle" id="add-something">
        <i class="fas fa-plus"></i>
    </button>
@endsection

@section('script')
<script>

    let selectStatus = document.querySelector('#select-filter');
    selectStatus.addEventListener('change', function () {
        // console.log('change here')
        // this.form.action = "/projects?status="+selectStatus.value;
        // this.form.submit();
        if (selectStatus.value == 'all')
            window.location.href = "/clients";
        else
            window.location.href = "/clients?filter=" + selectStatus.value;
    }, false)
</script>
@endsection
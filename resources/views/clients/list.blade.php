@extends('layouts.auth')

@section('main-content')
   
    <section class="">
        <div class="container-fluid">
            <h4 class="mt-0 text-primary">CLIENTS</h4>
            <div class="">
                <div class="topControl">
                    <form class="form-inline" method="GET" >
                    <select class="form-control" id="select-filter">
                        <option value="all" @if (Request()->filter) {{ 'selected' }} @endif >All</option>
                        <option value="pending" @if (Request()->filter && Request()->filter == 'pending') {{ 'selected' }} @endif>Pending</option>
                        <option value="active" @if (Request()->filter && Request()->filter == 'active') {{ 'selected' }} @endif>Active</option>
                        <option value="completed" @if (Request()->filter && Request()->filter == 'completed') {{ 'selected' }} @endif>Completed</option>
                    </select>
                </form>
                <button id='btn' class="btn-secondary text-white " onclick="window.location.assign('/clients/add')"> + add New Client</button><br>
                </div>

                <div class="table-responsive">
                    <table class="table project-table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Company</th>
                                <th scope="col">Name</th>
                                <th scope="col">Project</th>
                                <th scope="col">Status</th>
                            </tr>

                        </thead>
                        <tbody>
                            @if(isset($clients) && count($clients) < 1)
                            <tr class="py-2">

                                <td colspan="7">No client found</td>
                            </tr>
                            @else
                                @foreach($clients as $client)
                                <tr class="py-2">
                                    <td scope="row" class="rounded-left border border-right-0">
                                        <span class="text-small text-muted mr-2">
                                            <i class="fas fa-circle"></i>
                                        </span> 
                                        <span class="">{{$client->created_at}}</span>
                                    </td>
                                    <td class="border-top border-bottom titles">{{$client->company}}</td>
                                    <td class="border-top border-bottom">{{$client->name}}</td>
                                    <td class="border-top border-bottom">{{$client->project}}</td>
                                    <td class="border-top border-bottom act" >{{$client->status}}</td>

                                    <td class="rounded-right border border-left-0">
                                        <div class="dropdown dropleft">
                                            <a class="btn btn-white btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item text-success" href="/client-info"><i class="fas fa-binoculars"></i> View</a>
                                                <a class="dropdown-item text-secondary" href="/clients/Client_Company_List"><i class="fas fa-edit"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="/redirect"><i class="fas fa-trash-alt"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                        
                    </table>
                </div>
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
    }, false);

    let selectClients = document.querySelector('tr');
    selectClients.addEventListener('change', function () {
        // console.log('change here')
        // this.form.action = "/projects?status="+selectStatus.value;
        // this.form.submit();
        for(client of selectClients){
            if (client!=selectClient[0]){
                window.location.href = "/clients?client=" + client.title;
            };
        }
    }, false)
</script>
@endsection
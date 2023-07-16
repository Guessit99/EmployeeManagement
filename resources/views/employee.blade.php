<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employee Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }

        form {
            text-align: center;
        }

        .pagination {
            display: inline-block;
        }

        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <form action="{{route('employee.create')}}" method="post">
        @csrf
        <input type="hidden" value="{{$employee->id ?? ''}} " name="employee_id">
        <div class="form-group row">
            <label for="number" class="col-sm-2 col-form-label">Employee ID </label>
            <div class="col-sm-10">
                <input type="number" name="Employee_Id" value="{{$employee->id ?? ''}}" class="form-control" placeholder="Enter employee id">
            </div>
        </div></br>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Employee First Name</label>
            <div class="col-sm-10">
                @php
                $name=$employee->name ?? '';

                $name=explode(' ',$name);
                @endphp

                <input type="text" name="Employee_First_Name" value="{{$name[0] ?? ''}}" class="form-control" placeholder="Enter employee first name">
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Employee Last Name</label>
            <div class="col-sm-10">
                <input type="text" name="Employee_Last_Name" value="{{$name[1] ?? ''}}" class="form-control" placeholder="Enter employee last name">
            </div>
        </div>

        <div class="form-group row">
            <label for="Department" class="col-sm-2 col-form-label">Department</label>
            <div class="col-sm-10">
                <select name="Department" id="Department" class="form-control">
                    <option>Select Department</option>
                    <option value="IT" {{ isset($employee->department) && $employee->department=="IT" ? "selected" : ""}}>IT</option>
                    <!-- //ternary operator -->
                    <option value="Graphics" {{isset($employee->department) &&$employee->department=='Graphics' ? 'selected' : ''}}>Graphics</option>
                    <option value="HR" {{isset($employee->department) && $employee->department=='HR' ? 'selected' : ''}}>HR</option>
                    <option value="R&D" {{isset($employee->department) && $employee->department=='R&D' ? 'selected' : ''}}>R&D</option>
                </select><br />
                <div>
                    <button type="reset" class="btn btn-primary">Reset</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>

    </form>


    <div>
        <table style="width: 100%" id="example">
            <thead>
                <tr>
                    <th>Employee Id</th>
                    <th>Employee Name</th>
                    <th>Department</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($employee_mangement as $key => $dtl)
                <tr>
                    <td scope="row">{{$key + 1}}</td>
                    <td>{{$dtl->name}}</td>
                    <td>{{$dtl->department}}</td>

                    <td>
                        <input type="button" id="edit_button1" onclick="confirm_edit('{{$dtl->id}}')" value="Edit" class="btn btn-info">
                        <button type="button" onclick="confirm_delete('{{$dtl->id}}')" class="btn btn-info"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>
        <div class="pagination">
            <a href="#">&laquo;</a>
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">6</a>
            <a href="#">&raquo;</a>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

<script>
    function confirm_edit(id) {
        var result = confirm("Want to edit?");
        if (result) {
            //Logic to delete the item
            // console.log("{{url('edit/')}}" + "/" + id);
            location.href = "{{url('employee')}}" + "?id=" + id;
        }
    }

    function confirm_delete(id) {
        var result = confirm("Want to delete?");
        if (result) {
            //Logic to delete the item
            // console.log("{{url('delete/')}}" + "/" + id);
            location.href = "{{url('employee')}}" + "?id=" + id;
        }
    }
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

</html>
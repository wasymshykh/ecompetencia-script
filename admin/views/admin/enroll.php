<?php var_dump($slot_details); ?>

<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="slots.php">Slots List</a></li>
        <li class="breadcrumb-item active">Enroll</li>
        </ul>
    </div>
</div>

<section>
    <div class="container-fluid">
        <div class="row mt-4">

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Enroll Participant</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="form-group">
                                        <label for="participant">Participant</label>
                                        <select name="participant" id="participant" class="form-control">
                                            <option value="">--select participant--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="form-group pt-4">
                                        <input type="submit" class="btn btn-primary" value="Enroll">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Currently Enrolled</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>Name</th>
                                <th>Team Name</th>
                                <th>Members</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <td>Hello</td>
                                <td>adasd asd</td>
                                <td><b>3</b> <span>DSf</span></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i>&nbsp; Remove</a>
                                </td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
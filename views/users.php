<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h1>Users</h1>
                </div>
                <div class="card-body">
                    <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>Mail</th>
                                <th>Reviews</th>
                                <th>Edit</th>
                                <th>Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($params as $user) {
                                echo"
                                        <tr>
                                        <td>$user[username]</td>
                                        <td>$user[email]</td>
                                        <td>#Number</td>
                                        <td><a href="; echo"/updateUser?id=$user[id]"; echo">Edit</a></td>
                                        <td><a href="; echo "/deleteUser?id=$user[id]"; echo">Remove</a></td>
                                        </tr>
                                    ";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
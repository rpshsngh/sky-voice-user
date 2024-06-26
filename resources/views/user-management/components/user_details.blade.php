<div class="col-md-6 grid-margin">
    <div class="card bg-primary">

        <div class="card-body p-1">

            <h4 class="card-title text-white ps-4 my-4">User Details</h4>

            <div class="card-content" id="card-content">                

                    <div class="card">

                        <div class="card-body" id="user-details-card-body">

                            <!-- Loader -->
                            <div id="loader" style="display: none">
                                <!-- Your loader HTML or CSS code here -->
                                <div class="jumping-dots-loader">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>

                            <!-- Data Content -->
                            <div id="data-content" style="">
                                
                                <!-- This will be displayed once the data is loaded -->
    
                                <div class="row border-bottom">

                                    <div class="col-md-3 text-center">
                                        <img id="cdata-profile-pic" src="{{ asset("assets/images/profile-pic.png") }}"
                                            class="img-lg rounded-circle mb-2 cdata-profile-pic"
                                            alt="profile image">
                                        <p class="cdata-name text-center" id="cdata-name" style="font-size: 13px; text-align: start; font-weight: 600;"></p>
                                        <button class="btn btn-primary btn-sm mt-3 mb-4 text-white" id="cdata-status">Status</button>
                                    </div>

                                    <div class="col-md-8">
                                    
                                        <div class="table-responsive" style="height: 100%">

                                            <table style="height: 100%">
                                                <tbody>
                                                    <tr>
                                                        <th>
                                                            <p>Email:</p>
                                                        </th>
                                                        <td>
                                                            <p class="cdata-email" id="cdata-email"></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <p>Mobile:</p>
                                                        </th>
                                                        <td>
                                                            <p class="cdata-mobile"  id="cdata-mobile"></p>
                                                        </td>
                                                    </tr>
    
                                                    <tr>
                                                        <th>
                                                            <p>Password:</p>
                                                        </th>
                                                        <td>
                                                            <p class="cdata-password" id="cdata-password"></p>
                                                        </td>
                                                    </tr>
    
                                                    <tr>
                                                        <th>
                                                            <p>Configuration:</p>
                                                        </th>
                                                        <td>
                                                            <p class="cdata-config" id="cdata-config"></p>
                                                        </td>
                                                    </tr>                                               
                                                   
                                                </tbody>
                                            </table>

                                        </div>
    
                                    </div>
                                   
                                </div>

                                <div class="row pt-3">

                                    <h5 class="pb-4">Call Logs</h5>

                                    <div class="table-responsive">

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <h6>Mobile Number</h6>
                                                    </th>
                                                    <th>
                                                        <h6>Timing</h6>
                                                    </th>
                                                    <th>
                                                        <h6 class="text-center">Play Records</h6>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>955363888744</td>
                                                    <td>10:00am</td>
                                                    <td class="text-center">
                                                        <audio controls>
                                                            <source src=""
                                                                type="audio/ogg">
                                                            <source src=""
                                                                type="audio/mpeg">
                                                        </audio>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>

                                </div>

                                <div class="row pt-3">

                                    <div class="table-responsive">

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <h6>Recived Calls</h6>
                                                    </th>
                                                    <th>
                                                        <h6>Missed Calls</h6>
                                                    </th>
                                                    <th>
                                                        <h6>Total calls</h6>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="ps-5">40</td>
                                                    <td class="ps-5">10</td>
                                                    <td class="ps-5">50</td>
                                                </tr>
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
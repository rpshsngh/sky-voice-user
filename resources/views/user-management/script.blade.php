<script>

    //get all users details in view users section on DOM load start
    function getAllSubUsers() {
        fetch('https://skyvoice.ntscabs.com/all-sub-user')
            .then(response => response.json())
            .then(data => {
                if (data.status) {
                    document.getElementById("currentUser").innerText = data.sub_users_count;
                    document.getElementById("totalUsers").innerText = data.sub_users_limit;

                    renderSubUsers(data.sub_user_list);
                    setProgress();
                    addUser();

                } else {
                    console.error(data.message);
                }
            })
            .catch(error => console.error('Error fetching sub-user data:', error));
    }

    function renderSubUsers(subUserList) {
        const container = document.getElementById('view-user-container');
        container.innerHTML = ''; // Clear existing content if needed

        if (subUserList.length > 0) {
            subUserList.forEach(subUser => {

                var card = createUserCard(subUser);

                container.insertAdjacentHTML('beforeend', card);
            });
        } else {
            container.textContent = 'No sub-users found.';
        }

        readMoreBtn();
    }
    //get all users details in view users section on DOM load end

    //create user card for view users section start
    function createUserCard(subUser) {
        return `<div class="col-12 col-md-6 col-lg-4 col-sm-6 grid-margin stretch-card" id="user-card-${subUser.id}">
                <div class="card">
                    <div class="card-body view-user-card-body p-4" data-subuser='${JSON.stringify(subUser)}'>

                        <div class="d-flex">
                            <img src="${subUser.profile_pic ? subUser.profile_pic : "{{ asset('assets/images/profile-pic.png') }}"}" class="img-lg rounded ctext-name" alt="profile image">
                        </div>

                        <div class="table-responsive box11 mt-3">
                            <table>
                                <tbody class="table-body">
                                    <tr>
                                        <th><p>Name : </p></th>
                                        <td><p class="ctext-name">${subUser.name}</p></td>
                                    </tr>
                                    <tr>
                                        <th><p>Email : </p></th>
                                        <td><p class="ctext-email">${subUser.email}</p></td>
                                    </tr>
                                    <tr>
                                        <th><p>Mobile : </p></th>
                                        <td><p class="ctext-mobile">${subUser.phone}</p></td>
                                    </tr>
                                    <tr>
                                        <th><p>Status : </p></th>
                                        <td>
                                            <p class="c-toggleicon02">
                                                <input type="checkbox" ${subUser.status === '1' ? 'checked' : ''}>
                                                <span class="icon"></span>
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <hr>

                        <div class="pt-1">
                            <div class="d-flex" style="justify-content: space-between;">
                                <div class="d-flex align-items-center">
                                    <h6 class="mb-0">Action</h6>
                                </div>
                                <div>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-outline-secondary view-btn1" onclick="view_form(event)">
                                            <i class="mdi mdi-eye" style="font-size: 0.95rem !important;"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-secondary editButton1" onclick='edit_form(${JSON.stringify(subUser)})'>
                                            <i class="mdi mdi-grease-pencil" style="font-size: 0.95rem !important;"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-secondary" onclick="confirmDelete(${subUser.id})">
                                            <a href="#"><i class="mdi mdi-delete" style="font-size: 0.95rem !important;"></i></a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>`;
    }

    //create user card for view users section end

    //Add new user start
    function addUser() {

        document.getElementById('add_user_form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
            var form = document.getElementById('add_user_form');
            var formData = new FormData(form);

            var profilePicInput = document.getElementById('itemProfilePhoto');
            if (profilePicInput.files.length > 0) {
                var reader = new FileReader();
                reader.readAsDataURL(profilePicInput.files[0]);
                reader.onload = function(e) {
                    formData.set('profile_pic', e.target.result); // Set profile_pic field as base64 data
                    sendFormData(formData, csrfToken);
                };
            }

            fetch("https://skyvoice.ntscabs.com/add-sub-user", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": csrfToken,
                    },
                    body: formData,
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.status) {

                        const container = document.getElementById('view-user-container');

                        form.reset();

                        var card = createUserCard(data.user);

                        container.insertAdjacentHTML('beforeend', card);

                        updateProgress("add");

                        var read_more_btn = document.getElementById('read-more-btn');

                        var span_btn = read_more_btn.querySelector("span");

                        if (span_btn.textContent === "Read Less") {
                            document.getElementById(`user-card-${data.user.id}`).style.display = "block";
                        }

                        readMoreBtn();

                        alert("User added successfully");
                    } else {
                        console.error(data.message);
                    }
                })
                .catch(error => {
                    console.error("Error sending user data:", error);
                });
        });
    }
    //Add new user end

    //read more button in view user section start
    function readMoreBtn() {

        var initialVisibleCards = 3;
        var totalCards = document.querySelectorAll('.card-container .grid-margin').length;
        var limitReached = false;

        // Show the first three cards initially
        var cardsToShow = document.querySelectorAll('.card-container .grid-margin');

        for (var i = 0; i < initialVisibleCards && i < cardsToShow.length; i++) {
            cardsToShow[i].style.display = 'block';
        }

        document.getElementById('read-more-btn').addEventListener('click', function() {
            var hiddenCards = document.querySelectorAll('.card-container .grid-margin:not(:nth-child(-n+' +
                initialVisibleCards + ')):not([style*="display: block"])');

            if (hiddenCards.length > 0) {
                // Show the next three hidden cards
                for (var i = 0; i < initialVisibleCards && i < hiddenCards.length; i++) {
                    hiddenCards[i].style.display = 'block';
                }

                // Toggle "Read Less" button visibility if limit is reached
                if (document.querySelectorAll('.card-container .grid-margin[style*="display: block"]')
                    .length === totalCards) {
                    limitReached = true;
                    this.querySelector('span').textContent = 'Read Less';

                    // Update the next <i> tag
                    const nextIcon = this.querySelector('span').nextElementSibling;
                    if (nextIcon && nextIcon.tagName.toLowerCase() === 'i') {
                        nextIcon.classList.remove('fa-chevron-down');
                        nextIcon.classList.add('fa-chevron-up');
                    }
                }

                // Scroll to the top of the next set of cards
                var nextSetTop = hiddenCards[0].offsetTop;
                window.scrollTo({
                    top: nextSetTop,
                    behavior: 'smooth'
                });
            } else {
                // Hide all cards beyond the initial set
                var cardsToHide = document.querySelectorAll('.card-container .grid-margin:nth-child(n+' + (
                    initialVisibleCards + 1) + ')');
                cardsToHide.forEach(function(card) {
                    card.style.display = 'none';
                });
                this.querySelector('.arrow-icon').classList.remove('rotate180');
                this.querySelector('span').textContent = 'Read More';
                // Hide "Read More" button

                // Update the next <i> tag
                const nextIcon = this.querySelector('span').nextElementSibling;
                if (nextIcon && nextIcon.tagName.toLowerCase() === 'i') {
                    nextIcon.classList.remove('fa-chevron-up');
                    nextIcon.classList.add('fa-chevron-down');
                }

                // Scroll to the top of the card container
                window.scrollTo({
                    top: document.querySelector('.card-container').offsetTop,
                    behavior: 'smooth'
                });
            }
        });


    }
    //read more button in view user section end

    // view user detail in user details div start
    function view_form(event) {

        const pageHeaderTitle = document.getElementById("pageHeader");

        const cardBody = event.target.closest('.view-user-card-body');
        const subUser = JSON.parse(cardBody.getAttribute('data-subuser'));
        const defaultProfilePic = '{{ asset('assets/images/profile-pic.png') }}';

        var form_profile_pic = document.getElementById("cdata-profile-pic");
        var form_name = document.getElementById("cdata-name");
        var form_status = document.getElementById("cdata-status");

        var form_email = document.getElementById("cdata-email");
        var form_mobile = document.getElementById("cdata-mobile");
        var form_password = document.getElementById("cdata-password");

        form_profile_pic.src = subUser.profile_pic ? subUser.profile_pic : defaultProfilePic;
        form_name.innerText = subUser.name;
        form_status.innerText = subUser.status === '1' ? "Active" : "Inactive";

        // Remove existing bg-success or bg-danger class
        form_status.classList.remove('btn-primary', 'btn-danger', 'btn-success');

        // Add the appropriate class based on the status
        form_status.classList.add(subUser.status === '1' ? 'btn-success' : 'btn-danger');

        form_email.innerText = subUser.email;
        form_mobile.innerText = subUser.phone;
        form_password.innerText = subUser.password;


        // Scroll to form-title
        pageHeaderTitle.scrollIntoView({
            behavior: 'smooth'
        });
    }
    // view user detail in user details div end

    //update user start
    function edit_form(userData) {

        var formDiv = document.getElementById("formDiv");
        var formTitle = formDiv.querySelector("#form-title");
        formTitle.innerText = "Edit User";

        var form = document.getElementById("add_user_form");

        var inputName = form.querySelector("#itemName");
        inputName.value = userData.name;

        var inputEmail = form.querySelector("#itemEmail");
        inputEmail.value = userData.email;

        var inputPassword = form.querySelector("#itemPassword");
        inputPassword.value = userData.password;

        var inputMobile = form.querySelector("#itemMobile");
        inputMobile.value = userData.phone;

        // var inputName = form.querySelector("itemName");
        // inputName.value = ;

        var inputMobile = form.querySelector("#submitButton");
        inputMobile.innerHTML = "Update";

    }
    //update user end

    //Delete user details in user details section start
    function confirmDelete(userId) {

        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this user!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {

                fetch(`https://skyvoice.ntscabs.com/delete-sub-user/${userId}`, {
                        method: "DELETE",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": csrfToken,
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status) {
                            Swal.fire(
                                'Deleted!',
                                'Your User has been deleted.',
                                'success'
                            );
                            // Remove the user card or refresh the user list
                            document.getElementById(`user-card-${userId}`).remove();

                            updateProgress("delete");

                        } else {
                            console.error(data.message);
                        }
                    })
                    .catch(error => {
                        console.error("Error deleting user:", error);
                    });
            }
        });
    }
    //Delete user details in user details section end

    // Progress bar start
    function setProgress() {
        var progressBar = document.getElementById("progressBar");
        var currentUsers = parseInt(document.getElementById("currentUser").innerText);
        var totalUsers = parseInt(document.getElementById("totalUsers").innerText);

        var formDiv = document.getElementById("formDiv");
        var contentDiv = document.getElementById("contentDiv");

        // Calculate the progress percentage
        var progressPercentage = (currentUsers / totalUsers) * 100;

        // Update the progress bar width and aria-valuenow attribute
        progressBar.style.width = progressPercentage + "%";
        progressBar.setAttribute("aria-valuenow", progressPercentage);

        // Toggle visibility of formDiv and contentDiv based on progress
        if (currentUsers >= totalUsers) {
            formDiv.style.display = "none";
            contentDiv.style.display = "block";
        } else {
            formDiv.style.display = "block";
            contentDiv.style.display = "none";
        }
    }
    // Progress bar end

    // Update Progress bar start
    function updateProgress(type) {
        var progressBar = document.getElementById("progressBar");
        var currentUsers = parseInt(document.getElementById("currentUser").innerText);
        var totalUsers = parseInt(document.getElementById("totalUsers").innerText);


        var formDiv = document.getElementById("formDiv");
        var contentDiv = document.getElementById("contentDiv");

        // Calculate the progress percentage
        if (type === "add") {
            document.getElementById("currentUser").innerText = parseInt(document.getElementById("currentUser")
                .innerText) + 1;
            var progressPercentage = ((currentUsers + 1) / totalUsers) * 100;
        } else if (type === "delete") {
            document.getElementById("currentUser").innerText = parseInt(document.getElementById("currentUser")
                .innerText) - 1;
            var progressPercentage = ((currentUsers - 1) / totalUsers) * 100;
        }

        // Update the progress bar width and aria-valuenow attribute
        progressBar.style.width = progressPercentage + "%";
        progressBar.setAttribute("aria-valuenow", progressPercentage);

        // Toggle visibility of formDiv and contentDiv based on progress
        if (currentUsers >= totalUsers) {
            formDiv.style.display = "none";
            contentDiv.style.display = "block";
        } else {
            formDiv.style.display = "block";
            contentDiv.style.display = "none";
        }
    }
    // Update Progress bar end

    //Onstart up
    getAllSubUsers();
</script>

<?php include "nav.php"; ?>
<header class="bg-dark">
    <div class="container pt-4 pt-xl-5">
        <div class="row pt-5">
            <div class="col-md-8 col-xl-6 text-center text-md-start mx-auto">
                <div class="text-center">
                    <p class="fw-bold text-success mb-2">Brighter Future</p>
                    <h3 class="fw-bold">The best electricity provider for you.</h3>
                </div>
            </div>  
            <div class="col-12 col-lg-10 mx-auto">
                <div class="position-relative" style="display: flex;flex-wrap: wrap;justify-content: flex-end;">
                    <div style="position: relative;flex: 0 0 45%;transform: translate3d(-15%, 35%, 0);"><img
                            class="img-fluid" data-bss-parallax="" data-bss-parallax-speed="0.8"
                            src="assets/img/products/3.webp"></div>
                    <div style="position: relative;flex: 0 0 45%;transform: translate3d(-5%, 20%, 0);"><img
                            class="img-fluid" data-bss-parallax="" data-bss-parallax-speed="0.4"
                            src="assets/img/products/2.jpeg"></div>
                    <div style="position: relative;flex: 0 0 60%;transform: translate3d(0, 0%, 0);"><img
                            class="img-fluid" data-bss-parallax="" data-bss-parallax-speed="0.25"
                            src="assets/img/products/1.jpeg"></div>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="py-5 mt-5">
    <div class="container py-5">
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <p class="fw-bold text-success mb-2">Group 2</p>
                <h2 class="fw-bold"><strong>What People Say About us</strong></h2>
                <p class="text-muted">No matter the project, our team can handle it.&nbsp;</p>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 d-sm-flex justify-content-sm-center">
            <div class="col-lg-3 mb-4">
                <div class="d-flex flex-column align-items-center align-items-sm-start">
                    <p class="bg-dark border rounded border-dark p-4">Ensure technology works smoothly and support
                        the successful completion of IT project.</p>
                    <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50"
                            src="assets/img/team/member3.jpg" />
                        <div>
                            <p class="fw-bold text-primary mb-0">Su Thiri Htun</p>
                            <p class="text-muted mb-0">IT Analyst</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="d-flex flex-column align-items-center align-items-sm-start">
                    <p class="bg-dark border rounded border-dark p-4">Use data gathered to achieve project goals and
                        reach the success of the organization.</p>
                    <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50"
                            src="assets/img/team/member2.jpg" />
                        <div>
                            <p class="fw-bold text-primary mb-0">Mi Mya Shwe Yi Win</p>
                            <p class="text-muted mb-0">Data Scientist</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="d-flex flex-column align-items-center align-items-sm-start">
                    <p class="bg-dark border rounded border-dark p-4">Successfully deliver the project within the
                        scope, time and budget limitations while ensuring the stakeholder satisfaction.</p>
                    <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50"
                            src="assets/img/team/member1.jpg" />
                        <div>
                            <p class="fw-bold text-primary mb-0">Hein Htet Naing</p>
                            <p class="text-muted mb-0">Project Manager</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="d-flex flex-column align-items-center align-items-sm-start">
                    <p class="bg-dark border rounded border-dark p-4">Create high-quality website solutions that
                        meet the requirements of the project and deliver the value and results to the stakeholders.
                    </p>
                    <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50"
                            src="assets/img/team/member4.jpg" />
                        <div>
                            <p class="fw-bold text-primary mb-0">Yell Htet Kyaw</p>
                            <p class="text-muted mb-0">Developer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <p class="fw-bold text-success mb-2">Contacts</p>
                <h2 class="fw-bold">How you can reach us</h2>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-xl-4">
                <div>
                    <form class="p-3 p-xl-4" method="post" action="functions/addContact.php">
                        <div class="mb-3"><input class="form-control" type="text" id="name-1" name="name"
                                placeholder="Name"></div>
                        <div class="mb-3"><input class="form-control" type="email" id="email-1" name="email"
                                placeholder="Email"></div>
                        <div class="mb-3"><textarea class="form-control" id="message-1" name="message" rows="6"
                                placeholder="Message"></textarea></div>
                        <div><button class="btn btn-primary shadow d-block w-100" type="submit">Send </button></div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 col-xl-4 d-flex justify-content-center justify-content-xl-start">
                <div class="d-flex flex-wrap flex-md-column justify-content-md-start align-items-md-start h-100">
                    <div class="d-flex align-items-center p-3">
                        <div
                            class="bs-icon-md bs-icon-circle bs-icon-primary shadow d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon bs-icon-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                viewBox="0 0 16 16" class="bi bi-telephone">
                                <path
                                    d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z">
                                </path>
                            </svg>
                        </div>
                        <div class="px-2">
                            <h6 class="fw-bold mb-0">Phone</h6>
                            <p class="text-muted mb-0">+95 9776878996</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center p-3">
                        <div
                            class="bs-icon-md bs-icon-circle bs-icon-primary shadow d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon bs-icon-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                viewBox="0 0 16 16" class="bi bi-envelope">
                                <path fill-rule="evenodd"
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z">
                                </path>
                            </svg>
                        </div>
                        <div class="px-2">
                            <h6 class="fw-bold mb-0">Email</h6>
                            <p class="text-muted mb-0">group2@gmail.com</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center p-3">
                        <div
                            class="bs-icon-md bs-icon-circle bs-icon-primary shadow d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon bs-icon-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                viewBox="0 0 16 16" class="bi bi-pin">
                                <path
                                    d="M4.146.146A.5.5 0 0 1 4.5 0h7a.5.5 0 0 1 .5.5c0 .68-.342 1.174-.646 1.479-.126.125-.25.224-.354.298v4.431l.078.048c.203.127.476.314.751.555C12.36 7.775 13 8.527 13 9.5a.5.5 0 0 1-.5.5h-4v4.5c0 .276-.224 1.5-.5 1.5s-.5-1.224-.5-1.5V10h-4a.5.5 0 0 1-.5-.5c0-.973.64-1.725 1.17-2.189A5.921 5.921 0 0 1 5 6.708V2.277a2.77 2.77 0 0 1-.354-.298C4.342 1.674 4 1.179 4 .5a.5.5 0 0 1 .146-.354zm1.58 1.408-.002-.001.002.001zm-.002-.001.002.001A.5.5 0 0 1 6 2v5a.5.5 0 0 1-.276.447h-.002l-.012.007-.054.03a4.922 4.922 0 0 0-.827.58c-.318.278-.585.596-.725.936h7.792c-.14-.34-.407-.658-.725-.936a4.915 4.915 0 0 0-.881-.61l-.012-.006h-.002A.5.5 0 0 1 10 7V2a.5.5 0 0 1 .295-.458 1.775 1.775 0 0 0 .351-.271c.08-.08.155-.17.214-.271H5.14c.06.1.133.191.214.271a1.78 1.78 0 0 0 .37.282z">
                                </path>
                            </svg>
                        </div>
                        <div class="px-2">
                            <h6 class="fw-bold mb-0">Location</h6>
                            <p class="text-muted mb-0">507/7 Pyay Yeik Thar Road, Pyay Road</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "footer.php";?>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bold-and-dark.js"></script>
</body>

</html>
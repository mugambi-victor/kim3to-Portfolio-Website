<?php
include('header.php');
?>

        <section class="home-bg section h-100vh" id="home">
            <div class="bg-overlay"></div>
                <div class="container z-index">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="text-white text-center">
                                <h4>Hello & Welcome</h4>
                                <h1 class="header_title mb-0 mt-3">I Am <span class="element fw-bold" data-elements="A Cybersecurity specialist.,A Developer., A Mentor."></span></h1>
                                <ul class="social_home list-unstyled text-center pt-4">
                                    <li class="list-inline-item"><a href="javascript:void(0)"><i class="mdi mdi-facebook"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)"><i class="mdi mdi-linkedin"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)"><i class="mdi mdi-dribbble"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)"><i class="mdi mdi-google-plus"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)"><i class="mdi mdi-twitter"></i></a></li>
                                </ul>
                                <div class="header_btn">
                                    <a href="javascript:void(0f)" class="btn btn-outline-custom btn-rounded mt-4">Download CV</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="scroll_down">
                <a href="#about" class="scroll">
                    <i class="mbri-arrow-down text-white"></i>
                </a>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


         <script src="/design/assets/js/jquery.min.js"></script>
         <script src="/design/assets/js/typed.js"></script>         
        <script>
            $(".element").each(function() {
                var $this = $(this);
                $this.typed({
                    strings: $this.attr('data-elements').split(','),
                    typeSpeed: 100,
                    backDelay: 3000
                });
            });
        </script>
    </body>
</html>
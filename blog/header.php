<header class="header-area">
    <div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <!-- <div class="city-temperature">
                        <i class="icofont-ui-weather"></i> <span>28.5<sup>c</sup></span> <b>Dubai</b>
                    </div> -->
                    <ul class="top-nav">
                        <li><a href="singlepost">Blog</a></li>
                        <li><a href="sport">Forums</a></li>
                        <li><a href="contact">Contact</a></li>
                        <li><a href="politics">Advertisement</a></li>
                    </ul>
                </div>

                <div class="col-lg-6 col-md-4 text-end">
                    <ul class="top-social">
                        <li>
                            <a href="https://www.facebook.com/login/" target="_blank"><i class="icofont-facebook"></i></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/login/" target="_blank"><i class="icofont-twitter"></i></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/accounts/login/" target="_blank"><i class="icofont-instagram"></i></a>
                        </li>
                        <li>
                            <a href="https://www.pinterest.com/login/" target="_blank"><i class="icofont-pinterest"></i></a>
                        </li>
                        <li>
                            <a href="https://vimeo.com/log_in" target="_blank"><i class="icofont-vimeo"></i></a>
                        </li>
                    </ul>
                    <div class="header-date"><i class="icofont-clock-time"></i> <span id="currentDate"></span></div>

                    <script>
                        function updateDate() {
                            // Create a new Date object for the current date and time
                            const now = new Date();

                            // Options for formatting the date (you can customize this)
                            const options = {
                                weekday: 'long', // Displays full weekday name, e.g., 'Friday'
                                year: 'numeric', // Optionally, you can display the year
                                month: 'long', // Displays full month name, e.g., 'June'
                                day: 'numeric' // Displays the day, e.g., '15'
                            };

                            // Format the date
                            const formattedDate = now.toLocaleDateString(undefined, options);

                            // Display the formatted date in the HTML element
                            document.getElementById('currentDate').textContent = formattedDate;
                        }

                        // Update the date immediately when the page loads
                        updateDate();

                        // Optionally, update the date every minute (for continuous clock)
                        setInterval(updateDate, 60000);
                    </script>

                </div>
            </div>
        </div>
    </div>

    <div class="navbar-area">
        <div class="sinmun-mobile-nav">
            <div class="logo">
                <a href="index"><img src="assets/img/logo.png" alt="logo"></a>
            </div>
        </div>
        <style>
            .text {
                color: white !important;
            }
            
        </style>
        <div class="sinmun-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <strong class="navbar-brand">Viewpoint</strong>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="#" class="nav-link active">Home</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="index" class="nav-link active">Home</a></li>

                                </ul>
                            </li>
                            <li class="nav-item"><a href="sport" class="nav-link">Sports</a></li>
                            <li class="nav-item"><a href="music" class="nav-link">Music</a></li>
                            <li class="nav-item"><a href="politics" class="nav-link">Politics</a></li>
                            <li class="nav-item"><a href="business" class="nav-link">Business</a></li>

                        </ul>
                        <div class="others-options">

                            <div class="header-search d-inline-block">
                                <div class="nav-search">
                                    <div class="nav-search-button"><i class="icofont-ui-search"></i></div>
                                    <form>
                                        <span class="nav-search-close-button" tabindex="0">✕</span>
                                        <div class="nav-search-inner"><input name="search" placeholder="Search here...."></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="breaking-news">
        <div class="container">
            <div class="breaking-news-content clearfix">
                <h6 class="breaking-title"><i class="icofont-flash"></i> Breaking News:</h6>
                <div class="breaking-news-slides owl-carousel owl-theme">
                    <div class="single-breaking-news">
                        <p><a href="postcategory">As well as stopping goals, Cristiane Endler is opening doors for other women.</a></p>
                    </div>
                    <div class="single-breaking-news">
                        <p><a href="post-category">Netcix cuts out the chill with an integrated personal trainer on running.</a></p>
                    </div>
                    <div class="single-breaking-news">
                        <p><a href="postcategory">As well as stopping goals, Cristiane Endler is opening doors for other women.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
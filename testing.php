<!DOCTYPE html>
<html>
    <head>
        <?php  include 'include/meta_include.php' ?>
        <meta charset="utf-8">
        <title>Test Bank</title>
        <?php  include 'include/css_include.php' ?>
        <style media="screen">
        html {
        position: relative;
        min-height: 100%; }

        body {
        overflow-x: hidden; }

        body.sticky-footer {
        margin-bottom: 56px; }
        body.sticky-footer .content-wrapper {
        min-height: calc(100vh - 56px - 56px); }

        body.fixed-nav {
        padding-top: 56px; }

        .content-wrapper {
        min-height: calc(100vh - 56px);
        padding-top: 1rem; }

        .scroll-to-top {
        position: fixed;
        right: 15px;
        bottom: 3px;
        display: none;
        width: 50px;
        height: 50px;
        text-align: center;
        color: white;
        background: rgba(52, 58, 64, 0.5);
        line-height: 45px; }
        .scroll-to-top:focus, .scroll-to-top:hover {
        color: white; }
        .scroll-to-top:hover {
        background: #343a40; }
        .scroll-to-top i {
        font-weight: 800; }

        .smaller {
        font-size: 0.7rem; }

        .o-hidden {
        overflow: hidden !important; }

        .z-0 {
        z-index: 0; }

        .z-1 {
        z-index: 1; }

        #mainNav .navbar-collapse {
        overflow: auto;
        max-height: 75vh; }
        #mainNav .navbar-collapse .navbar-nav .nav-item .nav-link {
        cursor: pointer; }
        #mainNav .navbar-collapse .navbar-sidenav .nav-link-collapse:after {
        float: right;
        content: '\f107';
        font-family: 'FontAwesome'; }
        #mainNav .navbar-collapse .navbar-sidenav .nav-link-collapse.collapsed:after {
        content: '\f105'; }
        #mainNav .navbar-collapse .navbar-sidenav .sidenav-second-level,
        #mainNav .navbar-collapse .navbar-sidenav .sidenav-third-level {
        padding-left: 0; }
        #mainNav .navbar-collapse .navbar-sidenav .sidenav-second-level > li > a,
        #mainNav .navbar-collapse .navbar-sidenav .sidenav-third-level > li > a {
          display: block;
          padding: 0.5em 0; }
          #mainNav .navbar-collapse .navbar-sidenav .sidenav-second-level > li > a:focus, #mainNav .navbar-collapse .navbar-sidenav .sidenav-second-level > li > a:hover,
          #mainNav .navbar-collapse .navbar-sidenav .sidenav-third-level > li > a:focus,
          #mainNav .navbar-collapse .navbar-sidenav .sidenav-third-level > li > a:hover {
            text-decoration: none; }
        #mainNav .navbar-collapse .navbar-sidenav .sidenav-second-level > li > a {
        padding-left: 1em; }
        #mainNav .navbar-collapse .navbar-sidenav .sidenav-third-level > li > a {
        padding-left: 2em; }
        #mainNav .navbar-collapse .sidenav-toggler {
        display: none; }
        #mainNav .navbar-collapse .navbar-nav > .nav-item.dropdown > .nav-link {
        position: relative;
        min-width: 45px; }
        #mainNav .navbar-collapse .navbar-nav > .nav-item.dropdown > .nav-link:after {
          float: right;
          width: auto;
          content: '\f105';
          border: none;
          font-family: 'FontAwesome'; }
        #mainNav .navbar-collapse .navbar-nav > .nav-item.dropdown > .nav-link .indicator {
          position: absolute;
          top: 5px;
          left: 21px;
          font-size: 10px; }
        #mainNav .navbar-collapse .navbar-nav > .nav-item.dropdown.show > .nav-link:after {
        content: '\f107'; }
        #mainNav .navbar-collapse .navbar-nav > .nav-item.dropdown .dropdown-menu > .dropdown-item > .dropdown-message {
        overflow: hidden;
        max-width: none;
        text-overflow: ellipsis; }

        @media (min-width: 992px) {
        #mainNav .navbar-brand {
        width: 250px; }
        #mainNav .navbar-collapse {
        overflow: visible;
        max-height: none; }
        #mainNav .navbar-collapse .navbar-sidenav {
          position: absolute;
          top: 0;
          left: 0;
          overflow-x: hidden;
          overflow-y: auto;
          -webkit-flex-direction: column;
          -ms-flex-direction: column;
          flex-direction: column;
          margin-top: 56px; }
          #mainNav .navbar-collapse .navbar-sidenav > .nav-item {
            width: 250px;
            padding: 0; }
            #mainNav .navbar-collapse .navbar-sidenav > .nav-item > .nav-link {
              padding: 1em; }
            #mainNav .navbar-collapse .navbar-sidenav > .nav-item .sidenav-second-level,
            #mainNav .navbar-collapse .navbar-sidenav > .nav-item .sidenav-third-level {
              padding-left: 0;
              list-style: none; }
              #mainNav .navbar-collapse .navbar-sidenav > .nav-item .sidenav-second-level > li,
              #mainNav .navbar-collapse .navbar-sidenav > .nav-item .sidenav-third-level > li {
                width: 250px; }
                #mainNav .navbar-collapse .navbar-sidenav > .nav-item .sidenav-second-level > li > a,
                #mainNav .navbar-collapse .navbar-sidenav > .nav-item .sidenav-third-level > li > a {
                  padding: 1em; }
            #mainNav .navbar-collapse .navbar-sidenav > .nav-item .sidenav-second-level > li > a {
              padding-left: 2.75em; }
            #mainNav .navbar-collapse .navbar-sidenav > .nav-item .sidenav-third-level > li > a {
              padding-left: 3.75em; }
        #mainNav .navbar-collapse .navbar-nav > .nav-item.dropdown > .nav-link {
          min-width: 0; }
          #mainNav .navbar-collapse .navbar-nav > .nav-item.dropdown > .nav-link:after {
            width: 24px;
            text-align: center; }
        #mainNav .navbar-collapse .navbar-nav > .nav-item.dropdown .dropdown-menu > .dropdown-item > .dropdown-message {
          max-width: 300px; } }

        #mainNav.fixed-top .sidenav-toggler {
        display: none; }

        @media (min-width: 992px) {
        #mainNav.fixed-top .navbar-sidenav {
        height: calc(100vh - 112px); }
        #mainNav.fixed-top .sidenav-toggler {
        position: absolute;
        top: 0;
        left: 0;
        display: flex;
        overflow-x: hidden;
        overflow-y: auto;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        margin-top: calc(100vh - 56px); }
        #mainNav.fixed-top .sidenav-toggler > .nav-item {
          width: 250px;
          padding: 0; }
          #mainNav.fixed-top .sidenav-toggler > .nav-item > .nav-link {
            padding: 1em; } }

        #mainNav.fixed-top.navbar-dark .sidenav-toggler {
        background-color: #212529; }
        #mainNav.fixed-top.navbar-dark .sidenav-toggler a i {
        color: #adb5bd; }

        #mainNav.fixed-top.navbar-light .sidenav-toggler {
        background-color: #dee2e6; }
        #mainNav.fixed-top.navbar-light .sidenav-toggler a i {
        color: rgba(0, 0, 0, 0.5); }

        body.sidenav-toggled #mainNav.fixed-top .sidenav-toggler {
        overflow-x: hidden;
        width: 55px; }
        body.sidenav-toggled #mainNav.fixed-top .sidenav-toggler .nav-item,
        body.sidenav-toggled #mainNav.fixed-top .sidenav-toggler .nav-link {
        width: 55px !important; }

        body.sidenav-toggled #mainNav.fixed-top #sidenavToggler i {
        -webkit-transform: scaleX(-1);
        -moz-transform: scaleX(-1);
        -o-transform: scaleX(-1);
        transform: scaleX(-1);
        filter: FlipH;
        -ms-filter: 'FlipH'; }

        #mainNav.static-top .sidenav-toggler {
        display: none; }

        @media (min-width: 992px) {
        #mainNav.static-top .sidenav-toggler {
        display: flex; } }

        body.sidenav-toggled #mainNav.static-top #sidenavToggler i {
        -webkit-transform: scaleX(-1);
        -moz-transform: scaleX(-1);
        -o-transform: scaleX(-1);
        transform: scaleX(-1);
        filter: FlipH;
        -ms-filter: 'FlipH'; }

        .content-wrapper {
        overflow-x: hidden;
        background: white; }
        @media (min-width: 992px) {
        .content-wrapper {
          margin-left: 250px; } }

        #sidenavToggler i {
        font-weight: 800; }

        .navbar-sidenav-tooltip.show {
        display: none; }

        @media (min-width: 992px) {
        body.sidenav-toggled .content-wrapper {
        margin-left: 55px; } }

        body.sidenav-toggled .navbar-sidenav {
        overflow-x: hidden;
        width: 55px; }
        body.sidenav-toggled .navbar-sidenav .nav-link-text {
        display: none; }
        body.sidenav-toggled .navbar-sidenav .nav-item,
        body.sidenav-toggled .navbar-sidenav .nav-link {
        width: 55px !important; }
        body.sidenav-toggled .navbar-sidenav .nav-item:after,
        body.sidenav-toggled .navbar-sidenav .nav-link:after {
          display: none; }

        body.sidenav-toggled .navbar-sidenav-tooltip.show {
        display: flex; }

        #mainNav.navbar-dark .navbar-collapse .navbar-sidenav .nav-link-collapse:after {
        color: #868e96; }

        #mainNav.navbar-dark .navbar-collapse .navbar-sidenav > .nav-item > .nav-link {
        color: #868e96; }
        #mainNav.navbar-dark .navbar-collapse .navbar-sidenav > .nav-item > .nav-link:hover {
        color: #adb5bd; }

        #mainNav.navbar-dark .navbar-collapse .navbar-sidenav > .nav-item .sidenav-second-level > li > a,
        #mainNav.navbar-dark .navbar-collapse .navbar-sidenav > .nav-item .sidenav-third-level > li > a {
        color: #868e96; }
        #mainNav.navbar-dark .navbar-collapse .navbar-sidenav > .nav-item .sidenav-second-level > li > a:focus, #mainNav.navbar-dark .navbar-collapse .navbar-sidenav > .nav-item .sidenav-second-level > li > a:hover,
        #mainNav.navbar-dark .navbar-collapse .navbar-sidenav > .nav-item .sidenav-third-level > li > a:focus,
        #mainNav.navbar-dark .navbar-collapse .navbar-sidenav > .nav-item .sidenav-third-level > li > a:hover {
        color: #adb5bd; }

        #mainNav.navbar-dark .navbar-collapse .navbar-nav > .nav-item.dropdown > .nav-link:after {
        color: #adb5bd; }

        @media (min-width: 992px) {
        #mainNav.navbar-dark .navbar-collapse .navbar-sidenav {
        background: #343a40; }
        #mainNav.navbar-dark .navbar-collapse .navbar-sidenav li.active a {
          color: white !important;
          background-color: #495057; }
          #mainNav.navbar-dark .navbar-collapse .navbar-sidenav li.active a:focus, #mainNav.navbar-dark .navbar-collapse .navbar-sidenav li.active a:hover {
            color: white; }
        #mainNav.navbar-dark .navbar-collapse .navbar-sidenav > .nav-item .sidenav-second-level,
        #mainNav.navbar-dark .navbar-collapse .navbar-sidenav > .nav-item .sidenav-third-level {
          background: #343a40; } }

        #mainNav.navbar-light .navbar-collapse .navbar-sidenav .nav-link-collapse:after {
        color: rgba(0, 0, 0, 0.5); }

        #mainNav.navbar-light .navbar-collapse .navbar-sidenav > .nav-item > .nav-link {
        color: rgba(0, 0, 0, 0.5); }
        #mainNav.navbar-light .navbar-collapse .navbar-sidenav > .nav-item > .nav-link:hover {
        color: rgba(0, 0, 0, 0.7); }

        #mainNav.navbar-light .navbar-collapse .navbar-sidenav > .nav-item .sidenav-second-level > li > a,
        #mainNav.navbar-light .navbar-collapse .navbar-sidenav > .nav-item .sidenav-third-level > li > a {
        color: rgba(0, 0, 0, 0.5); }
        #mainNav.navbar-light .navbar-collapse .navbar-sidenav > .nav-item .sidenav-second-level > li > a:focus, #mainNav.navbar-light .navbar-collapse .navbar-sidenav > .nav-item .sidenav-second-level > li > a:hover,
        #mainNav.navbar-light .navbar-collapse .navbar-sidenav > .nav-item .sidenav-third-level > li > a:focus,
        #mainNav.navbar-light .navbar-collapse .navbar-sidenav > .nav-item .sidenav-third-level > li > a:hover {
        color: rgba(0, 0, 0, 0.7); }

        #mainNav.navbar-light .navbar-collapse .navbar-nav > .nav-item.dropdown > .nav-link:after {
        color: rgba(0, 0, 0, 0.5); }

        @media (min-width: 992px) {
        #mainNav.navbar-light .navbar-collapse .navbar-sidenav {
        background: #f8f9fa; }
        #mainNav.navbar-light .navbar-collapse .navbar-sidenav li.active a {
          color: #000 !important;
          background-color: #e9ecef; }
          #mainNav.navbar-light .navbar-collapse .navbar-sidenav li.active a:focus, #mainNav.navbar-light .navbar-collapse .navbar-sidenav li.active a:hover {
            color: #000; }
        #mainNav.navbar-light .navbar-collapse .navbar-sidenav > .nav-item .sidenav-second-level,
        #mainNav.navbar-light .navbar-collapse .navbar-sidenav > .nav-item .sidenav-third-level {
          background: #f8f9fa; } }

        .card-body-icon {
        position: absolute;
        z-index: 0;
        top: -25px;
        right: -25px;
        font-size: 5rem;
        -webkit-transform: rotate(15deg);
        -ms-transform: rotate(15deg);
        transform: rotate(15deg); }

        @media (min-width: 576px) {
        .card-columns {
        column-count: 1; } }

        @media (min-width: 768px) {
        .card-columns {
        column-count: 2; } }

        @media (min-width: 1200px) {
        .card-columns {
        column-count: 2; } }

        .card-login {
        max-width: 25rem; }

        .card-register {
        max-width: 40rem; }

        footer.sticky-footer {
        position: absolute;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 56px;
        background-color: #e9ecef;
        line-height: 55px; }
        @media (min-width: 992px) {
        footer.sticky-footer {
          width: calc(100% - 250px); } }

        @media (min-width: 992px) {
        body.sidenav-toggled footer.sticky-footer {
        width: calc(100% - 55px); } }

        </style>
    </head>
    <body>
        <!--Staff Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href="index.html">Exam-in</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        <a class="nav-link" href="index.html">
                            <i class="fa fa-fw fa-dashboard"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                        <a class="nav-link" href="charts.html">
                            <i class="fa fa-fw fa-area-chart"></i>
                            <span class="nav-link-text">My Profile</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                        <a class="nav-link" href="tables.html">
                            <i class="fa fa-fw fa-table"></i>
                            <span class="nav-link-text">My Tests</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                        <a class="nav-link" href="#">
                            <i class="fa fa-fw fa-wrench"></i>
                            <span class="nav-link-text">Test-Bank</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
                        <a class="nav-link" href="#">
                            <i class="fa fa-fw fa-sitemap"></i>
                            <span class="nav-link-text">Setting</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav sidenav-toggler">
                    <li class="nav-item">
                        <a class="nav-link text-center" id="sidenavToggler">
                            <i class="fa fa-fw fa-angle-left"></i>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-envelope"></i>
                            <span class="d-lg-none">Messages
                                <span class="badge badge-pill badge-primary">12 New</span>
                            </span>
                            <span class="indicator text-primary d-none d-lg-block">
                                <i class="fa fa-fw fa-circle"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">New Messages:</h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <strong>David Miller</strong>
                                <span class="small float-right text-muted">11:21 AM</span>
                                <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <strong>Jane Smith</strong>
                                <span class="small float-right text-muted">11:21 AM</span>
                                <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <strong>John Doe</strong>
                                <span class="small float-right text-muted">11:21 AM</span>
                                <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item small" href="#">View all messages</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown" style="margin-right: 200px;">
                        <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-bell"></i>
                            <span class="d-lg-none">Alerts
                                <span class="badge badge-pill badge-warning">6 New</span>
                            </span>
                            <span class="indicator text-warning d-none d-lg-block">
                                <i class="fa fa-fw fa-circle"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">New Alerts:</h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <span class="text-success">
                                    <strong>
                                        <i class="fa fa-long-arrow-up fa-fw"></i>Status Update
                                    </strong>
                                </span>
                                <span class="small float-right text-muted">11:21 AM</span>
                                <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <span class="text-danger">
                                    <strong>
                                        <i class="fa fa-long-arrow-down fa-fw"></i>Status Update
                                    </strong>
                                </span>
                                <span class="small float-right text-muted">11:21 AM</span>
                                <div class="dropdown-message small">This is an automated server response message. All systems are   online.</div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <span class="text-success">
                                    <strong>
                                        <i class="fa fa-long-arrow-up fa-fw"></i>Status Update
                                    </strong>
                                </span>
                                <span class="small float-right text-muted">11:21 AM</span>
                                <div class="dropdown-message small">This is an automated server response message. All systems are   online.</div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item small" href="#">View all alerts</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-fw fa-sign-out"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small>Copyright © Exam-in 2018</small>
                </div>
            </div>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>
      <?php include 'include/js_include.php' ?>
      <script>
      (function($) {
        "use strict"; // Start of use strict
        // Configure tooltips for collapsed side navigation
        $('.navbar-sidenav [data-toggle="tooltip"]').tooltip({
        template: '<div class="tooltip navbar-sidenav-tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
        })
        // Toggle the side navigation
        $("#sidenavToggler").click(function(e) {
        e.preventDefault();
        $("body").toggleClass("sidenav-toggled");
        $(".navbar-sidenav .nav-link-collapse").addClass("collapsed");
        $(".navbar-sidenav .sidenav-second-level, .navbar-sidenav .sidenav-third-level").removeClass("show");
        });
        // Force the toggled class to be removed when a collapsible nav link is clicked
        $(".navbar-sidenav .nav-link-collapse").click(function(e) {
        e.preventDefault();
        $("body").removeClass("sidenav-toggled");
        });
        // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
        $('body.fixed-nav .navbar-sidenav, body.fixed-nav .sidenav-toggler, body.fixed-nav .navbar-collapse').on('mousewheel DOMMouseScroll', function(e) {
        var e0 = e.originalEvent,
          delta = e0.wheelDelta || -e0.detail;
        this.scrollTop += (delta < 0 ? 1 : -1) * 30;
        e.preventDefault();
        });
        // Scroll to top button appear
        $(document).scroll(function() {
        var scrollDistance = $(this).scrollTop();
        if (scrollDistance > 100) {
          $('.scroll-to-top').fadeIn();
        } else {
          $('.scroll-to-top').fadeOut();
        }
        });
        // Configure tooltips globally
        $('[data-toggle="tooltip"]').tooltip()
        // Smooth scrolling using jQuery easing
        $(document).on('click', 'a.scroll-to-top', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
          scrollTop: ($($anchor.attr('href')).offset().top)
        }, 1000, 'easeInOutExpo');
        event.preventDefault();
        });
        })(jQuery); // End of use strict

      </script>
    </body>
</html>
